<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tendero;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NuevosUsuariosProduccionSeeder extends Seeder
{
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        
        $userGdelapena = User::where('username', 'gdelapena')->first();
        if(!$userGdelapena){
            $userGdelapena = User::create([
                'name' => 'Giovanni de la Pena',
                'username' => 'gdelapena',
                'password' => Hash::make('9140089'),
            ]);
            $userGdelapena->assignRole($roleAdmin);
        }

        $userjorge = User::where('username', 'jaristizabal ')->first();
        if(!$userjorge){
            $userjorge = User::create([
                'name' => 'Jorge aristizabal',
                'username' => 'jaristizabal',
                'password' => Hash::make('16826375'),
            ]);
            $userjorge->assignRole($roleAdmin);
        }


    }
}

