<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    Use HasFactory;

     protected $fillable = [
        'id_departamento',
        'nombre',
    ];


    public function municipios() {
        return $this->hasMany('App\Models\Municipios');
    }
}
