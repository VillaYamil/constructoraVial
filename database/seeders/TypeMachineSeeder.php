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
                'description' => 'Máquina agrícola que se utiliza para arrastrar y operar implementos de labranza.',
            ],
            [
                'name' => 'Cosechadora',
                'description' => 'Equipo que se utiliza para recolectar granos y otros cultivos del campo.',
            ],
            [
                'name' => 'Sembradora',
                'description' => 'Máquina diseñada para colocar semillas en el suelo con precisión.',
            ],
            [
                'name' => 'Pulverizadora',
                'description' => 'Equipo utilizado para aplicar pesticidas, herbicidas o fertilizantes líquidos.',
            ],
        ]);
    }
}
