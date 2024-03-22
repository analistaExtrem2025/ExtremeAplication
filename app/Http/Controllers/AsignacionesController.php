<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use App\Models\PuntosAuditoria;
use App\Models\User;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos_auditoria = PuntosAuditoria::all();

        return view('auditoria.indexAsignacion', compact('puntos_auditoria'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $puntos_auditoria = PuntosAuditoria::findOrfail($id);

        $usuarios = User::select('name')->where("role", 3)->get();
        $estatus =
            [
                'Asignado' => 'Asignado',
                'Diligenciado' => 'Diligenciado',
                'Zona roja' => 'Zona roja',
                'gestionado - no concretado' => 'Gestionado - no concretado',
                '' => 'Disponible',
            ];

        return view('auditoria.asignacionEdit', compact('puntos_auditoria', 'usuarios', 'estatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $puntos_auditoria = PuntosAuditoria::findOrFail($id);
        if ($request->sele == 'nueva' || $request->sele == 'edita') {
            $datos = request()->except('sele', '_token', '_method');
            $merge = [
                'fechaAsignado' => $request->fechaAsignado,
                'fechaFinalizado' => null,
                'asignadoA' => $request->asignadoA,
            ];

            $puntos_auditoria->update($datos);
        } else if ($request->sele == 'elimina') {
            $merge = [
                'asignadoA' => null,
                'fechaAsignado' => null,
                'fechaFinalizado' => null,
            ];
            //dd($request->all());

            $datos = request()->merge($merge)->except(['_token', '_method', 'sele',]);

            $puntos_auditoria->update($datos);
        }
        return back();
    }


    public function maps()
    {
        $puntos_auditoria = PuntosAuditoria::first();

        $direcciones = PuntosAuditoria::get();

        $ciudades = [
            "BOGOTA" => "BOGOTA",
            "MEDELLIN" => "MEDELLIN",
            "BARRANQUILLA" => "BARRANQUILLA",
            "CALI" => "CALI",
            "BUCARAMANGA" => "BUCARAMANGA"
        ];

        $bta =  PuntosAuditoria::where('municipio', "BOGOTA")->where('estatusGestion', NULL)->get()->pluck('direccion', 'id');
        $med =  PuntosAuditoria::where('municipio', "MEDELLIN")->where('estatusGestion', NULL)->get()->pluck('direccion', 'id');
        $cal =  PuntosAuditoria::where('municipio', "CALI")->where('estatusGestion', NULL)->get()->pluck('direccion', 'id');
        $buc =  PuntosAuditoria::where('municipio', "BUCARAMANGA")->where('estatusGestion', NULL)->get()->pluck('direccion', 'id');
        $bar =  PuntosAuditoria::where('municipio', "BARRANQUILLA")->where('estatusGestion', NULL)->get()->pluck('direccion', 'id');

        $long = $puntos_auditoria->longitude;
        $lat = $puntos_auditoria->latitude;

        $coord = ["[" . $lat . "," . $long . "]"];

        return view(
            'auditoria.map',
            compact(
                'puntos_auditoria',
                'long',
                'lat',
                'coord',
                'ciudades',
                'bta',
                'med',
                'cal',
                'buc',
                'bar',
                'direcciones'
            )
        );
    }

    public function mapsStore(Request $request)
    {
        dd($request->all());
        $datosCreacion = request()->except('token');
        $notification = 'El punto se ha registrado correctamente.';
    //    dd($request->all());
        return redirect('/maps')->with(compact('notification'));
    }
}
