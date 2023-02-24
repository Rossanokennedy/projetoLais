<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $table = '';

    public function run(): void
    {
        Estado::truncate();
        $csvData = fopen(base_path('storage\app\public\estados.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Estado::create([
                    'codigo_uf' => $data['0'],
                    'uf' => $data['1'],
                    'nome' => $data['2'],
                    'latitude' => $data['3'],
                    'longitude' => $data['4'],
                    'regiao' => $data['5'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
