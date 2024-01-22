<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparativoMarcas extends Model
{
    use HasFactory;

    protected $table = "auditorias";


    protected $fillable = [
        'id',
        'precarga_id',
        'hay_aguardiente',
        'hay_ron',
        'comp_ron1',
        'caras_comp_ron',
        'precio_comp_ron1',
        'comp_ron2',
        'precio_comp_ron2',
        'comp_aguard1',
        'caras_comp_aguardiente',
        'precio_comp_aguardiente1',
        'comp_aguard2',
        'precio_comp_aguardiente2',
        'seleccionLinealDiageo',
        'seleccionLinealA',
        'seleccionLinealR',
        'criticidad',

    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
