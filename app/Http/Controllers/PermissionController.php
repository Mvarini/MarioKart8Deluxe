<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        // Listar todas as permissões
        $permissions = Permission::orderBy('id', 'asc')->paginate(10);

        // Retornar a view
        return view('permissions.index', ['menu' => 'permissionActiveMenu', 'permissions' => $permissions]);
    }

    public function store(PermissionRequest $request)
    {
        $request->validated();

        try {
            // Ponto inicial da transação
            DB::beginTransaction();

            $permission = Permission::create([
                'title' => $request->title,
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            // Transação concluída
            DB::commit();

            // Salvar o log
            Log::info('Permissão cadastrada', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            // Redirecionar o usuário
            return redirect()->route('permission.index')->with('success', 'Permissão cadastrada com sucesso!');

        }catch (\Exception $ex){
            //Transação não concluída
            DB::rollBack();

            //Salvar o log
            Log::info('Permissão não cadastrada', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            // Redirecionar o usuário
            return redirect()->route('permission.index')->withInput()->with('error', 'Permissão não cadastrada!');

        }
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $request->validated();

        try {
            // Ponto inicial da transação
            DB::beginTransaction();

            $permission->update([
                'title' => $request->title,
                'name' => $request->name,
                'guard_name' => 'web'
            ]);

            DB::commit();

            Log::info('Permissão atualizada', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            return redirect()->route('permission.index')->with('success', 'Permissão atualizada com sucesso!');

        }catch (\Exception $ex){
            DB::rollBack();

            Log::info('Permissão não atualizada', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            return redirect()->route('permission.index')->withInput()->with('error', 'Permissão não Atualizada!');
        }
    }

    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();

            Log::info('Permissão excluída', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            return redirect()->route('permission.index')->with('success', 'Permissão excluída com sucesso!');

        }catch (\Exception $ex){
            Log::info('Permissão não excluída', ['action_user_id' => Auth::id(), 'permission_id' => $permission->id]);

            return redirect()->route('permission.index')->with('error', 'Permissão não excluída!');
        }
    }
}
