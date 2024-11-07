<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Imports\UserImport;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderBy('name', 'asc')->paginate(10);

        return view('users.index', ['users' => $users, 'menu' => 'userActiveMenu']);
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {
            // Verifica se a imagem existe
            if ($request->hasFile('image')) {
                // Move a imagem para a pasta users em public pela storage link
                $requestImage = $request->file('image')->store('users', 'public');
            }

            $user = User::create([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'email' => $request->email,
                'birthday' => Carbon::parse(str_replace(["-", "/"], ["", "-"], $request->birthday))->format('Y-m-d'),
                'password' => $request->password,
                'image' => $request->hasFile('image') ? $requestImage : $request->image,
            ]);

            DB::commit();

            Log::info('Usuário cadastrado', ['User_id' => $user->id]);

            return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não cadastrado', ['error' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Usuário não cadastrado, contate o administrador!');
        }
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            // Se existir a imagem no request
            if ($request->hasFile('image')) {
                //Pegar o arquivo e move para o diretório users em store
                $requestImage = $request->file('image')->store('users', 'public');

                if ($user->image) {
                    // Apagar o imagem anterior
                    Storage::disk('public')->delete($user->image);
                }
            }

            $user->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'birthday' => Carbon::parse(str_replace(['-', '/'], ['', '-'], $request->birthday))->format('Y-m-d'),
                'email' => $request->email,
                'image' => $request->hasFile('image') ? $requestImage : $user->image,
            ]);

            DB::commit();

            Log::info('Usuário atualizado', ['user_id' => $user->id]);

            return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não atualizado', ['erro' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Usuário não atualiado, contate o administrador!');
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            DB::commit();

            Log::info('Usuário excluído', ['user_id' => $user->id]);

            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (Exception $ex) {
            DB::rollBack();

            Log::info('Usuário não excluído', ['error' => $ex->getMessage()]);

            return back()->with('error', 'Impossível excluir um usuário com derrotas atribuídas a ele!');
        }
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
                'password' => [
                    'required' => 'A senha é obrigatória',
                    'min' => 'A senha deve ter pelo menos :min caracteres',
                    'confirmed' => 'As senhas não conferem'
                ],
            ]
        );

        try {

            DB::beginTransaction();

            $user->update([
                'password' => $request->password,
            ]);

            DB::commit();

            Log::info('Senha atualizad', ['user_id' => $user->id]);

            return redirect()->route('user.index')->with('success', 'Senha atualizada com sucesso!');

        }catch (Exception $ex){
            DB::rollBack();

            Log::info('Senha não atualizada', ['erro' => $ex->getMessage()]);

            return back()->withInput()->with('error', 'Senha não atualizada, contate o administrador');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx|max:4096'
        ],[
            'excel.required' => 'Nenhum arquivo foi selecionado!',
            'excel.mimes' => 'Selecione apenas arquivo de excel com extenção: xls ou xlsx!',
            'excel.max' => 'Tamanho máximo de :max Mb excedido!'
        ]);

//        dd($request);

       Excel::import(new UserImport, $request->file('excel'));

        return redirect()->back()->with('success', 'Arquivo de excel importado com sucesso!' );
    }
}
