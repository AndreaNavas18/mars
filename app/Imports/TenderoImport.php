<?php

namespace App\Imports;

use App\Models\Tendero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Cumplimiento;
use Illuminate\Support\Facades\Log;

class TenderoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existingTendero = Tendero::where('cedula', $row['codigo_pdv'])->first();

        if ($existingTendero) {
            \Log::info('Tendero ya existe: ' . $row['codigo_pdv']);
            return $existingTendero;
        }

        $tendero = new Tendero([
            'producto' => $row['producto'],
            'canal' => $row['canal'],
            'subcanal' => $row['subcanal'],
            'region_nielsen' => $row['region_nielsen'],
            'cedula' => $row['codigo_pdv'],
            'nombre' => $row['nombre_pdv'],
            'drop_size' => $row['drop_size'],
            'frecuencia' => $row['frecuencia_compra'],
            'prob_compra' => $row['prob_compra'],
            'cuota_mes' => $row['cuota'],
        ]);

        $tendero->save();

        $cumplimiento = new Cumplimiento([
            'tendero_id' => $tendero->id,
        ]);

        $cumplimiento->save();

        return $tendero;
    }
}
