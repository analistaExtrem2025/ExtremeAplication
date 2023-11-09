<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calidadAuditoria extends Model
{
    use HasFactory;
    protected $table = "calidad_auditorias";

    protected $fillable =  [

        'precarga_id',
        'comentarios',
        'observacionesCalidad',
        'criticidad',
        'fechaRevision',
        'revisadoPor',
        'estadoCalidad',
        'auditadoPor'
    ];



}
