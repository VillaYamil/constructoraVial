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
                'provinces_id' => 1,
            ],
            [
                'name' => 'Cosecha de Soja',
                'start_date' => '2025-04-15',
                'end_date' => '2025-04-30',
                'provinces_id' => 2,
            ],
            [
                'name' => 'Aplicación de Herbicida',
                'start_date' => '2025-05-12',
                'end_date' => '2025-05-14',
                'provinces_id' => 3,
            ],
            [
                'name' => 'Preparación del Suelo',
                'start_date' => '2025-03-20',
                'end_date' => '2025-03-25',
                'provinces_id' => 4,
            ],
        ]);
    }
}
