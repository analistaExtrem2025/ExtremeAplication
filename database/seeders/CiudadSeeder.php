<?php
/**
 * PHP version 10
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <ferchocarrilloleon@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://on-360.com/
 */
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * MyClass Class Doc Comment
 *
 * @category Class
 * @package  MyPackage
 * @author   Author <ferchocarrilloleon@hotmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://on-360.com/
 */

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('ciudad')->truncate();

        DB::table('ciudad')->insert(['id_ciudad' => '1', 'departamento_id' => 1, 'Municipio' => 'Bogotá D.C.']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '2', 'departamento_id' => 2, 'Municipio' => 'Leticia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '3', 'departamento_id' => 2, 'Municipio' => 'La Chorrera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '4', 'departamento_id' => 2, 'Municipio' => 'La Pedrera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '5', 'departamento_id' => 2, 'Municipio' => 'La Victoria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '6', 'departamento_id' => 2, 'Municipio' => 'Mirití­-Paraná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '7', 'departamento_id' => 2, 'Municipio' => 'Puerto Alegré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '8', 'departamento_id' => 2, 'Municipio' => 'Puerto Arica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '9', 'departamento_id' => 2, 'Municipio' => 'Puerto Narií±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '10', 'departamento_id' => 2, 'Municipio' => 'Puerto Santander']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '11', 'departamento_id' => 2, 'Municipio' => 'Tarapacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '12', 'departamento_id' => 3, 'Municipio' => 'Medellí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '13', 'departamento_id' => 3, 'Municipio' => 'Abejorral']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '14', 'departamento_id' => 3, 'Municipio' => 'Abriaquí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '15', 'departamento_id' => 3, 'Municipio' => 'Alejandré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '16', 'departamento_id' => 3, 'Municipio' => 'Amagá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '17', 'departamento_id' => 3, 'Municipio' => 'Amalfi']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '18', 'departamento_id' => 3, 'Municipio' => 'Andes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '19', 'departamento_id' => 3, 'Municipio' => 'Angelí³polis']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '20', 'departamento_id' => 3, 'Municipio' => 'Angostura']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '21', 'departamento_id' => 3, 'Municipio' => 'Anorí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '22', 'departamento_id' => 3, 'Municipio' => 'Anzá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '23', 'departamento_id' => 3, 'Municipio' => 'Apartadí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '24', 'departamento_id' => 3, 'Municipio' => 'Arboletes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '25', 'departamento_id' => 3, 'Municipio' => 'Argelia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '26', 'departamento_id' => 3, 'Municipio' => 'Armenia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '27', 'departamento_id' => 3, 'Municipio' => 'Barbosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '28', 'departamento_id' => 3, 'Municipio' => 'Bello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '29', 'departamento_id' => 3, 'Municipio' => 'Belmira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '30', 'departamento_id' => 3, 'Municipio' => 'Betania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '31', 'departamento_id' => 3, 'Municipio' => 'Betulia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '32', 'departamento_id' => 3, 'Municipio' => 'Briceí±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '33', 'departamento_id' => 3, 'Municipio' => 'Buriticá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '34', 'departamento_id' => 3, 'Municipio' => 'Cáceres']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '35', 'departamento_id' => 3, 'Municipio' => 'Caicedo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '36', 'departamento_id' => 3, 'Municipio' => 'Caldas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '37', 'departamento_id' => 3, 'Municipio' => 'Campamento']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '38', 'departamento_id' => 3, 'Municipio' => 'Caí±asgordas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '39', 'departamento_id' => 3, 'Municipio' => 'Caracolí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '40', 'departamento_id' => 3, 'Municipio' => 'Caramanta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '41', 'departamento_id' => 3, 'Municipio' => 'Carepa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '42', 'departamento_id' => 3, 'Municipio' => 'Carolina del Prí­ncipe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '43', 'departamento_id' => 3, 'Municipio' => 'Caucasia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '44', 'departamento_id' => 3, 'Municipio' => 'Chigorodí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '45', 'departamento_id' => 3, 'Municipio' => 'Cisneros']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '46', 'departamento_id' => 3, 'Municipio' => 'Ciudad Bolí­var']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '47', 'departamento_id' => 3, 'Municipio' => 'Cocorná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '48', 'departamento_id' => 3, 'Municipio' => 'Concepcií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '49', 'departamento_id' => 3, 'Municipio' => 'Concordia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '50', 'departamento_id' => 3, 'Municipio' => 'Copacabana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '51', 'departamento_id' => 3, 'Municipio' => 'Dabeiba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '52', 'departamento_id' => 3, 'Municipio' => 'Donmatés']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '53', 'departamento_id' => 3, 'Municipio' => 'Ebí©jico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '54', 'departamento_id' => 3, 'Municipio' => 'El Bagre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '55', 'departamento_id' => 3, 'Municipio' => 'El Carmen de Viboral']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '56', 'departamento_id' => 3, 'Municipio' => 'El Peí±ol']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '57', 'departamento_id' => 3, 'Municipio' => 'El Retiro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '58', 'departamento_id' => 3, 'Municipio' => 'El Santuario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '59', 'departamento_id' => 3, 'Municipio' => 'Entrerrí­os']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '60', 'departamento_id' => 3, 'Municipio' => 'Envigado']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '61', 'departamento_id' => 3, 'Municipio' => 'Fredonia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '62', 'departamento_id' => 3, 'Municipio' => 'Frontino']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '63', 'departamento_id' => 3, 'Municipio' => 'Giraldo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '64', 'departamento_id' => 3, 'Municipio' => 'Girardota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '65', 'departamento_id' => 3, 'Municipio' => 'Gí³mez Plata']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '66', 'departamento_id' => 3, 'Municipio' => 'Granada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '67', 'departamento_id' => 3, 'Municipio' => 'Guadalupe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '68', 'departamento_id' => 3, 'Municipio' => 'Guarne']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '69', 'departamento_id' => 3, 'Municipio' => 'Guatapí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '70', 'departamento_id' => 3, 'Municipio' => 'Heliconia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '71', 'departamento_id' => 3, 'Municipio' => 'Hispania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '72', 'departamento_id' => 3, 'Municipio' => 'Itagí¼í­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '73', 'departamento_id' => 3, 'Municipio' => 'Ituango']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '74', 'departamento_id' => 3, 'Municipio' => 'Jardí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '75', 'departamento_id' => 3, 'Municipio' => 'Jericí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '76', 'departamento_id' => 3, 'Municipio' => 'La Ceja']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '77', 'departamento_id' => 3, 'Municipio' => 'La Estrella']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '78', 'departamento_id' => 3, 'Municipio' => 'La Pintada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '79', 'departamento_id' => 3, 'Municipio' => 'La Unií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '80', 'departamento_id' => 3, 'Municipio' => 'Liborina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '81', 'departamento_id' => 3, 'Municipio' => 'Maceo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '82', 'departamento_id' => 3, 'Municipio' => 'Marinilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '83', 'departamento_id' => 3, 'Municipio' => 'Montebello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '84', 'departamento_id' => 3, 'Municipio' => 'Murindí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '85', 'departamento_id' => 3, 'Municipio' => 'Mutatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '86', 'departamento_id' => 3, 'Municipio' => 'Narií±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '87', 'departamento_id' => 3, 'Municipio' => 'Nechí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '88', 'departamento_id' => 3, 'Municipio' => 'Necoclí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '89', 'departamento_id' => 3, 'Municipio' => 'Olaya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '90', 'departamento_id' => 3, 'Municipio' => 'Peque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '91', 'departamento_id' => 3, 'Municipio' => 'Pueblorrico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '92', 'departamento_id' => 3, 'Municipio' => 'Puerto Berrí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '93', 'departamento_id' => 3, 'Municipio' => 'Puerto Nare']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '94', 'departamento_id' => 3, 'Municipio' => 'Puerto Triunfo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '95', 'departamento_id' => 3, 'Municipio' => 'Remedios']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '96', 'departamento_id' => 3, 'Municipio' => 'Rionegro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '97', 'departamento_id' => 3, 'Municipio' => 'Sabanalarga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '98', 'departamento_id' => 3, 'Municipio' => 'Sabaneta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '99', 'departamento_id' => 3, 'Municipio' => 'Salgar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '100', 'departamento_id' => 3, 'Municipio' => 'San Andrí©s de Cuerquia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '101', 'departamento_id' => 3, 'Municipio' => 'San Carlos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '102', 'departamento_id' => 3, 'Municipio' => 'San Francisco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '103', 'departamento_id' => 3, 'Municipio' => 'San Jerí³nimo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '104', 'departamento_id' => 3, 'Municipio' => 'San Josí© de la Montaí±a']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '105', 'departamento_id' => 3, 'Municipio' => 'San Juan de Urabá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '106', 'departamento_id' => 3, 'Municipio' => 'San Luis']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '107', 'departamento_id' => 3, 'Municipio' => 'San Pedro de los Milagros']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '108', 'departamento_id' => 3, 'Municipio' => 'San Pedro de Urabá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '109', 'departamento_id' => 3, 'Municipio' => 'San Rafael']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '110', 'departamento_id' => 3, 'Municipio' => 'San Roque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '111', 'departamento_id' => 3, 'Municipio' => 'San Vicente']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '112', 'departamento_id' => 3, 'Municipio' => 'Santa Bárbara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '113', 'departamento_id' => 3, 'Municipio' => 'Santa Fe de Antioquia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '114', 'departamento_id' => 3, 'Municipio' => 'Santa Rosa de Osos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '115', 'departamento_id' => 3, 'Municipio' => 'Santo Domingo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '116', 'departamento_id' => 3, 'Municipio' => 'Segovia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '117', 'departamento_id' => 3, 'Municipio' => 'Sonsí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '118', 'departamento_id' => 3, 'Municipio' => 'Sopetrán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '119', 'departamento_id' => 3, 'Municipio' => 'Támesis']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '120', 'departamento_id' => 3, 'Municipio' => 'Tarazá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '121', 'departamento_id' => 3, 'Municipio' => 'Tarso']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '122', 'departamento_id' => 3, 'Municipio' => 'Titiribí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '123', 'departamento_id' => 3, 'Municipio' => 'Toledo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '124', 'departamento_id' => 3, 'Municipio' => 'Turbo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '125', 'departamento_id' => 3, 'Municipio' => 'Uramita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '126', 'departamento_id' => 3, 'Municipio' => 'Urrao']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '127', 'departamento_id' => 3, 'Municipio' => 'Valdivia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '128', 'departamento_id' => 3, 'Municipio' => 'Valparaí­so']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '129', 'departamento_id' => 3, 'Municipio' => 'Vegachí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '130', 'departamento_id' => 3, 'Municipio' => 'Venecia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '131', 'departamento_id' => 3, 'Municipio' => 'Vigé del Fuerte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '132', 'departamento_id' => 3, 'Municipio' => 'Yalí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '133', 'departamento_id' => 3, 'Municipio' => 'Yarumal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '134', 'departamento_id' => 3, 'Municipio' => 'Yolombí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '135', 'departamento_id' => 3, 'Municipio' => 'Yondí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '136', 'departamento_id' => 3, 'Municipio' => 'Zaragoza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '137', 'departamento_id' => 4, 'Municipio' => 'Arauca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '138', 'departamento_id' => 4, 'Municipio' => 'Arauquita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '139', 'departamento_id' => 4, 'Municipio' => 'Cravo Norte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '140', 'departamento_id' => 4, 'Municipio' => 'Fortul']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '141', 'departamento_id' => 4, 'Municipio' => 'Puerto Rondí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '142', 'departamento_id' => 4, 'Municipio' => 'Saravena']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '143', 'departamento_id' => 4, 'Municipio' => 'Tame']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '144', 'departamento_id' => 5, 'Municipio' => 'Barranquilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '145', 'departamento_id' => 5, 'Municipio' => 'Baranoa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '146', 'departamento_id' => 5, 'Municipio' => 'Campo de la Cruz']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '147', 'departamento_id' => 5, 'Municipio' => 'Candelaria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '148', 'departamento_id' => 5, 'Municipio' => 'Galapa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '149', 'departamento_id' => 5, 'Municipio' => 'Juan de Acosta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '150', 'departamento_id' => 5, 'Municipio' => 'Luruaco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '151', 'departamento_id' => 5, 'Municipio' => 'Malambo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '152', 'departamento_id' => 5, 'Municipio' => 'Manatí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '153', 'departamento_id' => 5, 'Municipio' => 'Palmar de Varela']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '154', 'departamento_id' => 5, 'Municipio' => 'Piojí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '155', 'departamento_id' => 5, 'Municipio' => 'Polonuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '156', 'departamento_id' => 5, 'Municipio' => 'Ponedera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '157', 'departamento_id' => 5, 'Municipio' => 'Puerto Colombia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '158', 'departamento_id' => 5, 'Municipio' => 'Repelí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '159', 'departamento_id' => 5, 'Municipio' => 'Sabanagrande']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '160', 'departamento_id' => 5, 'Municipio' => 'Sabanalarga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '161', 'departamento_id' => 5, 'Municipio' => 'Santa Lucé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '162', 'departamento_id' => 5, 'Municipio' => 'Santo Tomás']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '163', 'departamento_id' => 5, 'Municipio' => 'Soledad']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '164', 'departamento_id' => 5, 'Municipio' => 'Suan']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '165', 'departamento_id' => 5, 'Municipio' => 'Tubará']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '166', 'departamento_id' => 5, 'Municipio' => 'Usiacurí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '167', 'departamento_id' => 6, 'Municipio' => 'Cartagena de Indias']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '168', 'departamento_id' => 6, 'Municipio' => 'Achí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '169', 'departamento_id' => 6, 'Municipio' => 'Altos del Rosario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '170', 'departamento_id' => 6, 'Municipio' => 'Arenal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '171', 'departamento_id' => 6, 'Municipio' => 'Arjona']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '172', 'departamento_id' => 6, 'Municipio' => 'Arroyohondo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '173', 'departamento_id' => 6, 'Municipio' => 'Barranco de Loba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '174', 'departamento_id' => 6, 'Municipio' => 'Calamar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '175', 'departamento_id' => 6, 'Municipio' => 'Cantagallo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '176', 'departamento_id' => 6, 'Municipio' => 'Cicuco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '177', 'departamento_id' => 6, 'Municipio' => 'Clemencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '178', 'departamento_id' => 6, 'Municipio' => 'Cí³rdoba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '179', 'departamento_id' => 6, 'Municipio' => 'El Carmen de Bolí­var']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '180', 'departamento_id' => 6, 'Municipio' => 'El Guamo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '181', 'departamento_id' => 6, 'Municipio' => 'El Peí±í³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '182', 'departamento_id' => 6, 'Municipio' => 'Hatillo de Loba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '183', 'departamento_id' => 6, 'Municipio' => 'Maganguí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '184', 'departamento_id' => 6, 'Municipio' => 'Mahates']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '185', 'departamento_id' => 6, 'Municipio' => 'Margarita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '186', 'departamento_id' => 6, 'Municipio' => 'Maré La Baja']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '187', 'departamento_id' => 6, 'Municipio' => 'Montecristo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '188', 'departamento_id' => 6, 'Municipio' => 'Morales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '189', 'departamento_id' => 6, 'Municipio' => 'Norosí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '190', 'departamento_id' => 6, 'Municipio' => 'Pinillos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '191', 'departamento_id' => 6, 'Municipio' => 'Regidor']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '192', 'departamento_id' => 6, 'Municipio' => 'Rí­o Viejo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '193', 'departamento_id' => 6, 'Municipio' => 'San Cristí³bal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '194', 'departamento_id' => 6, 'Municipio' => 'San Estanislao']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '195', 'departamento_id' => 6, 'Municipio' => 'San Fernando']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '196', 'departamento_id' => 6, 'Municipio' => 'San Jacinto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '197', 'departamento_id' => 6, 'Municipio' => 'San Jacinto del Cauca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '198', 'departamento_id' => 6, 'Municipio' => 'San Juan Nepomuceno']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '199', 'departamento_id' => 6, 'Municipio' => 'San Martí­n de Loba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '200', 'departamento_id' => 6, 'Municipio' => 'San Pablo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '201', 'departamento_id' => 6, 'Municipio' => 'Santa Catalina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '202', 'departamento_id' => 6, 'Municipio' => 'Santa Cruz de Mompox']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '203', 'departamento_id' => 6, 'Municipio' => 'Santa Rosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '204', 'departamento_id' => 6, 'Municipio' => 'Santa Rosa del Sur']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '205', 'departamento_id' => 6, 'Municipio' => 'Simití­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '206', 'departamento_id' => 6, 'Municipio' => 'Soplaviento']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '207', 'departamento_id' => 6, 'Municipio' => 'Talaigua Nuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '208', 'departamento_id' => 6, 'Municipio' => 'Tiquisio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '209', 'departamento_id' => 6, 'Municipio' => 'Turbaco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '210', 'departamento_id' => 6, 'Municipio' => 'Turbaná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '211', 'departamento_id' => 6, 'Municipio' => 'Villanueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '212', 'departamento_id' => 6, 'Municipio' => 'Zambrano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '213', 'departamento_id' => 7, 'Municipio' => 'Tunja']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '214', 'departamento_id' => 7, 'Municipio' => 'Almeida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '215', 'departamento_id' => 7, 'Municipio' => 'Aquitania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '216', 'departamento_id' => 7, 'Municipio' => 'Arcabuco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '217', 'departamento_id' => 7, 'Municipio' => 'Belí©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '218', 'departamento_id' => 7, 'Municipio' => 'Berbeo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '219', 'departamento_id' => 7, 'Municipio' => 'Betí©itiva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '220', 'departamento_id' => 7, 'Municipio' => 'Boavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '221', 'departamento_id' => 7, 'Municipio' => 'Boyacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '222', 'departamento_id' => 7, 'Municipio' => 'Briceí±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '223', 'departamento_id' => 7, 'Municipio' => 'Buenavista']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '224', 'departamento_id' => 7, 'Municipio' => 'Busbanzá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '225', 'departamento_id' => 7, 'Municipio' => 'Caldas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '226', 'departamento_id' => 7, 'Municipio' => 'Campohermoso']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '227', 'departamento_id' => 7, 'Municipio' => 'Cerinza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '228', 'departamento_id' => 7, 'Municipio' => 'Chinavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '229', 'departamento_id' => 7, 'Municipio' => 'Chiquinquirá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '230', 'departamento_id' => 7, 'Municipio' => 'Chí­quiza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '231', 'departamento_id' => 7, 'Municipio' => 'Chiscas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '232', 'departamento_id' => 7, 'Municipio' => 'Chita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '233', 'departamento_id' => 7, 'Municipio' => 'Chitaraque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '234', 'departamento_id' => 7, 'Municipio' => 'Chivatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '235', 'departamento_id' => 7, 'Municipio' => 'Chivor']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '236', 'departamento_id' => 7, 'Municipio' => 'Cií©nega']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '237', 'departamento_id' => 7, 'Municipio' => 'Cí³mbita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '238', 'departamento_id' => 7, 'Municipio' => 'Coper']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '239', 'departamento_id' => 7, 'Municipio' => 'Corrales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '240', 'departamento_id' => 7, 'Municipio' => 'Covaraché']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '241', 'departamento_id' => 7, 'Municipio' => 'Cubará']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '242', 'departamento_id' => 7, 'Municipio' => 'Cucaita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '243', 'departamento_id' => 7, 'Municipio' => 'Cuí­tiva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '244', 'departamento_id' => 7, 'Municipio' => 'Duitama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '245', 'departamento_id' => 7, 'Municipio' => 'El Cocuy']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '246', 'departamento_id' => 7, 'Municipio' => 'El Espino']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '247', 'departamento_id' => 7, 'Municipio' => 'Firavitoba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '248', 'departamento_id' => 7, 'Municipio' => 'Floresta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '249', 'departamento_id' => 7, 'Municipio' => 'Gachantivá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '250', 'departamento_id' => 7, 'Municipio' => 'Gámeza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '251', 'departamento_id' => 7, 'Municipio' => 'Garagoa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '252', 'departamento_id' => 7, 'Municipio' => 'Guacamayas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '253', 'departamento_id' => 7, 'Municipio' => 'Guateque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '254', 'departamento_id' => 7, 'Municipio' => 'Guayatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '255', 'departamento_id' => 7, 'Municipio' => 'Gí¼icán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '256', 'departamento_id' => 7, 'Municipio' => 'Iza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '257', 'departamento_id' => 7, 'Municipio' => 'Jenesano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '258', 'departamento_id' => 7, 'Municipio' => 'Jericí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '259', 'departamento_id' => 7, 'Municipio' => 'La Capilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '260', 'departamento_id' => 7, 'Municipio' => 'La Uvita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '261', 'departamento_id' => 7, 'Municipio' => 'La Victoria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '262', 'departamento_id' => 7, 'Municipio' => 'Labranzagrande']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '263', 'departamento_id' => 7, 'Municipio' => 'Macanal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '264', 'departamento_id' => 7, 'Municipio' => 'Maripí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '265', 'departamento_id' => 7, 'Municipio' => 'Miraflores']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '266', 'departamento_id' => 7, 'Municipio' => 'Mongua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '267', 'departamento_id' => 7, 'Municipio' => 'Monguí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '268', 'departamento_id' => 7, 'Municipio' => 'Moniquirá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '269', 'departamento_id' => 7, 'Municipio' => 'Motavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '270', 'departamento_id' => 7, 'Municipio' => 'Muzo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '271', 'departamento_id' => 7, 'Municipio' => 'Nobsa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '272', 'departamento_id' => 7, 'Municipio' => 'Nuevo Colí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '273', 'departamento_id' => 7, 'Municipio' => 'Oicatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '274', 'departamento_id' => 7, 'Municipio' => 'Otanche']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '275', 'departamento_id' => 7, 'Municipio' => 'Pachavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '276', 'departamento_id' => 7, 'Municipio' => 'Páez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '277', 'departamento_id' => 7, 'Municipio' => 'Paipa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '278', 'departamento_id' => 7, 'Municipio' => 'Pajarito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '279', 'departamento_id' => 7, 'Municipio' => 'Panqueba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '280', 'departamento_id' => 7, 'Municipio' => 'Pauna']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '281', 'departamento_id' => 7, 'Municipio' => 'Paya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '282', 'departamento_id' => 7, 'Municipio' => 'Paz de Rí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '283', 'departamento_id' => 7, 'Municipio' => 'Pesca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '284', 'departamento_id' => 7, 'Municipio' => 'Pisba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '285', 'departamento_id' => 7, 'Municipio' => 'Puerto Boyacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '286', 'departamento_id' => 7, 'Municipio' => 'Quí­pama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '287', 'departamento_id' => 7, 'Municipio' => 'Ramiriquí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '288', 'departamento_id' => 7, 'Municipio' => 'Ráquira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '289', 'departamento_id' => 7, 'Municipio' => 'Rondí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '290', 'departamento_id' => 7, 'Municipio' => 'Saboyá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '291', 'departamento_id' => 7, 'Municipio' => 'Sáchica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '292', 'departamento_id' => 7, 'Municipio' => 'Samacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '293', 'departamento_id' => 7, 'Municipio' => 'San Eduardo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '294', 'departamento_id' => 7, 'Municipio' => 'San Josí© de Pare']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '295', 'departamento_id' => 7, 'Municipio' => 'San Luis de Gaceno']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '296', 'departamento_id' => 7, 'Municipio' => 'San Mateo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '297', 'departamento_id' => 7, 'Municipio' => 'San Miguel de Sema']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '298', 'departamento_id' => 7, 'Municipio' => 'San Pablo de Borbur']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '299', 'departamento_id' => 7, 'Municipio' => 'Santa Maré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '300', 'departamento_id' => 7, 'Municipio' => 'Santa Rosa de Viterbo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '301', 'departamento_id' => 7, 'Municipio' => 'Santa Sofé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '302', 'departamento_id' => 7, 'Municipio' => 'Santana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '303', 'departamento_id' => 7, 'Municipio' => 'Sativanorte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '304', 'departamento_id' => 7, 'Municipio' => 'Sativasur']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '305', 'departamento_id' => 7, 'Municipio' => 'Siachoque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '306', 'departamento_id' => 7, 'Municipio' => 'Soatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '307', 'departamento_id' => 7, 'Municipio' => 'Socha']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '308', 'departamento_id' => 7, 'Municipio' => 'Socotá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '309', 'departamento_id' => 7, 'Municipio' => 'Sogamoso']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '310', 'departamento_id' => 7, 'Municipio' => 'Somondoco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '311', 'departamento_id' => 7, 'Municipio' => 'Sora']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '312', 'departamento_id' => 7, 'Municipio' => 'Soracá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '313', 'departamento_id' => 7, 'Municipio' => 'Sotaquirá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '314', 'departamento_id' => 7, 'Municipio' => 'Susací³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '315', 'departamento_id' => 7, 'Municipio' => 'Sutamarchán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '316', 'departamento_id' => 7, 'Municipio' => 'Sutatenza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '317', 'departamento_id' => 7, 'Municipio' => 'Tasco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '318', 'departamento_id' => 7, 'Municipio' => 'Tenza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '319', 'departamento_id' => 7, 'Municipio' => 'Tibaná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '320', 'departamento_id' => 7, 'Municipio' => 'Tibasosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '321', 'departamento_id' => 7, 'Municipio' => 'Tinjacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '322', 'departamento_id' => 7, 'Municipio' => 'Tipacoque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '323', 'departamento_id' => 7, 'Municipio' => 'Toca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '324', 'departamento_id' => 7, 'Municipio' => 'Togí¼í­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '325', 'departamento_id' => 7, 'Municipio' => 'Tí³paga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '326', 'departamento_id' => 7, 'Municipio' => 'Tota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '327', 'departamento_id' => 7, 'Municipio' => 'Tununguá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '328', 'departamento_id' => 7, 'Municipio' => 'Turmequí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '329', 'departamento_id' => 7, 'Municipio' => 'Tuta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '330', 'departamento_id' => 7, 'Municipio' => 'Tutazá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '331', 'departamento_id' => 7, 'Municipio' => 'íšmbita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '332', 'departamento_id' => 7, 'Municipio' => 'Ventaquemada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '333', 'departamento_id' => 7, 'Municipio' => 'Villa de Leyva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '334', 'departamento_id' => 7, 'Municipio' => 'Viracachá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '335', 'departamento_id' => 7, 'Municipio' => 'Zetaquira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '336', 'departamento_id' => 8, 'Municipio' => 'Risaralda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '337', 'departamento_id' => 8, 'Municipio' => 'Aguadas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '338', 'departamento_id' => 8, 'Municipio' => 'Anserma']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '339', 'departamento_id' => 8, 'Municipio' => 'Aranzazu']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '340', 'departamento_id' => 8, 'Municipio' => 'Belalcázar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '341', 'departamento_id' => 8, 'Municipio' => 'Chinchiná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '342', 'departamento_id' => 8, 'Municipio' => 'Filadelfia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '343', 'departamento_id' => 8, 'Municipio' => 'La Dorada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '344', 'departamento_id' => 8, 'Municipio' => 'La Merced']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '345', 'departamento_id' => 8, 'Municipio' => 'Manizales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '346', 'departamento_id' => 8, 'Municipio' => 'Manzanares']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '347', 'departamento_id' => 8, 'Municipio' => 'Marmato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '348', 'departamento_id' => 8, 'Municipio' => 'Marquetalia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '349', 'departamento_id' => 8, 'Municipio' => 'Marulanda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '350', 'departamento_id' => 8, 'Municipio' => 'Neira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '351', 'departamento_id' => 8, 'Municipio' => 'Norcasia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '352', 'departamento_id' => 8, 'Municipio' => 'Pácora']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '353', 'departamento_id' => 8, 'Municipio' => 'Palestina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '354', 'departamento_id' => 8, 'Municipio' => 'Pensilvania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '355', 'departamento_id' => 8, 'Municipio' => 'Riosucio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '356', 'departamento_id' => 8, 'Municipio' => 'Salamina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '357', 'departamento_id' => 8, 'Municipio' => 'Samaná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '358', 'departamento_id' => 8, 'Municipio' => 'San Josí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '359', 'departamento_id' => 8, 'Municipio' => 'Supé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '360', 'departamento_id' => 8, 'Municipio' => 'Victoria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '361', 'departamento_id' => 8, 'Municipio' => 'Villamaré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '362', 'departamento_id' => 8, 'Municipio' => 'Viterbo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '363', 'departamento_id' => 9, 'Municipio' => 'Florencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '364', 'departamento_id' => 9, 'Municipio' => 'Albania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '365', 'departamento_id' => 9, 'Municipio' => 'Belí©n de los Andaquí­es']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '366', 'departamento_id' => 9, 'Municipio' => 'Cartagena del Chairá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '367', 'departamento_id' => 9, 'Municipio' => 'Curillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '368', 'departamento_id' => 9, 'Municipio' => 'El Doncello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '369', 'departamento_id' => 9, 'Municipio' => 'El Paujil']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '370', 'departamento_id' => 9, 'Municipio' => 'La Montaí±ita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '371', 'departamento_id' => 9, 'Municipio' => 'Morelia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '372', 'departamento_id' => 9, 'Municipio' => 'Puerto Milán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '373', 'departamento_id' => 9, 'Municipio' => 'Puerto Rico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '374', 'departamento_id' => 9, 'Municipio' => 'San Josí© del Fragua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '375', 'departamento_id' => 9, 'Municipio' => 'San Vicente del Caguán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '376', 'departamento_id' => 9, 'Municipio' => 'Solano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '377', 'departamento_id' => 9, 'Municipio' => 'Solita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '378', 'departamento_id' => 9, 'Municipio' => 'Valparaí­so']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '379', 'departamento_id' => 10, 'Municipio' => 'Yopal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '380', 'departamento_id' => 10, 'Municipio' => 'Aguazul']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '381', 'departamento_id' => 10, 'Municipio' => 'Chámeza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '382', 'departamento_id' => 10, 'Municipio' => 'Hato Corozal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '383', 'departamento_id' => 10, 'Municipio' => 'La Salina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '384', 'departamento_id' => 10, 'Municipio' => 'Maní­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '385', 'departamento_id' => 10, 'Municipio' => 'Monterrey']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '386', 'departamento_id' => 10, 'Municipio' => 'Nunché']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '387', 'departamento_id' => 10, 'Municipio' => 'Orocuí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '388', 'departamento_id' => 10, 'Municipio' => 'Paz de Ariporo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '389', 'departamento_id' => 10, 'Municipio' => 'Pore']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '390', 'departamento_id' => 10, 'Municipio' => 'Recetor']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '391', 'departamento_id' => 10, 'Municipio' => 'Sabanalarga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '392', 'departamento_id' => 10, 'Municipio' => 'Sácama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '393', 'departamento_id' => 10, 'Municipio' => 'San Luis de Palenque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '394', 'departamento_id' => 10, 'Municipio' => 'Támara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '395', 'departamento_id' => 10, 'Municipio' => 'Tauramena']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '396', 'departamento_id' => 10, 'Municipio' => 'Trinidad']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '397', 'departamento_id' => 10, 'Municipio' => 'Villanueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '398', 'departamento_id' => 10, 'Municipio' => 'Yopal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '399', 'departamento_id' => 10, 'Municipio' => 'Aguazul']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '400', 'departamento_id' => 10, 'Municipio' => 'Chámeza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '401', 'departamento_id' => 10, 'Municipio' => 'Hato Corozal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '402', 'departamento_id' => 10, 'Municipio' => 'La Salina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '403', 'departamento_id' => 10, 'Municipio' => 'Maní­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '404', 'departamento_id' => 10, 'Municipio' => 'Monterrey']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '405', 'departamento_id' => 10, 'Municipio' => 'Nunché']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '406', 'departamento_id' => 10, 'Municipio' => 'Orocuí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '407', 'departamento_id' => 10, 'Municipio' => 'Paz de Ariporo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '408', 'departamento_id' => 10, 'Municipio' => 'Pore']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '409', 'departamento_id' => 10, 'Municipio' => 'Recetor']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '410', 'departamento_id' => 10, 'Municipio' => 'Sabanalarga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '411', 'departamento_id' => 10, 'Municipio' => 'Sácama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '412', 'departamento_id' => 10, 'Municipio' => 'San Luis de Palenque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '413', 'departamento_id' => 10, 'Municipio' => 'Támara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '414', 'departamento_id' => 10, 'Municipio' => 'Tauramena']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '415', 'departamento_id' => 10, 'Municipio' => 'Trinidad']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '416', 'departamento_id' => 10, 'Municipio' => 'Villanueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '417', 'departamento_id' => 11, 'Municipio' => 'Popayán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '418', 'departamento_id' => 11, 'Municipio' => 'Almaguer']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '419', 'departamento_id' => 11, 'Municipio' => 'Argelia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '420', 'departamento_id' => 11, 'Municipio' => 'Balboa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '421', 'departamento_id' => 11, 'Municipio' => 'Bolí­var']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '422', 'departamento_id' => 11, 'Municipio' => 'Buenos Aires']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '423', 'departamento_id' => 11, 'Municipio' => 'Cajibí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '424', 'departamento_id' => 11, 'Municipio' => 'Caldono']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '425', 'departamento_id' => 11, 'Municipio' => 'Caloto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '426', 'departamento_id' => 11, 'Municipio' => 'Corinto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '427', 'departamento_id' => 11, 'Municipio' => 'El Tambo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '428', 'departamento_id' => 11, 'Municipio' => 'Florencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '429', 'departamento_id' => 11, 'Municipio' => 'Guachení©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '430', 'departamento_id' => 11, 'Municipio' => 'Guapi']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '431', 'departamento_id' => 11, 'Municipio' => 'Inzá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '432', 'departamento_id' => 11, 'Municipio' => 'Jambalí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '433', 'departamento_id' => 11, 'Municipio' => 'La Sierra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '434', 'departamento_id' => 11, 'Municipio' => 'La Vega']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '435', 'departamento_id' => 11, 'Municipio' => 'Lí³pez de Micay']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '436', 'departamento_id' => 11, 'Municipio' => 'Mercaderes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '437', 'departamento_id' => 11, 'Municipio' => 'Miranda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '438', 'departamento_id' => 11, 'Municipio' => 'Morales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '439', 'departamento_id' => 11, 'Municipio' => 'Padilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '440', 'departamento_id' => 11, 'Municipio' => 'Páez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '441', 'departamento_id' => 11, 'Municipio' => 'Paté']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '442', 'departamento_id' => 11, 'Municipio' => 'Piamonte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '443', 'departamento_id' => 11, 'Municipio' => 'Piendamí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '444', 'departamento_id' => 11, 'Municipio' => 'Puerto Tejada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '445', 'departamento_id' => 11, 'Municipio' => 'Purací© - Coconuco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '446', 'departamento_id' => 11, 'Municipio' => 'Rosas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '447', 'departamento_id' => 11, 'Municipio' => 'San Sebastián']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '448', 'departamento_id' => 11, 'Municipio' => 'Santa Rosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '449', 'departamento_id' => 11, 'Municipio' => 'Santander de Quilichao']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '450', 'departamento_id' => 11, 'Municipio' => 'Silvia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '451', 'departamento_id' => 11, 'Municipio' => 'Sotará']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '452', 'departamento_id' => 11, 'Municipio' => 'Suárez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '453', 'departamento_id' => 11, 'Municipio' => 'Sucre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '454', 'departamento_id' => 11, 'Municipio' => 'Timbí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '455', 'departamento_id' => 11, 'Municipio' => 'Timbiquí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '456', 'departamento_id' => 11, 'Municipio' => 'Toribí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '457', 'departamento_id' => 11, 'Municipio' => 'Totorí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '458', 'departamento_id' => 11, 'Municipio' => 'Villa Rica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '459', 'departamento_id' => 12, 'Municipio' => 'Valledupar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '460', 'departamento_id' => 12, 'Municipio' => 'Aguachica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '461', 'departamento_id' => 12, 'Municipio' => 'Agustí­n Codazzi']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '462', 'departamento_id' => 12, 'Municipio' => 'Astrea']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '463', 'departamento_id' => 12, 'Municipio' => 'Becerril']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '464', 'departamento_id' => 12, 'Municipio' => 'Bosconia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '465', 'departamento_id' => 12, 'Municipio' => 'Chimichagua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '466', 'departamento_id' => 12, 'Municipio' => 'Chiriguaná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '467', 'departamento_id' => 12, 'Municipio' => 'Curumaní­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '468', 'departamento_id' => 12, 'Municipio' => 'El Copey']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '469', 'departamento_id' => 12, 'Municipio' => 'El Paso']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '470', 'departamento_id' => 12, 'Municipio' => 'Gamarra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '471', 'departamento_id' => 12, 'Municipio' => 'González']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '472', 'departamento_id' => 12, 'Municipio' => 'La Gloria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '473', 'departamento_id' => 12, 'Municipio' => 'La Jagua de Ibirico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '474', 'departamento_id' => 12, 'Municipio' => 'LaÂ Paz']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '475', 'departamento_id' => 12, 'Municipio' => 'Manaure Balcí³n del Cesar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '476', 'departamento_id' => 12, 'Municipio' => 'Pailitas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '477', 'departamento_id' => 12, 'Municipio' => 'Pelaya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '478', 'departamento_id' => 12, 'Municipio' => 'Pueblo Bello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '479', 'departamento_id' => 12, 'Municipio' => 'Rí­o de Oro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '480', 'departamento_id' => 12, 'Municipio' => 'San Alberto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '481', 'departamento_id' => 12, 'Municipio' => 'San Diego']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '482', 'departamento_id' => 12, 'Municipio' => 'San Martí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '483', 'departamento_id' => 12, 'Municipio' => 'Tamalameque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '484', 'departamento_id' => 13, 'Municipio' => 'Quibdí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '485', 'departamento_id' => 13, 'Municipio' => 'Acandí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '486', 'departamento_id' => 13, 'Municipio' => 'Alto Baudí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '487', 'departamento_id' => 13, 'Municipio' => 'Atrato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '488', 'departamento_id' => 13, 'Municipio' => 'Bagadí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '489', 'departamento_id' => 13, 'Municipio' => 'Bahé Solano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '490', 'departamento_id' => 13, 'Municipio' => 'Bajo Baudí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '491', 'departamento_id' => 13, 'Municipio' => 'Bojayá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '492', 'departamento_id' => 13, 'Municipio' => 'Cí©rtegui']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '493', 'departamento_id' => 13, 'Municipio' => 'Condoto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '494', 'departamento_id' => 13, 'Municipio' => 'El Cantí³n de San Pablo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '495', 'departamento_id' => 13, 'Municipio' => 'El Carmen de Atrato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '496', 'departamento_id' => 13, 'Municipio' => 'El Carmen del Darií©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '497', 'departamento_id' => 13, 'Municipio' => 'El Litoral de San Juan']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '498', 'departamento_id' => 13, 'Municipio' => 'Istmina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '499', 'departamento_id' => 13, 'Municipio' => 'Juradí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '500', 'departamento_id' => 13, 'Municipio' => 'Llorí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '501', 'departamento_id' => 13, 'Municipio' => 'Medio Atrato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '502', 'departamento_id' => 13, 'Municipio' => 'Medio Baudí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '503', 'departamento_id' => 13, 'Municipio' => 'Medio San Juan']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '504', 'departamento_id' => 13, 'Municipio' => 'Ní³vita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '505', 'departamento_id' => 13, 'Municipio' => 'Nuquí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '506', 'departamento_id' => 13, 'Municipio' => 'Rí­o Irí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '507', 'departamento_id' => 13, 'Municipio' => 'Rí­o Quito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '508', 'departamento_id' => 13, 'Municipio' => 'Riosucio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '509', 'departamento_id' => 13, 'Municipio' => 'San Josí© del Palmar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '510', 'departamento_id' => 13, 'Municipio' => 'Sipí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '511', 'departamento_id' => 13, 'Municipio' => 'Tadí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '512', 'departamento_id' => 13, 'Municipio' => 'Ungué']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '513', 'departamento_id' => 13, 'Municipio' => 'Unií³n Panamericana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '514', 'departamento_id' => 14, 'Municipio' => 'Monteré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '515', 'departamento_id' => 14, 'Municipio' => 'Ayapel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '516', 'departamento_id' => 14, 'Municipio' => 'Buenavista']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '517', 'departamento_id' => 14, 'Municipio' => 'Canalete']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '518', 'departamento_id' => 14, 'Municipio' => 'Ceretí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '519', 'departamento_id' => 14, 'Municipio' => 'Chimá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '520', 'departamento_id' => 14, 'Municipio' => 'Chiníº']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '521', 'departamento_id' => 14, 'Municipio' => 'Cií©naga de Oro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '522', 'departamento_id' => 14, 'Municipio' => 'Cotorra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '523', 'departamento_id' => 14, 'Municipio' => 'La Apartada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '524', 'departamento_id' => 14, 'Municipio' => 'Los Cí³rdobas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '525', 'departamento_id' => 14, 'Municipio' => 'Momil']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '526', 'departamento_id' => 14, 'Municipio' => 'Montelí­bano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '527', 'departamento_id' => 14, 'Municipio' => 'Moí±itos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '528', 'departamento_id' => 14, 'Municipio' => 'Planeta Rica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '529', 'departamento_id' => 14, 'Municipio' => 'Pueblo Nuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '530', 'departamento_id' => 14, 'Municipio' => 'Puerto Escondido']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '531', 'departamento_id' => 14, 'Municipio' => 'Puerto Libertador']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '532', 'departamento_id' => 14, 'Municipio' => 'Purí­sima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '533', 'departamento_id' => 14, 'Municipio' => 'Sahagíºn']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '534', 'departamento_id' => 14, 'Municipio' => 'San Andrí©s de Sotavento']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '535', 'departamento_id' => 14, 'Municipio' => 'San Antero']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '536', 'departamento_id' => 14, 'Municipio' => 'San Bernardo del Viento']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '537', 'departamento_id' => 14, 'Municipio' => 'San Carlos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '538', 'departamento_id' => 14, 'Municipio' => 'San Josí© de Urí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '539', 'departamento_id' => 14, 'Municipio' => 'San Pelayo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '540', 'departamento_id' => 14, 'Municipio' => 'Santa Cruz de Lorica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '541', 'departamento_id' => 14, 'Municipio' => 'Tierralta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '542', 'departamento_id' => 14, 'Municipio' => 'Tuchí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '543', 'departamento_id' => 14, 'Municipio' => 'Valencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '544', 'departamento_id' => 15, 'Municipio' => 'Agua de Dios']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '545', 'departamento_id' => 15, 'Municipio' => 'Albán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '546', 'departamento_id' => 15, 'Municipio' => 'Anapoima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '547', 'departamento_id' => 15, 'Municipio' => 'Anolaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '548', 'departamento_id' => 15, 'Municipio' => 'Apulo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '549', 'departamento_id' => 15, 'Municipio' => 'Arbeláez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '550', 'departamento_id' => 15, 'Municipio' => 'Beltrán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '551', 'departamento_id' => 15, 'Municipio' => 'Bituima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '552', 'departamento_id' => 15, 'Municipio' => 'Bojacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '553', 'departamento_id' => 15, 'Municipio' => 'Cabrera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '554', 'departamento_id' => 15, 'Municipio' => 'Cachipay']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '555', 'departamento_id' => 15, 'Municipio' => 'Cajicá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '556', 'departamento_id' => 15, 'Municipio' => 'Caparrapí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '557', 'departamento_id' => 15, 'Municipio' => 'Cáqueza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '558', 'departamento_id' => 15, 'Municipio' => 'Carmen de Carupa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '559', 'departamento_id' => 15, 'Municipio' => 'Chaguaní­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '560', 'departamento_id' => 15, 'Municipio' => 'Ché']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '561', 'departamento_id' => 15, 'Municipio' => 'Chipaque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '562', 'departamento_id' => 15, 'Municipio' => 'Choachí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '563', 'departamento_id' => 15, 'Municipio' => 'Chocontá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '564', 'departamento_id' => 15, 'Municipio' => 'Cogua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '565', 'departamento_id' => 15, 'Municipio' => 'Cota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '566', 'departamento_id' => 15, 'Municipio' => 'Cucunubá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '567', 'departamento_id' => 15, 'Municipio' => 'El Colegio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '568', 'departamento_id' => 15, 'Municipio' => 'El Peí±í³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '569', 'departamento_id' => 15, 'Municipio' => 'El Rosal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '570', 'departamento_id' => 15, 'Municipio' => 'Facatativá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '571', 'departamento_id' => 15, 'Municipio' => 'Fí³meque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '572', 'departamento_id' => 15, 'Municipio' => 'Fosca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '573', 'departamento_id' => 15, 'Municipio' => 'Funza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '574', 'departamento_id' => 15, 'Municipio' => 'Fíºquene']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '575', 'departamento_id' => 15, 'Municipio' => 'Fusagasugá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '576', 'departamento_id' => 15, 'Municipio' => 'Gachalá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '577', 'departamento_id' => 15, 'Municipio' => 'Gachancipá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '578', 'departamento_id' => 15, 'Municipio' => 'Gachetá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '579', 'departamento_id' => 15, 'Municipio' => 'Gama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '580', 'departamento_id' => 15, 'Municipio' => 'Girardot']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '581', 'departamento_id' => 15, 'Municipio' => 'Granada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '582', 'departamento_id' => 15, 'Municipio' => 'Guachetá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '583', 'departamento_id' => 15, 'Municipio' => 'Guaduas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '584', 'departamento_id' => 15, 'Municipio' => 'Guasca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '585', 'departamento_id' => 15, 'Municipio' => 'Guataquí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '586', 'departamento_id' => 15, 'Municipio' => 'Guatavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '587', 'departamento_id' => 15, 'Municipio' => 'Guayabal de Sí­quima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '588', 'departamento_id' => 15, 'Municipio' => 'Guayabetal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '589', 'departamento_id' => 15, 'Municipio' => 'Gutií©rrez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '590', 'departamento_id' => 15, 'Municipio' => 'Jerusalí©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '591', 'departamento_id' => 15, 'Municipio' => 'Juní­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '592', 'departamento_id' => 15, 'Municipio' => 'La Calera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '593', 'departamento_id' => 15, 'Municipio' => 'La Mesa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '594', 'departamento_id' => 15, 'Municipio' => 'La Palma']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '595', 'departamento_id' => 15, 'Municipio' => 'La Peí±a']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '596', 'departamento_id' => 15, 'Municipio' => 'La Vega']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '597', 'departamento_id' => 15, 'Municipio' => 'Lenguazaque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '598', 'departamento_id' => 15, 'Municipio' => 'Machetá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '599', 'departamento_id' => 15, 'Municipio' => 'Madrid']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '600', 'departamento_id' => 15, 'Municipio' => 'Manta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '601', 'departamento_id' => 15, 'Municipio' => 'Medina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '602', 'departamento_id' => 15, 'Municipio' => 'Mosquera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '603', 'departamento_id' => 15, 'Municipio' => 'Narií±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '604', 'departamento_id' => 15, 'Municipio' => 'Nemocí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '605', 'departamento_id' => 15, 'Municipio' => 'Nilo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '606', 'departamento_id' => 15, 'Municipio' => 'Nimaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '607', 'departamento_id' => 15, 'Municipio' => 'Nocaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '608', 'departamento_id' => 15, 'Municipio' => 'Pacho']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '609', 'departamento_id' => 15, 'Municipio' => 'Paime']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '610', 'departamento_id' => 15, 'Municipio' => 'Pandi']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '611', 'departamento_id' => 15, 'Municipio' => 'Paratebueno']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '612', 'departamento_id' => 15, 'Municipio' => 'Pasca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '613', 'departamento_id' => 15, 'Municipio' => 'Puerto Salgar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '614', 'departamento_id' => 15, 'Municipio' => 'Pulí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '615', 'departamento_id' => 15, 'Municipio' => 'Quebradanegra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '616', 'departamento_id' => 15, 'Municipio' => 'Quetame']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '617', 'departamento_id' => 15, 'Municipio' => 'Quipile']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '618', 'departamento_id' => 15, 'Municipio' => 'Ricaurte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '619', 'departamento_id' => 15, 'Municipio' => 'San Antonio del Tequendama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '620', 'departamento_id' => 15, 'Municipio' => 'San Bernardo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '621', 'departamento_id' => 15, 'Municipio' => 'San Cayetano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '622', 'departamento_id' => 15, 'Municipio' => 'San Francisco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '623', 'departamento_id' => 15, 'Municipio' => 'San Juan de Rioseco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '624', 'departamento_id' => 15, 'Municipio' => 'Sasaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '625', 'departamento_id' => 15, 'Municipio' => 'Sesquilí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '626', 'departamento_id' => 15, 'Municipio' => 'Sibatí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '627', 'departamento_id' => 15, 'Municipio' => 'Silvania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '628', 'departamento_id' => 15, 'Municipio' => 'Simijaca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '629', 'departamento_id' => 15, 'Municipio' => 'Soacha']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '630', 'departamento_id' => 15, 'Municipio' => 'Sopí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '631', 'departamento_id' => 15, 'Municipio' => 'Subachoque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '632', 'departamento_id' => 15, 'Municipio' => 'Suesca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '633', 'departamento_id' => 15, 'Municipio' => 'Supatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '634', 'departamento_id' => 15, 'Municipio' => 'Susa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '635', 'departamento_id' => 15, 'Municipio' => 'Sutatausa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '636', 'departamento_id' => 15, 'Municipio' => 'Tabio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '637', 'departamento_id' => 15, 'Municipio' => 'Tausa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '638', 'departamento_id' => 15, 'Municipio' => 'Tena']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '639', 'departamento_id' => 15, 'Municipio' => 'Tenjo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '640', 'departamento_id' => 15, 'Municipio' => 'Tibacuy']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '641', 'departamento_id' => 15, 'Municipio' => 'Tibirita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '642', 'departamento_id' => 15, 'Municipio' => 'Tocaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '643', 'departamento_id' => 15, 'Municipio' => 'Tocancipá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '644', 'departamento_id' => 15, 'Municipio' => 'Topaipí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '645', 'departamento_id' => 15, 'Municipio' => 'Ubalá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '646', 'departamento_id' => 15, 'Municipio' => 'Ubaque']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '647', 'departamento_id' => 15, 'Municipio' => 'Ubatí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '648', 'departamento_id' => 15, 'Municipio' => 'Une']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '649', 'departamento_id' => 15, 'Municipio' => 'íštica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '650', 'departamento_id' => 15, 'Municipio' => 'Venecia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '651', 'departamento_id' => 15, 'Municipio' => 'Vergara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '652', 'departamento_id' => 15, 'Municipio' => 'Vianí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '653', 'departamento_id' => 15, 'Municipio' => 'Villagí³mez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '654', 'departamento_id' => 15, 'Municipio' => 'Villapinzí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '655', 'departamento_id' => 15, 'Municipio' => 'Villeta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '656', 'departamento_id' => 15, 'Municipio' => 'Viotá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '657', 'departamento_id' => 15, 'Municipio' => 'Yacopí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '658', 'departamento_id' => 15, 'Municipio' => 'Zipací³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '659', 'departamento_id' => 15, 'Municipio' => 'Zipaquirá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '660',  'departamento_id' => 16, 'Municipio' => 'Iní­rida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '661',  'departamento_id' => 16, 'Municipio' => 'Barrancominas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '662',  'departamento_id' => 16, 'Municipio' => 'Cacahual']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '663',  'departamento_id' => 16, 'Municipio' => 'La Guadalupe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '664',  'departamento_id' => 16, 'Municipio' => 'Morichal Nuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '665',  'departamento_id' => 16, 'Municipio' => 'Pana Pana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '666',  'departamento_id' => 16, 'Municipio' => 'Puerto Colombia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '667',  'departamento_id' => 16, 'Municipio' => 'San Felipe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '668',  'departamento_id' => 17, 'Municipio' => 'San Josí© del Guaviare']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '669',  'departamento_id' => 17, 'Municipio' => 'Calamar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '670',  'departamento_id' => 17, 'Municipio' => 'El Retorno']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '671',  'departamento_id' => 17, 'Municipio' => 'Miraflores']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '672',  'departamento_id' => 18, 'Municipio' => 'Neiva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '673',  'departamento_id' => 18, 'Municipio' => 'Acevedo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '674',  'departamento_id' => 18, 'Municipio' => 'Agrado']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '675',  'departamento_id' => 18, 'Municipio' => 'Aipe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '676',  'departamento_id' => 18, 'Municipio' => 'Algeciras']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '677',  'departamento_id' => 18, 'Municipio' => 'Altamira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '678',  'departamento_id' => 18, 'Municipio' => 'Baraya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '679',  'departamento_id' => 18, 'Municipio' => 'Campoalegre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '680',  'departamento_id' => 18, 'Municipio' => 'Colombia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '681',  'departamento_id' => 18, 'Municipio' => 'Elés']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '682',  'departamento_id' => 18, 'Municipio' => 'Garzí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '683',  'departamento_id' => 18, 'Municipio' => 'Gigante']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '684',  'departamento_id' => 18, 'Municipio' => 'Guadalupe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '685',  'departamento_id' => 18, 'Municipio' => 'Hobo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '686',  'departamento_id' => 18, 'Municipio' => 'íquira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '687',  'departamento_id' => 18, 'Municipio' => 'Isnos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '688',  'departamento_id' => 18, 'Municipio' => 'La Argentina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '689',  'departamento_id' => 18, 'Municipio' => 'La Plata']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '690',  'departamento_id' => 18, 'Municipio' => 'Nátaga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '691',  'departamento_id' => 18, 'Municipio' => 'Oporapa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '692',  'departamento_id' => 18, 'Municipio' => 'Paicol']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '693',  'departamento_id' => 18, 'Municipio' => 'Palermo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '694',  'departamento_id' => 18, 'Municipio' => 'Palestina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '695',  'departamento_id' => 18, 'Municipio' => 'Pital']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '696',  'departamento_id' => 18, 'Municipio' => 'Pitalito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '697',  'departamento_id' => 18, 'Municipio' => 'Rivera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '698',  'departamento_id' => 18, 'Municipio' => 'Saladoblanco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '699',  'departamento_id' => 18, 'Municipio' => 'San Agustí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '700',  'departamento_id' => 18, 'Municipio' => 'Santa Maré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '701',  'departamento_id' => 18, 'Municipio' => 'Suaza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '702',  'departamento_id' => 18, 'Municipio' => 'Tarqui']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '703',  'departamento_id' => 18, 'Municipio' => 'Tello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '704',  'departamento_id' => 18, 'Municipio' => 'Teruel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '705',  'departamento_id' => 18, 'Municipio' => 'Tesalia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '706',  'departamento_id' => 18, 'Municipio' => 'Timaná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '707',  'departamento_id' => 18, 'Municipio' => 'Villavieja']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '708',  'departamento_id' => 18, 'Municipio' => 'Yaguará']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '709',  'departamento_id' => 19, 'Municipio' => 'Riohacha']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '710',  'departamento_id' => 19, 'Municipio' => 'Albania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '711',  'departamento_id' => 19, 'Municipio' => 'Barrancas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '712',  'departamento_id' => 19, 'Municipio' => 'Dibulla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '713',  'departamento_id' => 19, 'Municipio' => 'Distraccií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '714',  'departamento_id' => 19, 'Municipio' => 'El Molino']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '715',  'departamento_id' => 19, 'Municipio' => 'Fonseca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '716',  'departamento_id' => 19, 'Municipio' => 'Hatonuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '717',  'departamento_id' => 19, 'Municipio' => 'La Jagua del Pilar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '718',  'departamento_id' => 19, 'Municipio' => 'Maicao']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '719',  'departamento_id' => 19, 'Municipio' => 'Manaure']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '720',  'departamento_id' => 19, 'Municipio' => 'San Juan del Cesar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '721',  'departamento_id' => 19, 'Municipio' => 'Uribia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '722',  'departamento_id' => 19, 'Municipio' => 'Urumita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '723',  'departamento_id' => 19, 'Municipio' => 'Villanueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '724',  'departamento_id' => 20, 'Municipio' => 'Santa Marta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '725',  'departamento_id' => 20, 'Municipio' => 'Algarrobo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '726',  'departamento_id' => 20, 'Municipio' => 'Aracataca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '727',  'departamento_id' => 20, 'Municipio' => 'Ariguaní­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '728',  'departamento_id' => 20, 'Municipio' => 'Cerro de San Antonio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '729',  'departamento_id' => 20, 'Municipio' => 'Chibolo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '730',  'departamento_id' => 20, 'Municipio' => 'Cií©naga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '731',  'departamento_id' => 20, 'Municipio' => 'Concordia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '732',  'departamento_id' => 20, 'Municipio' => 'El Banco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '733',  'departamento_id' => 20, 'Municipio' => 'El Pií±í³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '734',  'departamento_id' => 20, 'Municipio' => 'El Retí©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '735',  'departamento_id' => 20, 'Municipio' => 'Fundacií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '736',  'departamento_id' => 20, 'Municipio' => 'Guamal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '737',  'departamento_id' => 20, 'Municipio' => 'Nueva Granada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '738',  'departamento_id' => 20, 'Municipio' => 'Pedraza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '739',  'departamento_id' => 20, 'Municipio' => 'Pijií±o del Carmen']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '740',  'departamento_id' => 20, 'Municipio' => 'Pivijay']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '741',  'departamento_id' => 20, 'Municipio' => 'Plato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '742',  'departamento_id' => 20, 'Municipio' => 'Pueblo Viejo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '743',  'departamento_id' => 20, 'Municipio' => 'Remolino']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '744',  'departamento_id' => 20, 'Municipio' => 'Sabanas de San íngel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '745',  'departamento_id' => 20, 'Municipio' => 'Salamina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '746',  'departamento_id' => 20, 'Municipio' => 'San Sebastián de Buenavista']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '747',  'departamento_id' => 20, 'Municipio' => 'San Zení³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '748',  'departamento_id' => 20, 'Municipio' => 'Santa Ana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '749',  'departamento_id' => 20, 'Municipio' => 'Santa Bárbara de Pinto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '750',  'departamento_id' => 20, 'Municipio' => 'Sitionuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '751',  'departamento_id' => 20, 'Municipio' => 'Tenerife']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '752',  'departamento_id' => 20, 'Municipio' => 'Zapayán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '753',  'departamento_id' => 20, 'Municipio' => 'Zona Bananera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '754',  'departamento_id' => 21, 'Municipio' => 'Villavicencio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '755',  'departamento_id' => 21, 'Municipio' => 'Acacés']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '756',  'departamento_id' => 21, 'Municipio' => 'Barranca de Upé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '757',  'departamento_id' => 21, 'Municipio' => 'Cabuyaro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '758',  'departamento_id' => 21, 'Municipio' => 'Castilla La Nueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '759',  'departamento_id' => 21, 'Municipio' => 'Cubarral']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '760',  'departamento_id' => 21, 'Municipio' => 'Cumaral']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '761',  'departamento_id' => 21, 'Municipio' => 'El Calvario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '762',  'departamento_id' => 21, 'Municipio' => 'El Castillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '763',  'departamento_id' => 21, 'Municipio' => 'El Dorado']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '764',  'departamento_id' => 21, 'Municipio' => 'Fuente de Oro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '765',  'departamento_id' => 21, 'Municipio' => 'Granada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '766',  'departamento_id' => 21, 'Municipio' => 'Guamal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '767',  'departamento_id' => 21, 'Municipio' => 'La Macarena']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '768',  'departamento_id' => 21, 'Municipio' => 'La Uribe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '769',  'departamento_id' => 21, 'Municipio' => 'Lejanés']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '770',  'departamento_id' => 21, 'Municipio' => 'Mapiripán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '771',  'departamento_id' => 21, 'Municipio' => 'Mesetas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '772',  'departamento_id' => 21, 'Municipio' => 'Puerto Concordia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '773',  'departamento_id' => 21, 'Municipio' => 'Puerto Gaitán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '774',  'departamento_id' => 21, 'Municipio' => 'Puerto Lleras']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '775',  'departamento_id' => 21, 'Municipio' => 'Puerto Lí³pez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '776',  'departamento_id' => 21, 'Municipio' => 'Puerto Rico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '777',  'departamento_id' => 21, 'Municipio' => 'Restrepo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '778',  'departamento_id' => 21, 'Municipio' => 'San Carlos de Guaroa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '779',  'departamento_id' => 21, 'Municipio' => 'San Juan de Arama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '780',  'departamento_id' => 21, 'Municipio' => 'San Juanito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '781',  'departamento_id' => 21, 'Municipio' => 'San Martí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '782',  'departamento_id' => 21, 'Municipio' => 'Vista Hermosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '783',  'departamento_id' => 22, 'Municipio' => 'Pasto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '784',  'departamento_id' => 22, 'Municipio' => 'Albán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '785',  'departamento_id' => 22, 'Municipio' => 'Aldana']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '786',  'departamento_id' => 22, 'Municipio' => 'Ancuya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '787',  'departamento_id' => 22, 'Municipio' => 'Arboleda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '788',  'departamento_id' => 22, 'Municipio' => 'Barbacoas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '789',  'departamento_id' => 22, 'Municipio' => 'Belí©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '790',  'departamento_id' => 22, 'Municipio' => 'Buesaco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '791',  'departamento_id' => 22, 'Municipio' => 'Chachagí¼í­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '792',  'departamento_id' => 22, 'Municipio' => 'Colí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '793',  'departamento_id' => 22, 'Municipio' => 'Consacá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '794',  'departamento_id' => 22, 'Municipio' => 'Contadero']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '795',  'departamento_id' => 22, 'Municipio' => 'Cí³rdoba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '796',  'departamento_id' => 22, 'Municipio' => 'Cuaspud']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '797',  'departamento_id' => 22, 'Municipio' => 'Cumbal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '798',  'departamento_id' => 22, 'Municipio' => 'Cumbitara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '799',  'departamento_id' => 22, 'Municipio' => 'El Charco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '800',  'departamento_id' => 22, 'Municipio' => 'El Peí±ol']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '801',  'departamento_id' => 22, 'Municipio' => 'El Rosario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '802',  'departamento_id' => 22, 'Municipio' => 'El Tablí³n de Gí³mez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '803',  'departamento_id' => 22, 'Municipio' => 'El Tambo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '804',  'departamento_id' => 22, 'Municipio' => 'Francisco Pizarro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '805',  'departamento_id' => 22, 'Municipio' => 'Funes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '806',  'departamento_id' => 22, 'Municipio' => 'Guachucal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '807',  'departamento_id' => 22, 'Municipio' => 'Guaitarilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '808',  'departamento_id' => 22, 'Municipio' => 'Gualmatán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '809',  'departamento_id' => 22, 'Municipio' => 'Iles']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '810',  'departamento_id' => 22, 'Municipio' => 'Imuí©s']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '811',  'departamento_id' => 22, 'Municipio' => 'Ipiales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '812',  'departamento_id' => 22, 'Municipio' => 'La Cruz']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '813',  'departamento_id' => 22, 'Municipio' => 'La Florida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '814',  'departamento_id' => 22, 'Municipio' => 'La Llanada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '815',  'departamento_id' => 22, 'Municipio' => 'La Tola']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '816',  'departamento_id' => 22, 'Municipio' => 'La Unií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '817',  'departamento_id' => 22, 'Municipio' => 'Leiva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '818',  'departamento_id' => 22, 'Municipio' => 'Linares']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '819',  'departamento_id' => 22, 'Municipio' => 'Los Andes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '820',  'departamento_id' => 22, 'Municipio' => 'Magí¼í­ Payán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '821',  'departamento_id' => 22, 'Municipio' => 'Mallama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '822',  'departamento_id' => 22, 'Municipio' => 'Mosquera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '823',  'departamento_id' => 22, 'Municipio' => 'Narií±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '824',  'departamento_id' => 22, 'Municipio' => 'Olaya Herrera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '825',  'departamento_id' => 22, 'Municipio' => 'Ospina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '826',  'departamento_id' => 22, 'Municipio' => 'Policarpa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '827',  'departamento_id' => 22, 'Municipio' => 'Potosí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '828',  'departamento_id' => 22, 'Municipio' => 'Providencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '829',  'departamento_id' => 22, 'Municipio' => 'Puerres']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '830',  'departamento_id' => 22, 'Municipio' => 'Pupiales']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '831',  'departamento_id' => 22, 'Municipio' => 'Ricaurte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '832',  'departamento_id' => 22, 'Municipio' => 'Roberto Payán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '833',  'departamento_id' => 22, 'Municipio' => 'Samaniego']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '834',  'departamento_id' => 22, 'Municipio' => 'San Bernardo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '835',  'departamento_id' => 22, 'Municipio' => 'San Lorenzo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '836',  'departamento_id' => 22, 'Municipio' => 'San Pablo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '837',  'departamento_id' => 22, 'Municipio' => 'San Pedro de Cartago']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '838',  'departamento_id' => 22, 'Municipio' => 'Sandoná']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '839',  'departamento_id' => 22, 'Municipio' => 'Santa Bárbara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '840',  'departamento_id' => 22, 'Municipio' => 'Santacruz']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '841',  'departamento_id' => 22, 'Municipio' => 'Sapuyes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '842',  'departamento_id' => 22, 'Municipio' => 'Taminango']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '843',  'departamento_id' => 22, 'Municipio' => 'Tangua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '844',  'departamento_id' => 22, 'Municipio' => 'Tumaco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '845',  'departamento_id' => 22, 'Municipio' => 'Tíºquerres']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '846',  'departamento_id' => 22, 'Municipio' => 'Yacuanquer']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '847',  'departamento_id' => 23, 'Municipio' => 'Cíºcuta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '848',  'departamento_id' => 23, 'Municipio' => 'íbrego']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '849',  'departamento_id' => 23, 'Municipio' => 'Arboledas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '850',  'departamento_id' => 23, 'Municipio' => 'Bochalema']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '851',  'departamento_id' => 23, 'Municipio' => 'Bucarasica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '852',  'departamento_id' => 23, 'Municipio' => 'Cáchira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '853',  'departamento_id' => 23, 'Municipio' => 'Cácota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '854',  'departamento_id' => 23, 'Municipio' => 'Chinácota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '855',  'departamento_id' => 23, 'Municipio' => 'Chitagá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '856',  'departamento_id' => 23, 'Municipio' => 'Convencií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '857',  'departamento_id' => 23, 'Municipio' => 'Cucutilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '858',  'departamento_id' => 23, 'Municipio' => 'Durania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '859',  'departamento_id' => 23, 'Municipio' => 'El Carmen']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '860',  'departamento_id' => 23, 'Municipio' => 'El Tarra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '861',  'departamento_id' => 23, 'Municipio' => 'El Zulia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '862',  'departamento_id' => 23, 'Municipio' => 'Gramalote']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '863',  'departamento_id' => 23, 'Municipio' => 'Hacarí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '864',  'departamento_id' => 23, 'Municipio' => 'Herrán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '865',  'departamento_id' => 23, 'Municipio' => 'La Esperanza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '866',  'departamento_id' => 23, 'Municipio' => 'La Playa de Belí©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '867',  'departamento_id' => 23, 'Municipio' => 'Labateca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '868',  'departamento_id' => 23, 'Municipio' => 'Los Patios']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '869',  'departamento_id' => 23, 'Municipio' => 'Lourdes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '870',  'departamento_id' => 23, 'Municipio' => 'Mutiscua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '871',  'departamento_id' => 23, 'Municipio' => 'Ocaí±a']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '872',  'departamento_id' => 23, 'Municipio' => 'Pamplona']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '873',  'departamento_id' => 23, 'Municipio' => 'Pamplonita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '874',  'departamento_id' => 23, 'Municipio' => 'Puerto Santander']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '875',  'departamento_id' => 23, 'Municipio' => 'Ragonvalia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '876',  'departamento_id' => 23, 'Municipio' => 'Salazar de Las Palmas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '877',  'departamento_id' => 23, 'Municipio' => 'San Calixto']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '878',  'departamento_id' => 23, 'Municipio' => 'San Cayetano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '879',  'departamento_id' => 23, 'Municipio' => 'Santiago']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '880',  'departamento_id' => 23, 'Municipio' => 'Santo Domingo de Silos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '881',  'departamento_id' => 23, 'Municipio' => 'Sardinata']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '882',  'departamento_id' => 23, 'Municipio' => 'Teorama']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '883',  'departamento_id' => 23, 'Municipio' => 'Tibíº']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '884',  'departamento_id' => 23, 'Municipio' => 'Toledo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '885',  'departamento_id' => 23, 'Municipio' => 'Villa Caro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '886',  'departamento_id' => 23, 'Municipio' => 'Villa del Rosario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '887',  'departamento_id' => 24, 'Municipio' => 'Mocoa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '888',  'departamento_id' => 24, 'Municipio' => 'Colí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '889',  'departamento_id' => 24, 'Municipio' => 'Orito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '890',  'departamento_id' => 24, 'Municipio' => 'Puerto Así­s']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '891',  'departamento_id' => 24, 'Municipio' => 'Puerto Caicedo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '892',  'departamento_id' => 24, 'Municipio' => 'Puerto Guzmán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '893',  'departamento_id' => 24, 'Municipio' => 'Puerto Leguí­zamo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '894',  'departamento_id' => 24, 'Municipio' => 'San Francisco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '895',  'departamento_id' => 24, 'Municipio' => 'San Miguel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '896',  'departamento_id' => 24, 'Municipio' => 'Santiago']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '897',  'departamento_id' => 24, 'Municipio' => 'Sibundoy']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '898',  'departamento_id' => 24, 'Municipio' => 'Valle del Guamuez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '899',  'departamento_id' => 24, 'Municipio' => 'Villagarzí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '900',  'departamento_id' => 25, 'Municipio' => 'Armenia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '901',  'departamento_id' => 25, 'Municipio' => 'Buenavista']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '902',  'departamento_id' => 25, 'Municipio' => 'Calarcá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '903',  'departamento_id' => 25, 'Municipio' => 'Circasia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '904',  'departamento_id' => 25, 'Municipio' => 'Cí³rdoba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '905',  'departamento_id' => 25, 'Municipio' => 'Filandia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '906',  'departamento_id' => 25, 'Municipio' => 'Gí©nova']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '907',  'departamento_id' => 25, 'Municipio' => 'La Tebaida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '908',  'departamento_id' => 25, 'Municipio' => 'Montenegro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '909',  'departamento_id' => 25, 'Municipio' => 'Pijao']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '910',  'departamento_id' => 25, 'Municipio' => 'Quimbaya']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '911',  'departamento_id' => 25, 'Municipio' => 'Salento']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '912',  'departamento_id' => 26, 'Municipio' => 'Pereira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '913',  'departamento_id' => 26, 'Municipio' => 'Apé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '914',  'departamento_id' => 26, 'Municipio' => 'Balboa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '915',  'departamento_id' => 26, 'Municipio' => 'Belí©n de Umbré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '916',  'departamento_id' => 26, 'Municipio' => 'Dosquebradas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '917',  'departamento_id' => 26, 'Municipio' => 'Guática']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '918',  'departamento_id' => 26, 'Municipio' => 'La Celia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '919',  'departamento_id' => 26, 'Municipio' => 'La Virginia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '920',  'departamento_id' => 26, 'Municipio' => 'Marsella']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '921',  'departamento_id' => 26, 'Municipio' => 'Mistratí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '922',  'departamento_id' => 26, 'Municipio' => 'Pueblo Rico']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '923',  'departamento_id' => 26, 'Municipio' => 'Quinché']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '924',  'departamento_id' => 26, 'Municipio' => 'Santa Rosa de Cabal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '925',  'departamento_id' => 26, 'Municipio' => 'Santuario']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '926',  'departamento_id' => 27, 'Municipio' => 'San Andres Isla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '927',  'departamento_id' => 27, 'Municipio' => 'Providencia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '928',  'departamento_id' => 27, 'Municipio' => 'Santa Catalina']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '929',  'departamento_id' => 28, 'Municipio' => 'Bucaramanga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '930',  'departamento_id' => 28, 'Municipio' => 'Aguada']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '931',  'departamento_id' => 28, 'Municipio' => 'Albania']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '932',  'departamento_id' => 28, 'Municipio' => 'Aratoca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '933',  'departamento_id' => 28, 'Municipio' => 'Barbosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '934',  'departamento_id' => 28, 'Municipio' => 'Barichara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '935',  'departamento_id' => 28, 'Municipio' => 'Barrancabermeja']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '936',  'departamento_id' => 28, 'Municipio' => 'Betulia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '937',  'departamento_id' => 28, 'Municipio' => 'Bolí­var']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '938',  'departamento_id' => 28, 'Municipio' => 'Cabrera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '939',  'departamento_id' => 28, 'Municipio' => 'California']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '940',  'departamento_id' => 28, 'Municipio' => 'Capitanejo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '941',  'departamento_id' => 28, 'Municipio' => 'Carcasí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '942',  'departamento_id' => 28, 'Municipio' => 'Cepitá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '943',  'departamento_id' => 28, 'Municipio' => 'Cerrito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '944',  'departamento_id' => 28, 'Municipio' => 'Charalá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '945',  'departamento_id' => 28, 'Municipio' => 'Charta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '946',  'departamento_id' => 28, 'Municipio' => 'Chima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '947',  'departamento_id' => 28, 'Municipio' => 'Chipatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '948',  'departamento_id' => 28, 'Municipio' => 'Cimitarra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '949',  'departamento_id' => 28, 'Municipio' => 'Concepcií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '950',  'departamento_id' => 28, 'Municipio' => 'Confines']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '951',  'departamento_id' => 28, 'Municipio' => 'Contratacií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '952',  'departamento_id' => 28, 'Municipio' => 'Coromoro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '953',  'departamento_id' => 28, 'Municipio' => 'Curití­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '954',  'departamento_id' => 28, 'Municipio' => 'El Carmen de Chucurí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '955',  'departamento_id' => 28, 'Municipio' => 'El Guacamayo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '956',  'departamento_id' => 28, 'Municipio' => 'El Peí±í³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '957',  'departamento_id' => 28, 'Municipio' => 'El Playí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '958',  'departamento_id' => 28, 'Municipio' => 'Encino']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '959',  'departamento_id' => 28, 'Municipio' => 'Enciso']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '960',  'departamento_id' => 28, 'Municipio' => 'Florián']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '961',  'departamento_id' => 28, 'Municipio' => 'Floridablanca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '962',  'departamento_id' => 28, 'Municipio' => 'Galán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '963',  'departamento_id' => 28, 'Municipio' => 'Gámbita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '964',  'departamento_id' => 28, 'Municipio' => 'Girí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '965',  'departamento_id' => 28, 'Municipio' => 'Guaca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '966',  'departamento_id' => 28, 'Municipio' => 'Guadalupe']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '967',  'departamento_id' => 28, 'Municipio' => 'Guapotá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '968',  'departamento_id' => 28, 'Municipio' => 'Guavatá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '969',  'departamento_id' => 28, 'Municipio' => 'Gí¼epsa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '970',  'departamento_id' => 28, 'Municipio' => 'Hato']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '971',  'departamento_id' => 28, 'Municipio' => 'Jesíºs Maré']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '972',  'departamento_id' => 28, 'Municipio' => 'Jordán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '973',  'departamento_id' => 28, 'Municipio' => 'La Belleza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '974',  'departamento_id' => 28, 'Municipio' => 'La Paz']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '975',  'departamento_id' => 28, 'Municipio' => 'Landázuri']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '976',  'departamento_id' => 28, 'Municipio' => 'Lebrija']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '977',  'departamento_id' => 28, 'Municipio' => 'Los Santos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '978',  'departamento_id' => 28, 'Municipio' => 'Macaravita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '979',  'departamento_id' => 28, 'Municipio' => 'Málaga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '980',  'departamento_id' => 28, 'Municipio' => 'Matanza']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '981',  'departamento_id' => 28, 'Municipio' => 'Mogotes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '982',  'departamento_id' => 28, 'Municipio' => 'Molagavita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '983',  'departamento_id' => 28, 'Municipio' => 'Ocamonte']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '984',  'departamento_id' => 28, 'Municipio' => 'Oiba']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '985',  'departamento_id' => 28, 'Municipio' => 'Onzaga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '986',  'departamento_id' => 28, 'Municipio' => 'Palmar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '987',  'departamento_id' => 28, 'Municipio' => 'Palmas del Socorro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '988',  'departamento_id' => 28, 'Municipio' => 'Páramo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '989',  'departamento_id' => 28, 'Municipio' => 'Piedecuesta']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '990',  'departamento_id' => 28, 'Municipio' => 'Pinchote']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '991',  'departamento_id' => 28, 'Municipio' => 'Puente Nacional']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '992',  'departamento_id' => 28, 'Municipio' => 'Puerto Parra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '993',  'departamento_id' => 28, 'Municipio' => 'Puerto Wilches']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '994',  'departamento_id' => 28, 'Municipio' => 'Rionegro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '995',  'departamento_id' => 28, 'Municipio' => 'Sabana de Torres']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '996',  'departamento_id' => 28, 'Municipio' => 'San Andrí©s']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '997',  'departamento_id' => 28, 'Municipio' => 'San Benito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '998',  'departamento_id' => 28, 'Municipio' => 'San Gil']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '999',  'departamento_id' => 28, 'Municipio' => 'San Joaquí­n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1000',  'departamento_id' => 28, 'Municipio' => 'San Josí© de Miranda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1001',  'departamento_id' => 28, 'Municipio' => 'San Miguel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1002',  'departamento_id' => 28, 'Municipio' => 'San Vicente de Chucurí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1003',  'departamento_id' => 28, 'Municipio' => 'Santa Bárbara']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1004',  'departamento_id' => 28, 'Municipio' => 'Santa Helena del Opí³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1005',  'departamento_id' => 28, 'Municipio' => 'Simacota']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1006',  'departamento_id' => 28, 'Municipio' => 'Socorro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1007',  'departamento_id' => 28, 'Municipio' => 'Suaita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1008',  'departamento_id' => 28, 'Municipio' => 'Sucre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1009',  'departamento_id' => 28, 'Municipio' => 'Suratá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1010',  'departamento_id' => 28, 'Municipio' => 'Tona']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1011',  'departamento_id' => 28, 'Municipio' => 'Valle de San Josí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1012',  'departamento_id' => 28, 'Municipio' => 'Ví©lez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1013',  'departamento_id' => 28, 'Municipio' => 'Vetas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1014',  'departamento_id' => 28, 'Municipio' => 'Villanueva']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1015',  'departamento_id' => 28, 'Municipio' => 'Zapatoca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1016',  'departamento_id' => 29, 'Municipio' => 'Sincelejo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1017',  'departamento_id' => 29, 'Municipio' => 'Buenavista']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1018',  'departamento_id' => 29, 'Municipio' => 'Caimito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1019',  'departamento_id' => 29, 'Municipio' => 'Chalán']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1020',  'departamento_id' => 29, 'Municipio' => 'Colosí³']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1021',  'departamento_id' => 29, 'Municipio' => 'Corozal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1022',  'departamento_id' => 29, 'Municipio' => 'Coveí±as']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1023',  'departamento_id' => 29, 'Municipio' => 'El Roble']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1024',  'departamento_id' => 29, 'Municipio' => 'Galeras']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1025',  'departamento_id' => 29, 'Municipio' => 'Guaranda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1026',  'departamento_id' => 29, 'Municipio' => 'La Unií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1027',  'departamento_id' => 29, 'Municipio' => 'Los Palmitos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1028',  'departamento_id' => 29, 'Municipio' => 'Majagual']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1029',  'departamento_id' => 29, 'Municipio' => 'Morroa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1030',  'departamento_id' => 29, 'Municipio' => 'Ovejas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1031',  'departamento_id' => 29, 'Municipio' => 'Palmito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1032',  'departamento_id' => 29, 'Municipio' => 'Sampuí©s']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1033',  'departamento_id' => 29, 'Municipio' => 'San Benito Abad']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1034',  'departamento_id' => 29, 'Municipio' => 'San Juan de Betulia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1035',  'departamento_id' => 29, 'Municipio' => 'San Marcos']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1036',  'departamento_id' => 29, 'Municipio' => 'San Onofre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1037',  'departamento_id' => 29, 'Municipio' => 'San Pedro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1038',  'departamento_id' => 29, 'Municipio' => 'Santiago de Tolíº']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1039',  'departamento_id' => 29, 'Municipio' => 'Sincí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1040',  'departamento_id' => 29, 'Municipio' => 'Sucre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1041',  'departamento_id' => 29, 'Municipio' => 'Toluviejo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1042',  'departamento_id' => 30, 'Municipio' => 'Ibaguí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1043',  'departamento_id' => 30, 'Municipio' => 'Alpujarra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1044',  'departamento_id' => 30, 'Municipio' => 'Alvarado']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1045',  'departamento_id' => 30, 'Municipio' => 'Ambalema']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1046',  'departamento_id' => 30, 'Municipio' => 'Anzoátegui']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1047',  'departamento_id' => 30, 'Municipio' => 'Armero']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1048',  'departamento_id' => 30, 'Municipio' => 'Ataco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1049',  'departamento_id' => 30, 'Municipio' => 'Cajamarca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1050',  'departamento_id' => 30, 'Municipio' => 'Carmen de Apicalá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1051',  'departamento_id' => 30, 'Municipio' => 'Casabianca']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1052',  'departamento_id' => 30, 'Municipio' => 'Chaparral']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1053',  'departamento_id' => 30, 'Municipio' => 'Coello']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1054',  'departamento_id' => 30, 'Municipio' => 'Coyaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1055',  'departamento_id' => 30, 'Municipio' => 'Cunday']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1056',  'departamento_id' => 30, 'Municipio' => 'Dolores']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1057',  'departamento_id' => 30, 'Municipio' => 'Espinal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1058',  'departamento_id' => 30, 'Municipio' => 'Falan']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1059',  'departamento_id' => 30, 'Municipio' => 'Flandes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1060',  'departamento_id' => 30, 'Municipio' => 'Fresno']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1061',  'departamento_id' => 30, 'Municipio' => 'Guamo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1062',  'departamento_id' => 30, 'Municipio' => 'Herveo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1063',  'departamento_id' => 30, 'Municipio' => 'Honda']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1064',  'departamento_id' => 30, 'Municipio' => 'Icononzo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1065',  'departamento_id' => 30, 'Municipio' => 'Lí©rida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1066',  'departamento_id' => 30, 'Municipio' => 'Lí­bano']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1067',  'departamento_id' => 30, 'Municipio' => 'Melgar']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1068',  'departamento_id' => 30, 'Municipio' => 'Murillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1069',  'departamento_id' => 30, 'Municipio' => 'Natagaima']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1070',  'departamento_id' => 30, 'Municipio' => 'Ortega']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1071',  'departamento_id' => 30, 'Municipio' => 'Palocabildo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1072',  'departamento_id' => 30, 'Municipio' => 'Piedras']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1073',  'departamento_id' => 30, 'Municipio' => 'Planadas']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1074',  'departamento_id' => 30, 'Municipio' => 'Prado']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1075',  'departamento_id' => 30, 'Municipio' => 'Purificacií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1076',  'departamento_id' => 30, 'Municipio' => 'Rioblanco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1077',  'departamento_id' => 30, 'Municipio' => 'Roncesvalles']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1078',  'departamento_id' => 30, 'Municipio' => 'Rovira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1079',  'departamento_id' => 30, 'Municipio' => 'Saldaí±a']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1080',  'departamento_id' => 30, 'Municipio' => 'San Antonio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1081',  'departamento_id' => 30, 'Municipio' => 'San Luis']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1082',  'departamento_id' => 30, 'Municipio' => 'San Sebastián de Mariquita']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1083',  'departamento_id' => 30, 'Municipio' => 'Santa Isabel']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1084',  'departamento_id' => 30, 'Municipio' => 'Suárez']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1085',  'departamento_id' => 30, 'Municipio' => 'Valle de San Juan']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1086',  'departamento_id' => 30, 'Municipio' => 'Venadillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1087',  'departamento_id' => 30, 'Municipio' => 'Villahermosa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1088',  'departamento_id' => 30, 'Municipio' => 'Villarrica']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1089',  'departamento_id' => 31, 'Municipio' => 'Cali']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1090',  'departamento_id' => 31, 'Municipio' => 'Alcalá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1091',  'departamento_id' => 31, 'Municipio' => 'Andalucé']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1092',  'departamento_id' => 31, 'Municipio' => 'Ansermanuevo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1093',  'departamento_id' => 31, 'Municipio' => 'Argelia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1094',  'departamento_id' => 31, 'Municipio' => 'Bolí­var']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1095',  'departamento_id' => 31, 'Municipio' => 'Buenaventura']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1096',  'departamento_id' => 31, 'Municipio' => 'Buga']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1097',  'departamento_id' => 31, 'Municipio' => 'Bugalagrande']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1098',  'departamento_id' => 31, 'Municipio' => 'Caicedonia']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1099',  'departamento_id' => 31, 'Municipio' => 'Calima - El Darií©n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1100',  'departamento_id' => 31, 'Municipio' => 'Candelaria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1101',  'departamento_id' => 31, 'Municipio' => 'Cartago']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1102',  'departamento_id' => 31, 'Municipio' => 'Dagua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1103',  'departamento_id' => 31, 'Municipio' => 'El íguila']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1104',  'departamento_id' => 31, 'Municipio' => 'El Cairo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1105',  'departamento_id' => 31, 'Municipio' => 'El Cerrito']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1106',  'departamento_id' => 31, 'Municipio' => 'El Dovio']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1107',  'departamento_id' => 31, 'Municipio' => 'Florida']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1108',  'departamento_id' => 31, 'Municipio' => 'Ginebra']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1109',  'departamento_id' => 31, 'Municipio' => 'Guacarí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1110',  'departamento_id' => 31, 'Municipio' => 'Jamundí­']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1111',  'departamento_id' => 31, 'Municipio' => 'La Cumbre']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1112',  'departamento_id' => 31, 'Municipio' => 'La Unií³n']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1113',  'departamento_id' => 31, 'Municipio' => 'La Victoria']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1114',  'departamento_id' => 31, 'Municipio' => 'Obando']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1115',  'departamento_id' => 31, 'Municipio' => 'Palmira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1116',  'departamento_id' => 31, 'Municipio' => 'Pradera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1117',  'departamento_id' => 31, 'Municipio' => 'Restrepo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1118',  'departamento_id' => 31, 'Municipio' => 'Riofrí­o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1119',  'departamento_id' => 31, 'Municipio' => 'Roldanillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1120',  'departamento_id' => 31, 'Municipio' => 'San Pedro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1121',  'departamento_id' => 31, 'Municipio' => 'Sevilla']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1122',  'departamento_id' => 31, 'Municipio' => 'Toro']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1123',  'departamento_id' => 31, 'Municipio' => 'Trujillo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1124',  'departamento_id' => 31, 'Municipio' => 'Tuluá']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1125',  'departamento_id' => 31, 'Municipio' => 'Ulloa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1126',  'departamento_id' => 31, 'Municipio' => 'Versalles']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1127',  'departamento_id' => 31, 'Municipio' => 'Vijes']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1128',  'departamento_id' => 31, 'Municipio' => 'Yotoco']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1129',  'departamento_id' => 31, 'Municipio' => 'Yumbo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1130',  'departamento_id' => 31, 'Municipio' => 'Zarzal']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1131',  'departamento_id' => 32, 'Municipio' => 'Mitíº']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1132',  'departamento_id' => 32, 'Municipio' => 'Caruríº']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1133',  'departamento_id' => 32, 'Municipio' => 'Pacoa']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1134',  'departamento_id' => 32, 'Municipio' => 'Papunaua']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1135',  'departamento_id' => 32, 'Municipio' => 'Taraira']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1136',  'departamento_id' => 32, 'Municipio' => 'Yavaratí©']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1137',  'departamento_id' => 33, 'Municipio' => 'Puerto Carreí±o']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1138',  'departamento_id' => 33, 'Municipio' => 'Cumaribo']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1139',  'departamento_id' => 33, 'Municipio' => 'La Primavera']); // phpcs:ignore
        DB::table('ciudad')->insert(['id_ciudad' => '1140',  'departamento_id' => 33, 'Municipio' => 'Santa Rosalé']); // phpcs:ignore
    }
}
