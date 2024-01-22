<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Generalidades;
use App\Models\PuntosAuditoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GeneralidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalidades = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.generalidades', compact('generalidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $puntos_auditoria = Generalidades::findOrFail($id);

        return view('auditoria.newGeneralidades', compact('puntos_auditoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generalidades $generalidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if ($request->precarga_id % 2 === 0) {
            $calidad = "MARIA ALEJANDRA LEMUS CASTIBLANCO";

        } else {
            $calidad = "FLORALBA RINCON ROMERO";
        }
        $now = Carbon::now();
        $precarga = PuntosAuditoria::where('id', $request->precarga_id);
        $precarga->update(
            [
                'estatusGestion' => 'Diligenciado',
                'fechaFinalizado' =>  $now,
            ]
        );

        $disponibilidad = Generalidades::findOrFail($id);

        $disponibilidad->update(
            [
                'observacionesDetallista' => $request->observacionesDetallista,
                'criticidad' => 'Pendiente Calidad',
                'revisadoPor' =>  $calidad,
            ]
        );
        return redirect('auditoria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generalidades $generalidades)
    {
        //
    }
}
