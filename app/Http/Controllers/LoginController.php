<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

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
            return redirect()->route('web.index')->with('error', 'E-mail e/ou senha incorretos!');
        }

        // Recuperar o usuário logado
        $user = Auth::user();

        // Verifica se a permissão é Administrador, pois, tem acesso a todas as páginas
        if ($user->hasRole('Administrador')){

            // Pode acessar todas as páginas
            $permissions = Permission::pluck('name')->toArray();
        }else{
            // Recuperar as permissões que o papel do usuário possui
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        }

        // Atribuir as permissões ao usuário
        $user->syncPermissions($permissions);


        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('web.index');
    }
}
