<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diageo_Cerrados extends Model
{
    use HasFactory;


    protected $table = 'puntos_potenciales';
    protected $fillable = [
        'id',
        'fachada',
        'canal',
        'lat',
        'lon',
        'registradoPor',
        'departamento',
        'municipio',
        'localidad',
        'created_at',
        'updated_at'

    ];
}
