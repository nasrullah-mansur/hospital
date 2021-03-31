<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'user@email.com',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'email' => 'guzymolabi@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'jesita@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'tetybytem@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'nocuzakov@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'kemydikuxo@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'qysevava@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'kawojiqa@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'kinez@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'xyfiw@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'vipabakiw@mailinator.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'email' => 'hyjaguhuc@mailinator.com',
            'password' => Hash::make('password'),
        ]);
    }
}
