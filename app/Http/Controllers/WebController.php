<?php

namespace App\Http\Controllers;

use App\Models\Defeat;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $defeats = Defeat::all()->count();

        return view('web.admin',['users'=>$users, 'defeats'=>$defeats] );
    }
}
