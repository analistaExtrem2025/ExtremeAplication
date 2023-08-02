<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'departamento_id',
        'municipio_id'
    ];


    public function municipio() {

            return $this->belongTo('App\Models\Municipios');
    }

}
