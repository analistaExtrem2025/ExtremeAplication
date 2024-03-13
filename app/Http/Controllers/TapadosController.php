<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\PuntosAuditoria;
use App\Models\Tapados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TapadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::Where('star', '>=', '2024-01-01 00:00:00')
            //$auditoria = Auditoria::Where('star', '>=', '2023-11-15 00:00:00')
            // ->where('activacion', 'inactivo')
            ->where('OtraTipologia', 999999)
           // ->orWhere('noConcreciones', 'PDV cerrado segunda visita')
            ->get();


            $auditoria = Auditoria::where('OtraTipologia', 999999)
                ->get();
        return view('auditoria.galeriaIndex', compact('auditoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $puntos_auditoria = Tapados::findOrFail($id);
        $datos = PuntosAuditoria::select('tipologia')->where('id', $puntos_auditoria->precarga_id)->get()->pluck('tipologia');
        return view('auditoria.newTapados', compact('puntos_auditoria', 'datos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tapados $Tapados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        if ($request->hasFile('seleccionProd_tapados')) {
            $datospdTapados['seleccionProd_tapados'] = $request->file('seleccionProd_tapados')->storeAs('auditorias_pics', 'prodTapados-' . $request->precarga_id . '.png', 'public');
        }

        $materiales = Tapados::findOrFail($id);
        $materiales->update(
            [
                'prod_tapados' => $request->prod_tapados,
                'seleccionProd_tapados' => $request->file('seleccionProd_tapados')->storeAs('auditorias_pics', 'prodTapados-' . $request->precarga_id . '.png', 'public'),
                'prod_danados' => $request->prod_danados,
                'seleccionprod_danados' => $request->file('seleccionprod_danados')->storeAs('auditorias_pics', 'prodDanados-' . $request->precarga_id . '.png', 'public'),
                'prod_visibles' => $request->prod_visibles,
                'seleccionprod_visibles' => $request->file('seleccionprod_visibles')->storeAs('auditorias_pics', 'prodVisibles-' . $request->precarga_id . '.png', 'public'),
            ]
        );

        return redirect('exhibicion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tapados $Tapados)
    {
        //
    }
}
