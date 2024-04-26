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
                'name' => 'jonathan',
                'username' => 'vendedor1',
                'email' => 'j@j.com',
                'password' => Hash::make('123456'),
            ]);
        }

        $userAdmin = User::where('username', 'admin1')->first();
        if(!$userAdmin){
            $userAdmin = User::create([
                'name' => 'isabella',
                'username' => 'admin1',
                'email' => 'i@i.com',
                'password' => Hash::make('123456'),
            ]);
        }



    }
}

