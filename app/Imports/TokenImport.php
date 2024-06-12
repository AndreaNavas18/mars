<?php

namespace App\Imports;

use App\Models\Token;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TokenImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Token([
            'producto' => $row['producto'],
            
        ]);
    }
}
