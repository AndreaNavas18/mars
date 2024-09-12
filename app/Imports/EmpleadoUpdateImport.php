<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Vendedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadoUpdateImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $vendedor = Vendedor::where('cedula', $row['cedula'])->first();

        // Si existe el vendedor, lo actualizamos
        if ($vendedor) {
            $vendedor->update([
                'telefono' => $row['telefono'],
                'canal' => $row['canal'],
            ]);

            return $vendedor;
        }

        return null;
    }
}
