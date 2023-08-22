<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reemplazo extends Model
{
    protected $table= 'encuestas';
    protected $fillable = [
        'codigo',
        'fotoActiv',
    ];
}
