<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'O e-mail é obrigatório!',
            'email.email' => 'Insira um e-mail valido!',
            'password.required' => 'A senha é obrigatória!',
            'password.min' => 'Senha com no mínino :min caracteres!',
        ]);

        // Autentica o usuário
        $userAuth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        // Caso não seja autenticado
        if (!$userAuth) {
            return redirect()->route('web.index');
        }

        return redirect()->route('dashboard.index');
    }
}
