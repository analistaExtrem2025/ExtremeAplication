<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibicion extends Model
{
    protected $table = "auditorias";


    protected $fillable = [
        'id',
        'precarga_id',
        'ron_byw',
        'seleccionron_byw',
        'ron_jhonny',
        'seleccionron_jhonny',
        'aguard_smirnoff',
        'seleccionaguard_smirnoff',
    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }




}
