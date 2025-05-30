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
                'name' => 'Excavadora',
                'description' => 'Para mover tierra, excavar, y despejar materiales de la obra. ',
            ],
            [
                'name' => 'Retroexcavadora',
                'description' => 'Son versátiles y multifuncionales, con brazo giratorio para excavar y otros usos. ',
            ],
            [
                'name' => 'Compactadora',
                'description' => 'Se utilizan para compactar la tierra y el asfalto, asegurando una superficie sólida. ',
            ],
            [
                'name' => 'Pavimentadora',
                'description' => 'Extienden una capa uniforme de asfalto o hormigón sobre la carretera. ',
            ],
            [
                'name' => 'Motoniveladora',
                'description' => 'Ayudan a nivelar el terreno, preparando la superficie para pavimentar o construir. ',
            ],
            [
                'name' => 'Grúa',
                'description' => 'Se utilizan para levantar y mover cargas pesadas en la obra. ',
            ],
            [
                'name' => 'Camion Volquete',
                'description' => 'Transportan materiales sueltos, como tierra, áridos o escombros. ',
            ],
            [
                'name' => 'Rodillo Compactador',
                'description' => 'Compactan el suelo, asfalto o concreto para asegurar la estabilidad de la superficie. ',
            ],
            [
                'name' => 'Dumpers',
                'description' => 'Transportan materiales sueltos de forma eficiente en la obra. ',
            ],
            [
                'name' => 'Motoniveladoras',
                'description' => 'Ajustan y nivelan el terreno en las obras viales. ',
            ],
        ]);
    }
}
