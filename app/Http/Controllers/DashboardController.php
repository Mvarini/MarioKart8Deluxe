<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();

        return view('dashboards.index', ['menu' => 'dashboardActiveMenu', 'userAuth' => $userAuth]);
    }
}
