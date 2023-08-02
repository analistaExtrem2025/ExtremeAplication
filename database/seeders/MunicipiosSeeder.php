<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('municipios')->insert(['id' => '1', 'departamento_id' => 1, 'name' => 'Bogotá D.C.']); // phpcs:ignore
        DB::table('municipios')->insert(['id' => '2', 'departamento_id' => 2, 'name' => 'Medellín']); // phpcs:ignore
        DB::table('municipios')->insert(['id' => '3', 'departamento_id' => 3, 'name' => 'Barranquilla']); // phpcs:ignore
        DB::table('municipios')->insert(['id' => '4', 'departamento_id' => 4, 'name' => 'Soacha']); // phpcs:ignore
        DB::table('municipios')->insert(['id' => '5', 'departamento_id' => 5, 'name' => 'Bucaramanga']); // phpcs:ignore
        DB::table('municipios')->insert(['id' => '6', 'departamento_id' => 6, 'name' => 'Cali']); // phpcs:ignore
    }
}
