<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    protected $table = "auditorias";

    protected $fillable = [
        'id',
        'precarga_id',
        'state_segmento',
        'segmento',
        'fotosegmento',
        'caja_cerveza',
        'caja_aguardiente',
        'caja_ron',
    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
