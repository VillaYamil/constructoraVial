<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('provinces')->insert([
            ['name' => 'Buenos Aires'],
            ['name' => 'Córdoba'],
            ['name' => 'Santa Fe'],
            ['name' => 'Mendoza'],
        ]);
    }
}
