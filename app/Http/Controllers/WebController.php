<?php

namespace App\Http\Controllers;

use App\Models\Defeat;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $users = User::all();
        $defeats = Defeat::all()->count();

        $marcielUser = User::where('nickname', 'Marciel')->first();
        $brunoUser = User::where('nickname', 'Bruno')->first();
        $jeanUser = User::where('nickname', 'Jean')->first();
        $miguelUser = User::where('nickname', 'Miguel')->first();
        $hugoUser = User::where('nickname', 'Hugo')->first();

        if ($marcielUser) {
            $marcielDefeats = Defeat::with('users')->where('user_id', '=', $marcielUser->id)->count();
        }else{
            $marcielDefeats = 0;
        }

        if ($brunoUser) {
            $brunoDefeats = Defeat::with('users')->where('user_id', '=', $brunoUser->id)->count();
        }else{
            $brunoDefeats = 0;
        }

        if ($jeanUser) {
            $jeanDefeats = Defeat::with('users')->where('user_id', '=', $jeanUser->id)->count();
        }else{
            $jeanDefeats = 0;
        }

        if ($miguelUser) {
            $miguelDefeats = Defeat::with('users')->where('user_id', '=', $miguelUser->id)->count();
        }else{
            $miguelDefeats = 0;
        }

        if ($hugoUser) {
            $hugoDefeats = Defeat::with('users')->where('user_id', '=', $hugoUser->id)->count();
        }else{
            $hugoDefeats = 0;
        }


        return view('web.admin',[
            'users'=>$users,
            'defeats'=>$defeats,
            'marcielUser'=>$marcielUser,
            'brunoUser'=>$brunoUser,
            'jeanUser'=>$jeanUser,
            'miguelUser'=>$miguelUser,
            'hugoUser'=>$hugoUser,
            'marcielDefeats'=>$marcielDefeats,
            'brunoDefeats'=>$brunoDefeats,
            'miguelDefeats'=>$miguelDefeats,
            'jeanDefeats'=>$jeanDefeats,
            'hugoDefeats'=>$hugoDefeats,
        ] );
    }
}
