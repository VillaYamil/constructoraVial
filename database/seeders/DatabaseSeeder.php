<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 public function run(): void
{
    $this->call([
        ProvinceSeeder::class,
        TypeMachineSeeder::class,
        UserSeeder::class,
        WorkSeeder::class,
    ]);
}

}
