<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalidades extends Model
{
    use HasFactory;

    protected $table = "auditorias";


    protected $fillable = [
        'id',
        'precarga_id',
        'observacionesDetallista',
        'criticidad',
        'revisadoPor'

    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
