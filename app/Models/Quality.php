<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;

    protected $table = 'encuestas';
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
        'tama単oEst',
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
        'fotoActiv',
        'fotoDocs',
        'fotoGifts',
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
