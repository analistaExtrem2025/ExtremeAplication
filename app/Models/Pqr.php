<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    use HasFactory;


    protected $table = "pqr";

    protected $fillable = [
        'id',
        'femsa_id',
        'area',
        'tituloReq',
        'detalle',
        'evidenciapqr',
        'estatusRespuesta',
        'observaciones',
        'created_at'
    ];

    public $timestamps = true;
}





