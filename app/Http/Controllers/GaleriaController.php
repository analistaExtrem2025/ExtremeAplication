<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::all();

        //
       // dd($auditoria[1]);

        return view('auditoria.galeriaIndex', compact('auditoria'));
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

        $reporte = Auditoria::findOrFail($id);
        //dd($reporte);
        return view('auditoria.galeriaEdit', compact('reporte'));

        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $calidadAuditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeria $galeria)
    {
        //
    }
}
