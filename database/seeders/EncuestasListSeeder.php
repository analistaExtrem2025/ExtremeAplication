<?php

namespace Database\Seeders;

use App\Models\EncuestasList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncuestasListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EncuestasList::truncate();
        EncuestasList::create(
            [
                'name' => 'departamentos',
                'list' => [
                    ["DEPARTAMENTO" => "ANTIOQUIA", "MUNICIPIO" => "MEDELLIN"],
                    ["DEPARTAMENTO" => "ATLANTICO", "MUNICIPIO" => "BARRANQUILLA"],
                    ["DEPARTAMENTO" => "BOGOTA", "MUNICIPIO" => "BOGOTA"],
                    ["DEPARTAMENTO" => "SANTANDER", "MUNICIPIO" => "BUCARAMANGA"],
                    ["DEPARTAMENTO" => "VALLE DEL CAUCA", "MUNICIPIO" => "CALI"],
                ]
            ]
        );
    }
}
