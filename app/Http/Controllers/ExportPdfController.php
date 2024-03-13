<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\AuditoriaH;
use App\Models\ExportPdf;
use App\Models\PuntosAuditoria;
use App\Models\PuntosAuditoriaH;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ExportPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::all();

        return view('pdf.index', compact('auditoria'));
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
        $auditoriaPdf = Auditoria::findOrFail($id);
        $seg = PuntosAuditoria::select('puntos_auditoria.segmentacion')
                ->leftjoin('auditorias', 'puntos_auditoria.id', '=', 'auditorias.precarga_id')->get()->pluck('segmentacion');

        $tip = PuntosAuditoria::select('puntos_auditoria.tipologia')
        ->leftjoin('auditorias', 'puntos_auditoria.id', '=', 'auditorias.precarga_id')->get()->pluck('tipologia');

        $pdf =  Pdf::loadView('pdf.show', compact('seg', 'tip'), ['auditoriaPdf' => $auditoriaPdf])->setOptions(['defaultFont' => 'sans-serif']);
        set_time_limit(300);
        return $pdf->stream();

    }

        /**
     * Display the specified resource.
     */
    public function downloadPdf($id)
    {
        $auditoriaPdf = Auditoria::findOrFail($id);
        $seg = PuntosAuditoria::select('puntos_auditoria.segmentacion')
                ->leftjoin('auditorias', 'puntos_auditoria.id', '=', 'auditorias.precarga_id')->get()->pluck('segmentacion');

        $tip = PuntosAuditoria::select('puntos_auditoria.tipologia')
        ->leftjoin('auditorias', 'puntos_auditoria.id', '=', 'auditorias.precarga_id')->get()->pluck('tipologia');

        $pdf =  Pdf::loadView('pdf.show', compact('seg', 'tip'), ['auditoriaPdf' => $auditoriaPdf])->setOptions(['defaultFont' => 'sans-serif']);
        set_time_limit(300);
        return $pdf->download();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $auditoriaPdf = AuditoriaH::findOrFail($id);
        $seg = PuntosAuditoriaH::select('puntos_auditoria_historico.segmentacion')
                ->leftjoin('auditorias_historico', 'puntos_auditoria_historico.id', '=', 'auditorias_historico.precarga_id')->get()->pluck('segmentacion');

        $tip = PuntosAuditoriaH::select('puntos_auditoria_historico.tipologia')
        ->leftjoin('auditorias_historico', 'puntos_auditoria_historico.id', '=', 'auditorias_historico.precarga_id')->get()->pluck('tipologia');

        $pdf =  Pdf::loadView('pdf.show', compact('seg', 'tip'), ['auditoriaPdf' => $auditoriaPdf])->setOptions(['defaultFont' => 'sans-serif']);
        set_time_limit(300);
        return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExportPdf $exportPdf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExportPdf $exportPdf)
    {
        //
    }
}
