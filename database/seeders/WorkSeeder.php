<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('works')->insert([
            [
                'name' => 'Siembra de Maíz',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-10',
                'province_id' => 1,
            ],
            [
                'name' => 'Cosecha de Soja',
                'start_date' => '2025-04-15',
                'end_date' => '2025-04-30',
                'province_id' => 2,
            ],
            [
                'name' => 'Aplicación de Herbicida',
                'start_date' => '2025-05-12',
                'end_date' => '2025-05-14',
                'province_id' => 3,
            ],
            [
                'name' => 'Preparación del Suelo',
                'start_date' => '2025-03-20',
                'end_date' => '2025-03-25',
                'province_id' => 4,
            ],
        ]);
    }
}
