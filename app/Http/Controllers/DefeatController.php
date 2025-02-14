<?php

namespace App\Http\Controllers;

use App\Http\Requests\DefeatRequest;
use App\Models\Defeat;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DefeatController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        $defeats = Defeat::when($request->has('user_id'), function ($query) use ($request) {
          $query->where('user_id', '=', $request->user_id);
        })
            ->when($request->filled('date_at'), function ($query) use ($request) {
                $query->where('date_at', '=', Carbon::parse(str_replace(['-', '/'], ['', '-'], $request->date_at))->format('Y-m-d'));
            })
            ->orderBy('date_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $harmeds = [
            'Roleta',
            'Bruno',
            'Hugo',
            'Jean',
            'Marciel',
            'Miguel',
            'Hilario'
        ];

        $pains = [
            'Fazer café',
            'Buscar café',
            'Lavar louça',
            'Garçom',
            'Sorvete',
            'Bebida duvidosa'
        ];


        return view('defeats.index', ['defeats' => $defeats, 'users' => $users, 'menu' => 'defeatActiveMenu', 'harmeds' => $harmeds, 'pains' => $pains]);
    }

    public function create()
    {
        $users = User::all();

        return view('defeats.create', ['users' => $users]);
    }

    public function show(Defeat $defeat)
    {
        return view('defeats.show', ['defeat' => $defeat]);
    }

    public function store(DefeatRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            list($d, $m, $y) = explode('/', $request->date_at);

            $defeat = Defeat::create([
                'user_id' => $request->user_id,
                'harmed' => $request->harmed,
                'pain' => $request->pain,
                'date_at' => $y.'-'.$m.'-'.$d,
            ]);

            DB::commit();

            Log::info('Derrota cadastrada', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota cadastrada com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Erro ao cadastrar Derrota:', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Derrota não cadastrada, contate o administrador!');
        }
    }

    public function edit(Defeat $defeat)
    {
        $users = User::all();

        return view('defeats.edit', ['defeat' => $defeat, 'users' => $users]);
    }

    public function update(DefeatRequest $request, Defeat $defeat)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            list($d, $m, $y) = explode("/", $request->date_at);

            $defeat->update([
                'user_id' => $request->user_id,
                'harmed' => $request->harmed,
                'pain' => $request->pain,
                'date_at' => $y.'-'.$m.'-'.$d,
            ]);

            DB::commit();

            Log::info('Derrota atualizada', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota Atualizada com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Derrota não atualizada', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Derrota não atualizada, contate o administrador!');
        }
    }

    public function destroy(Defeat $defeat)
    {
        try {
            DB::beginTransaction();

            $defeat->delete();

            DB::commit();

            Log::info('Derrota excluída', ['defeat_id' => $defeat->id]);

            return redirect()->route('defeat.index')->with('success', 'Derrota excluída com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::error('Erro ao excluir Derrota:', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Derrota não excluída, contate o administrador!');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv' => 'required|mimes:csv,txt|max:4096'
        ], [
                'csv.required' => 'O arquivo CSV é obrigatório!',
                'csv.mimes' => 'Este campo deve ter um arquivo CSV!',
                'csv.max' => 'O arquivo ultrapassou o limite de :max Mb!'
            ]
        );

        try {
            // Ponto inicial da transação
            DB::beginTransaction();

            // Criar o array com as colunas da tabela do banco de dados
            $headers = ['user_id', 'harmed', 'pain', 'date_at', 'created_at', 'updated_at'];

            // Receber o arquivo, ler os dados e converter a string em array
            $dataFile = array_map('str_getcsv', file($request->file('csv')));

            // Para contar a quantidade de registros
            $numberRegister = 0;

            // Percorrer as linhas do csv
            foreach ($dataFile as $keyData => $row) {
                // Converter a linha e array
                $values = explode(';', $row[0]);

                // Percorrer as colunas do cabeçalho
                foreach ($headers as $key => $header) {
                    // Atribuir o valor ao elemento do array
                    $arrayValues[$keyData][$header] = $values[$key];
                }
                // Incrementar mais um registro na quantidade de registro que serão cadastrados
                $numberRegister++;
            }

            // Cadastrar registros no banco de dados
            Defeat::insert($arrayValues);

            // Transação concluída
            DB::commit();

            // Salvar o log
            Log::info('CSV importado', ['user_id' => Auth::id(), 'qtd_register' => $numberRegister]);

            // Redirecionar o usuário
            return redirect()->back()->with('success',
                'Arquivo CSV importado com sucesso, com '.$numberRegister.' registros!');

        }catch (Exception $ex){
            // Desfaz a transação
            DB::rollBack();

            // Salvar o log
            Log::info('CSV não importado', ['error' => $ex->getMessage()]);

            // Redirecionar o usuário
            return redirect()->back()->with('error', 'Erro ao importar arquivo CSV!');
        }
    }
}
