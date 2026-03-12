<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'name' => 'Marciel A. Varini',
            'nickname' => 'Marciel',
            'birthday' => '1988-04-28',
            'email' => 'marciel_mav@hotmail.com',
            'password' => Hash::make('123456b', ['rounds' => 12]),
        ]);
        $admin->assignRole('Administrador');

        $bruno = User::firstOrCreate([
            'name' => 'Bruno Prado',
            'nickname' => 'Bruno',
            'birthday' => '1988-04-28',
            'email' => 'bruno@email.com',
            'password' => Hash::make('123456b', ['rounds' => 12]),
        ]);
        $bruno->assignRole('Usuário');

        $jean = User::firstOrCreate([
            'name' => 'Jean Alves',
            'nickname' => 'Jean',
            'birthday' => '1988-04-28',
            'email' => 'jean@email.com',
            'password' => Hash::make('123456b', ['rounds' => 12]),
        ]);
        $jean->assignRole('Usuário');

        $miguel = User::firstOrCreate([
            'name' => 'Miguel',
            'nickname' => 'Miguel',
            'birthday' => '1988-04-28',
            'email' => 'Miguel@email.com',
            'password' => Hash::make('123456b', ['rounds' => 12]),
        ]);
        $miguel->assignRole('Usuário');

       $hugo = User::firstOrCreate([
            'name' => 'Hugo Varini',
            'nickname' => 'Hugo',
            'birthday' => '1988-04-28',
            'email' => 'hugo@email.com',
            'password' => Hash::make('123456b', ['rounds' => 12]),
        ]);
       $hugo->assignRole('Usuário');
    }
}
