<?php

namespace App\Imports;

use App\Models\Cumplimiento;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Tendero;
use Illuminate\Support\Facades\Log;


class CumplimientoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $cedula = $row['nit'];
        $tendero = Tendero::where('cedula', $cedula)->first();
        $tenderoC = Cumplimiento::where('tendero_id', $tendero->id)->first();

        if ($tenderoC) {
            if($row['ganador'] == 'GANA')
            {
                $tenderoC->mes_1 = 1;
                $tenderoC->save();
            }
        }

        return null;
    }
}