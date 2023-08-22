<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuestas extends Model
{
    protected $fillable = [
        'codigo',
        'clienteFemsa',
        'razonSocial',
        'tipoD',
        'nDocumento',
        'nombreNegocio',
        'nFijo',
        'nCelular',
        'email',
        'departamento',
        'municipio',
        'localidad',
        'barrio',
        'direccion',
        'latitude',
        'longitude',
        'star',
        'user_id',
        'canal',
        'nombre_contacto',
        'apellidos_contacto',
        'telContacto',
        'mane_licores',
        'ventaPesos',
        'tamañoEst',
        'promotor',
        'estadoCarga',
        'motivo_nc',
        'gestionActual',
        'estatusCalidad',
        'usuarioCalidad',
        'ObsCalidad',
        'fechaCalidad',
        'obsCierre',
        'gift',
        'cantidad',
        'portafolioDiageo',
        'estadoEnvio',
        'respuestaEnvio',
        'fechaRespuesta',
        'fotoActiv',
        'fotoDocs',
        'fotoGifts',
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
