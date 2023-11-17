<?php

namespace App\Imports;

use App\Models\PuntosAuditoria;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class PuntosAuditoriasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PuntosAuditoria([
            //
        ]);
    }
}
