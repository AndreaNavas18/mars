<?php

namespace App\Imports;

use App\Models\Tendero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Cumplimiento;

class TenderoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tendero([
            'producto' => $row['producto'],
            'canal' => $row['canal'],
            'subcanal' => $row['subcanal'],
            'region_nielsen' => $row['region_nielsen'],
            'codigo_pdv' => $row['codigo_pdv'],
            'cedula' => $row['cedula_pdv'],
            'nombre' => $row['nombre_pdv'],
            'drop_size' => $row['drop_size'],
            'frecuencia' => $row['frecuencia_compra'],
            'prob_compra' => $row['prob_compra'],
            'cuota_mes' => $row['cuota'],
            'puntos' => $row['cumplimiento'],
            
        ]);
    }
}
