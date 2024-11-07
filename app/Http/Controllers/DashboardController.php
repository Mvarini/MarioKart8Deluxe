<?php

namespace App\Http\Controllers;

use App\Models\Defeat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Rank total de derrotas dos usuários
        $usersRank = DB::table('defeats')
            ->join('users', 'defeats.user_id', '=', 'users.id')
            ->select('users.nickname', 'users.image', DB::raw('count(*) as total'))
            ->groupBy('users.nickname', 'users.image')
            ->orderBy('total', 'desc')
            ->get();

        //-----------------------------------------//

        // Gráfico de barras - Total de partidas
        $defeatsData = Defeat::select([
            DB::raw('YEAR(date_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();


        // Preparar arrays
        foreach ($defeatsData as $defeat) {
            $ano[] = $defeat->ano;
            $total[] = $defeat->total;
        }

        // formatar para chartjs
        $defeatLabel = " 'Total de partidas' ";
        $defeatAno = implode(",", $ano);
        $defeatTotal = implode(",", $total);

        //-------------------------------------------------//

        // Gráfico de barras - total de derrotas por jogador
        $usersData = User::with('defeats')->get();

        // Preparar array
        foreach ($usersData as $user) {
            $userNome[] = "'".$user->nickname."'";
            $userTotal[] = Defeat::where('user_id', $user->id)->count();
        }

        // Formatar para chartjs
        $userLabel = implode(',', $userNome);
        $userTotal = implode(',', $userTotal);


        //---------------------------------------------//
        return view('dashboards.index', [
            'menu' => 'dashboardActiveMenu',
            'defeatAno' => $defeatAno,
            'defeatTotal' => $defeatTotal,
            'defeatLabel' => $defeatLabel,
            'userLabel' => $userLabel,
            'userTotal' => $userTotal,
            'usersRank' => $usersRank,
        ]);
    }
}
