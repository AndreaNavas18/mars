<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Cumplimiento;

class EmpleadoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'producto' => $row['producto'],
            
        ]);
    }
}
