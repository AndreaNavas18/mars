<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tendero;
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

        $tenderoPrueba = Tendero::where('nombre', 'tendero1')->first();
        if(!$tenderoPrueba){
            $tenderoPrueba = Tendero::create([
                'nombre' => 'tendero1',
                'cedula' => 'tendero1',
                'user_id' => $userTendero->id,
                'producto' => 'producto1',
                'canal' => 'canal1',
                'subcanal' => 'subcanal1',
                'region_nielsen' => 'region1',
                'codigo_pdv' => 'codigo1',
                'drop_size' => 1,
                'frecuencia' => 1,
                'prob_compra' => 1,
                'cuota_mes' => 1,
                'puntos' => '1',
            ]);
        }

        $tenderoPrueba2 = Tendero::where('nombre', 'tendero2')->first();
        if(!$tenderoPrueba2){
            $tenderoPrueba2 = Tendero::create([
                'nombre' => 'tendero2',
                'cedula' => 'tendero2',
                'user_id' => $userTendero2->id,
                'producto' => 'producto2',
                'canal' => 'canal2',
                'subcanal' => 'subcanal2',
                'region_nielsen' => 'region2',
                'codigo_pdv' => 'codigo2',
                'drop_size' => 2,
                'frecuencia' => 2,
                'prob_compra' => 2,
                'cuota_mes' => 2,
                'puntos' => '2',
            ]);
        }





    }
}

