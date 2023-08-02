<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('departamentos')->insert(
            [
                'nombre' => 'Bogotá D.C.'
            ]
        );

        DB::table('departamentos')->insert(
            [
                'nombre' => 'Antioquia'
            ]
        );

        DB::table('departamentos')->insert(
            [
                'nombre' => 'Atlántico'
            ]
        );

        DB::table('departamentos')->insert(
            [
                'nombre' => 'Cundinamarca'
            ]
        );

        DB::table('departamentos')->insert(
            [
                'nombre' => 'Santander'
            ]
        );

        DB::table('departamentos')->insert(
            [
                'nombre' => 'Valle del Cauca'
            ]
        );


    }
}
