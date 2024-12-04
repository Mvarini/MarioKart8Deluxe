<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\table;

class RolePermissionController extends Controller
{
    public function index(Role $role)
    {
        // Não pode acessar o papel do administrador
        if ($role->name == "Administrador"){
            Log::info('Permissão de administrador não pode ser acessada', ['user_action_id' => Auth::id()]);
            return redirect()->route('role.index')->with('error', 'Permissão de Administrador não pode ser acessada!');
        }

        // Recuperar as permissões do papel
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_id', $role->id)
            ->pluck('permission_id')
            ->all();


        // Recuperar as permissões
        $permissions = Permission::get();

        // Carregar a view
        return view('rolePermissions.index', ['menu' => 'roleActiveMenu', 'role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);
    }

    public function update(Request $request, Role $role)
    {
        // Obter a permissão específica com base no ID fornecido em $request->permission
        $permission = Permission::find($request->permission);

        // Verificar se a permissão foi encontrada
        if (!$permission) {

            Log::info('Permissão do Administrador não pode ser acessada!', ['user_action_id' => Auth::id()]);

            return redirect()->route('role-permission.update', ['role' => $role->id, 'permission' => $permission->permission])->with('error', 'Permissão do Administrador não pode ser acessada!');
        }

        // Verificar se a permissão já está associada ao papel
        if ($role->permissions->contains($permission)) {

            // Remover a permissão do papel  "Bloqueado"
            $role->revokePermissionTo($permission);

            // Salvar o log
            Log::info('Bloquear permissão do papel', ['user_action_id' => Auth::id(), 'permissao' => $request->permission]);

            // Redirecionar o usuário
            return redirect()->route('role-permission.index', ['role' => $role->id])->with('success', 'Permissão bloqueado com sucesso!');
        }else{
            // Adicionar a permissão do pepel "Liberado"
            $role->givePermissionTo($permission);

            // Salvar o log
            Log::info('Liberar permissão do papel', ['user_action_id' => Auth::id(), 'permissao' => $request->permission]);

            // Redirecionar o usuário
            return redirect()->route('role-permission.index', ['role' => $role->id])->with('success', 'Permissão liberada com sucesso!');
        }
    }
}
