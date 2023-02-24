<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    static function import()
    {
        $file = storage_path('app/public/estados.csv');

        $csvData = file_get_contents($file);

        $rows = array_map("str_getcsv", explode("\n", $csvData));

        $header = array_shift($rows);

        foreach ($rows as $row) {
            $estado = new Estado();

            foreach ($header as $key => $column) {
                $estado->{$column} = $row[$key];
            }

            $estado->save();
        }
    }
}
