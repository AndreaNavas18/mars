<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $userVendedor = User::where('username', 'vendedor1')->first();
        if(!$userVendedor){
            $userVendedor = User::create([
                'name' => 'vendedor',
                'username' => 'vendedor1',
                'email' => 'k@j.com',
                'password' => Hash::make('123456'),
            ]);
        }

        $userAdmin = User::where('username', 'admin1')->first();
        if(!$userAdmin){
            $userAdmin = User::create([
                'name' => 'administrador',
                'username' => 'admin1',
                'email' => 'l@l.com',
                'password' => Hash::make('123456'),
            ]);
        }

        $userTendero = User::where('username', 'tendero1')->first();
        if(!$userTendero){
            $userTendero = User::create([
                'name' => 'tendero1',
                'username' => 'tendero1',
                'email' => 'i@i.com',
                'password' => Hash::make('123456'),
            ]);
        }

        $userTendero2 = User::where('username', 'tendero2')->first();
        if(!$userTendero2){
            $userTendero2 = User::create([
                'name' => 'tendero2',
                'username' => 'tendero2',
                'email' => 'j@j.com',
                'password' => Hash::make('123456'),
            ]);
        }



    }
}

