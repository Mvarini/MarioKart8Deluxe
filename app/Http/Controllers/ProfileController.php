<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function update(ProfileRequest $request)
    {
        // Recuperar os dados do usuário logado
        $user = User::where('id', Auth::id())->first();

        // Validar o formulário
        $request->validated();

        try {
            // Ponto inicial da transação
            DB::beginTransaction();

            // Se existir a imagem no request
            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('users', 'public');

                if ($user->image) {
                    Storage::disk('public')->delete($user->image);
                }
            }

            // Atualizar no banco de dados
            $user->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'birthday' => Carbon::parse(str_replace(['-', '/'], ['', '-'], $request->birthday))->format('Y-m-d'),
                'email' => $request->email,
                'image' => $requestImage ?? $user->image,
            ]);

            // Operação concluída
            DB::commit();

            // Salvar log
            Log::info('Perfil editado', ['authLogin' => Auth::id()]);

            // Redirecionar o usuário
            return redirect()->route('user.index')->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Exception $ex) {
            // Salvar log
            Log::info('Usuário não editado.', ['error' => $ex->getMessage()]);

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Perfil não atualizado!');
        }
    }

    public function updatePassword(Request $request)
    {

        // Validar o formulário
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
            'password' => [
                'required' => 'A senha é obrigatória',
                'min' => 'A senha deve conter no mínimo :min caracteres',
                'confirmed' => 'A senhas não conferem'
            ],
        ]);

        try {
            // Início da transação
            DB::beginTransaction();

            // Recuperar os dados do usuário logado
            $user = User::where('id', Auth::id())->first();

            // Atualizar os dados
            $user->update([
                'password' => $request->password,
            ]);

            // Operação concluída
            DB::commit();

            // Salvar log
            Log::info('Senha atualizada', ['authLogin' => Auth::id()]);

            // Redirecionar o usuário
            return redirect()->back()->with('success', 'Senha atualizada com sucesso!');


        }catch (\Exception $ex){

            // Operação não concluída
            DB::rollBack();

            // Salvar o log
            Log::info('Senha não atualizada', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Senha não atualizada!');
        }

    }
}
