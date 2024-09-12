<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Vendedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $user = User::create([
            'name' => $row['nombre'],
            'username' => $row['cedula'],
            'password' => bcrypt($row['cedula']),
        ]);
    
        $user->assignRole('vendedor');

        $user->save();

        $user_id = $user->id;

        $vendedor = Vendedor::create([
            'nombre' => $row['nombre'],
            'cedula' => $row['cedula'],
            'canal' => $row['canal'],
            'email' => $row['email'],
            'telefono' => $row['telefono'],
            'user_id' => $user_id,
        ]);


        return $vendedor;

    }
}
