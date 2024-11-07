<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return view('login.forgotPassword');
    }

    public function forgotPasswordProcess(ForgotPasswordRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if (!$user){
            Log::info('Tentativa de recuperar senha com e-mail não cadastrado', ['email' => $request->email]);

            return redirect()->back()->with('error', 'E-mail não encontrado!');
        }

        try {

            // Salvar o token recuperar senha e enviar e-mail
            $status = Password::sendResetLink(
                $request->only('email')
            );

            Log::info('Recuperar senha', ['status' => $status, 'email' => $request->email]);

            return redirect()->route('web.index')->with('success', 'E-mail enviado com sucesso!');

        }catch (\Exception $ex){

            Log::info('Erro recuperar senha', ['error' => $ex->getMessage()]);

            return redirect()->back()->withInput()->with('error', 'Erro ao recuperar senha!');
        }
    }

    public function showResetPassword(Request $request)
    {
        return view('login.resetPassword', ['token' => $request->token]);
    }

    public function submitResetPassword(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'O campo e-mail é obrigatorio',
            'email.email' => 'É necessário um e-mail válido',
            'password.min' => 'Senha com no mínimo :min caracteres',
            'password.confirmed' => 'As senhas estão diferentes',
            'email.exists' => 'E-mail não cadastrado no sistema!'
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    // forçar, pois, password é uma propriedade protegida
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ]);
                    $user->save();
                }
            );


            // Salvar o log
            Log::info('Senha atualizada', ['resposta' => $status, 'email' => $request->email]);

            // Redirecionar o usuáiro e enviar mensagem
            return $status === Password::PASSWORD_RESET ? redirect()->route('web.index')->with('success', 'Senha atualizada com sucesso') :
                redirect()->route('web.index')->with('error', __($status));

        }catch (\Exception $ex){
            // Salvar o log
            Log::info('Erro ao atualizar senha', ['error' =>$ex->getMessage(), 'email' => $request->email]);

            // Redirecionar o usuário e enviar mensagem
            return redirect()->back()->withInput()->with('error', 'Tente mais tarde');
        }
    }
}
