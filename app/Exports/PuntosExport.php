<?php

namespace App\Exports;

use App\Models\PuntosAuditoria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PuntosExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return PuntosAuditoria::all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'id',
            'id_femsa',
            'codigo_femsa',
            'tipoDocumento',
            'nit',
            'nombreNegocio',
            'razonSocial',
            'direccion',
            'latitude',
            'longitude',
            'telFijo',
            'telCelular',
            'mail',
            'departamento',
            'municipio',
            'barrio',
            'tipologia',
            'segmentacion',
            'nombreContacto',
            'apellidoContacto',
            'telContacto',
            'asignadoA',
            'estatusGestion',
            'fechaAsignado',
            'fechaFinalizado',
            'created_at',
            'updated_at',

        ];
    }
}
