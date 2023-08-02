<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos_potenciales extends Model
{
    use HasFactory;

    protected $table = 'puntos_potenciales';
    protected $fillable = [
        'id',
        'fachada',
        'foco',
        'lat',
        'lon',
        'registradoPor',
        'departamento',
        'ciudad',
        'municipio',
        'localidad',
        'barrio',
        'direccion',
        'created_at',
        'updated_at'

    ];
}
