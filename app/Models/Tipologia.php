<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipologia extends Model
{
    protected $table = "auditorias";

    protected $fillable = [
        'id',
        'precarga_id',
        'state_tipologia',
        'tipologia',
        'fototipologia'
    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }

}
