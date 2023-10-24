<?php

namespace App\Imports;

use App\Models\Firma;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FirmasImport implements ToModel
{
    public function model(array $row)
    {
        return new Firma([
            'slug'     => $row[0],
            'title'    => $row[1]
            ]);
    }
}
