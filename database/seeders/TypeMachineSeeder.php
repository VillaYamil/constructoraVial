<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMachineSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('type_machines')->insert([
            [
                'name' => 'Tractor',
                'description' => 'Máquina tractor.',
            ],
            [
                'name' => 'Pala',
                'description' => 'Equipo pala.',
            ],
            [
                'name' => 'Hormigonera',
                'description' => 'Máquina hormigonera.',
            ],
        ]);
    }s
}
