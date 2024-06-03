<?php

namespace App\Imports;

use App\Models\Tendero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TenderoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tendero([
            'nombre' => $row['nombre'],
            'direccion' => $row['direccion'],
            'telefono' => $row['telefono'],
            'puntos' => $row['puntos'],
            'cedula' => $row['cedula'],
            // Asegúrate de que la columna 'user_id' esté presente en el archivo Excel si deseas establecer el id del usuario
            'user_id' => $row['user_id'],
        ]);
    }
}
