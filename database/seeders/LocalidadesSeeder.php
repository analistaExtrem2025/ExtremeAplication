<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('localidades')->insert(['id' => '1',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Usaquén - 1']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '2',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Chapinero - 2']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '3',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Santa Fe - 3']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '4',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'San Cristóbal - 4']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '5',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Usme - 5']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '6',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Tunjuelito - 6']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '7',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Bosa - 7']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '8',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Kennedy - 8']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '9',  'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Fontibón - 9']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '10', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Engativá - 10']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '11', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Suba - 11']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '12', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Barrios Unidos - 12']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '13', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Teusaquillo - 13']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '14', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Los Mártires - 14']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '15', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Antonio Nariño - 15']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '16', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Puente Aranda - 16']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '17', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'La Candelaria - 17']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '18', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Rafael Uribe Uribe - 18']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '19', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Ciudad Bolívar - 19']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '20', 'departamento_id' => 1, 'municipio_id' => 1, 'name' => 'Sumapaz - 20']); // phpcs:ignore

        DB::table('localidades')->insert(['id' => '21', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 1 - Popular']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '22', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 2 - Santa Cruz']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '23', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 3 - Manrique']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '24', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 4 - Aranjuez']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '25', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 5 - Castilla']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '26', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 6 - Doce de Octubre']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '27', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 7 - Robledo']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '28', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 8 - Villa Hermosa']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '29', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 9 - Buenos Aires']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '30', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 10 - La Candelaria']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '31', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 11 - Laureles-Estadio']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '32', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 12 - La América']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '33', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 13 - San Javier']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '34', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 14 - El Poblado']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '35', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 15 - Guayabal']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '36', 'departamento_id' => 2, 'municipio_id' => 2, 'name' => 'Comuna 16 - Belén']); // phpcs:ignore

        DB::table('localidades')->insert(['id' => '37', 'departamento_id' => 3, 'municipio_id' => 3, 'name' => 'Localidad Suroccidente']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '38', 'departamento_id' => 3, 'municipio_id' => 3, 'name' => 'Localidad Suroriente']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '39', 'departamento_id' => 3, 'municipio_id' => 3, 'name' => 'Localidad Norte – Centro Histórico']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '40', 'departamento_id' => 3, 'municipio_id' => 3, 'name' => 'Localidad Metropolitana']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '41', 'departamento_id' => 3, 'municipio_id' => 3, 'name' => 'Localidad Riomar']); // phpcs:ignore

        DB::table('localidades')->insert(['id' => '42', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 1 Compartir']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '43', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 2 Soacha Central']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '44', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 3 La Despensa']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '45', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 4 Cazucá']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '46', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 5 San Mateo']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '47', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 6 San Humberto']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '48', 'departamento_id' => 4, 'municipio_id' => 4, 'name' => 'Comuna 7 Ciudad Verde']); // phpcs:ignore

        DB::table('localidades')->insert(['id' => '49', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 1 Norte:']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '50', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 2 Nororiental:']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '51', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 3 San Francisco:']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '52', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 4 Occidental:']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '53', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 5 García Rovira']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '54', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 6 La Concordia']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '55', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 7 La Ciudadela']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '56', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 8 Sur Occidente']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '57', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 9 La Pedregosa']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '58', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 10 Provenza']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '59', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 11 Sur']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '60', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 12 Cabecera del llano']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '61', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 13 Oriental']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '62', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 14 Morrorico']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '63', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 15 Centro']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '64', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 16 Lagos del Cacique']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '65', 'departamento_id' => 5, 'municipio_id' => 5, 'name' => 'Comuna 17 Mutis']); // phpcs:ignore

        DB::table('localidades')->insert(['id' => '66', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad Cali - Aguacatal']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '67', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad Cauca Norte']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '68', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad El Pondaje']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '69', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad Cauca - Sur']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '70', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad Pance - Lili']); // phpcs:ignore
        DB::table('localidades')->insert(['id' => '71', 'departamento_id' => 6, 'municipio_id' => 6, 'name' => 'Localidad Cañaveralejo']); // phpcs:ignore

    }
}
