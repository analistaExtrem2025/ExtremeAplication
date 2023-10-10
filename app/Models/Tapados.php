<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tapados extends Model
{
    protected $table = "auditorias";

    protected $fillable = [
        'id',
        'precarga_id',
        'prod_tapados',
        'seleccionProd_tapados',
        'prod_danados',
        'seleccionprod_danados',
        'prod_visibles',
        'seleccionprod_visibles',
        'prod_rt_visibles',
        'seleccionprod_rt_visibles',
        'prod_rt_properly',
        'seleccionprod_rt_properly',
        'prod_hl_danadas',
        'seleccionprod_hl_danadas',
        'prod_vs_quebrados',
        'seleccionprod_vs_quebrados',
        'prod_ds_visibles',
        'seleccionprod_ds_visibles',
        'prod_ds_diferentes',
        'seleccionprod_ds_diferentes',
        'prod_ds_danados',
        'seleccionprod_ds_danados',
        'hl_con_prod',
        'seleccionhl_con_prod',
        'cp_con_prod',
        'seleccioncp_con_prod'



    ];

    public $timestamps = false;

    public function auditoria()
    {
        return $this->hasMany(PuntosAuditoria::class, 'id');
    }
}
