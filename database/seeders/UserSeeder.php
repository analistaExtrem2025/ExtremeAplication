<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [

                'name' => 'Fernando Alexander Carillo Leon',
                'cedula' => 79760755,
                'email' => 'analista.procesos@extremmarketing.com',
                'departamento' => 'BOGOTA',
                'municipio' => 'BOGOTA',
                'password' => bcrypt('79760755')
            ]
        )->assignRole('admin');


        User::create(
            [

                'name' => 'promotor de prueba',
                'cedula' => 88888888,
                'departamento' => 'ANTIOQUIA',
                'municipio' => 'MEDELLIN',
                'email' => 'promotor@extremmarketing.com',
                'password' => bcrypt('123456789')
            ]
        )->assignRole('Promotor');


        User::create(
            [

                'name' => 'coordinador de prueba',
                'cedula' => 77777777,
                'departamento' => 'BOGOTA',
                'municipio' => 'BOGOTA',
                'email' => 'coordinador@extremmarketing.com',
                'password' => bcrypt('123456789')
            ]
        )->assignRole('Coordinador');

        // User::factory(25)->create();
    }
}
