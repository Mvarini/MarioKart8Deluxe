<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(10);

        return view('roles.index', ['menu' => 'roleActiveMenu', 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ], [
            'name.required' => 'O papel é obrigatório!',
            'name.unique' => 'O papel informado já existe!',
        ]);

        try {
            // Ponto inicial da transaçaõ
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            // Transação concluída
            DB::commit();

            // Salvar o log
            Log::info('Papel cadastrado', ['id' => $role->id, 'user_action_id' => Auth::id()]);

            // Redirecionar e enviar mensagem ao usuário
            return redirect()->route('role.index')->with('success', 'Papel cadastrado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Papel não cadastrado', ['error' => $ex->getMessage(), 'user_action_id' => Auth::id()]);

            return redirect()->route('role.index')->with('error', 'Papel não cadastrado!');
        }
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ], [
            'name.required' => 'O papel é obrigatório!',
            'name.unique' => 'O papel informado já existe!',
        ]);

        try {
            // Ponto inicial da transação
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
            ]);

            DB::commit();

            Log::info('Papel atualizado', ['id' => $role->id, 'user_action_id' => Auth::id()]);

            return redirect()->route('role.index')->with('success', 'Papel atualizado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Papel não atualizado', ['error' => $ex->getMessage(), 'user_action_id' => Auth::id()]);

            return redirect()->route('role.index')->with('error', 'Papel não atualizado!');
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();

            Log::info('Papel deletado', ['id' => $role->id, 'user_action_id' => Auth::id()]);

            return redirect()->route('role.index')->with('success', 'Papel deletado com sucesso!');
        } catch (\Exception $ex) {
            Log::info('Papel não deletado', ['error' => $ex->getMessage(), 'user_action_id' => Auth::id()]);

            return redirect()->route('role.index')->with('success', 'Papel não deletado!');
        }
    }
}

