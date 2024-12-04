<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['title' => 'Dashboard', 'name' => 'index-dashboard'],
            ['title' => 'Atualizar perfil', 'name' => 'update-profile'],
            ['title' => 'Atualizar senha' ,'name' => 'update-password'],
            ['title' =>'Listar derrotas', 'name' => 'index-defeat'],
            ['title' =>'Mostrar derrota', 'name' => 'show-defeat'],
            ['title' =>'Cadastrar derrota', 'name' => 'store-defeat'],
            ['title' =>'Atualizar derrota', 'name' =>'update-defeat'],
            ['title' =>'Excluir derrota', 'name' =>'destroy-defeat'],
            ['title' =>'Importar dados derrota', 'name' =>'defeat-import'],
            ['title' =>'Listar usuários', 'name' =>'index-user'],
            ['title' =>'Cadastrar usuário', 'name' =>'store-user'],
            ['title' =>'Atualizar usuáiro', 'name' =>'update-user'],
            ['title' =>'Excluir usuário', 'name' =>'destroy-user'],
            ['title' =>'Atualizar senha usuário', 'name' =>'update-password-user'],
            ['title' =>'Importar dados usuário', 'name' =>'user-import'],
            ['title' =>'Listar papéis', 'name' => 'index-role'],
            ['title' =>'Cadastrar papel', 'name' => 'store-role'],
            ['title' =>'Atualizar papel', 'name' =>'update-role'],
            ['title' =>'Excluir papel', 'name' => 'destroy-role'],
            ['title' =>'Listar permissões do papel', 'name' => 'index-role-permission'],
            ['title' =>'Atualizar permissão do papel', 'name' => 'update-role-permission']
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'title' => $permission['title'],
                'name' => $permission['name'],
                'guard_name' => 'web'
            ]);
        }
    }
}
