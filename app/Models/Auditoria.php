<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = "auditorias";

    protected $fillable = [
        'id',
        'precarga_id',
        'latitude',
        'longitude',
        'star',
        'promotor',
        'razonSocial',
        'nit',
        'direccion',
        'telefono',
        'departamento',
        'municipio',
        'barrio',
        'activacion',
        'noConcreciones',
        'cual',
        'observaciones',
        'fotoActiv'
    ];

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
