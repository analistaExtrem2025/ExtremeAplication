<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    protected $table = "auditorias";

    protected $fillable = [
        'id',
        'precarga_id',
        'cenefa',
        'cenefa_visi',
        'cenefa_colo',
        'seleccionCenefa',
        'afiche',
        'afiche_visi',
        'afiche_colo',
        'marca_combo',
        'aficheCombotizado',
        'combox1',
        'combox2',
        'combox3',
        'seleccionAfiche',
        'marco',
        'marco_visi',
        'marco_colo',
        'seleccionMarco',
        'rompetraficos',
        'prod_rt_visibles',
        'prod_rt_properly',
        'seleccionRompetrafico',
        'fachadas',
        'fachadas_visi',
        'fachadas_colo',
        'seleccionFaxada',
        'hielera',
        'hl_con_prod',
        'prod_hl_visible',
        'prod_hl_danadas',
        'seleccionHielera',
        'bases_h',
        'baseshl_con_prod',
        'prod_baseshl_visible',
        'prod_baseshl_danadas',
        'seleccionBase_h',
        'dosificadorD',
        'prod_dsD_visibles',
        'prod_dsD_diferentes',
        'prod_dsD_danados',
        'seleccionDosificadorD',
        'dosificadorS',
        'prod_dsS_visibles',
        'prod_dsS_diferentes',
        'prod_dsS_danados',
        'seleccionDosificadorS',
        'branding',
        'branding_visible',
        'branding_danados',
        'seleccionBranding',
        'vasos',
        'vasos_visibles',
        'vasos_quebrados',
        'seleccionVasos'
    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
