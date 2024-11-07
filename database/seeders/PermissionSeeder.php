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
            'index-dashboard',
            'update-profile',
            'update-password',
            'index-defeat',
            'show-defeat',
            'store-defeat',
            'update-defeat',
            'destroy-defeat',
            'defeat-import',
            'index-user',
            'store-user',
            'update-user',
            'destroy-user',
            'update-password-user',
            'user-import',
            'logout'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }
    }
}
