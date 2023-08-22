<?php

namespace App\Http\Controllers;

use App\Models\Diageo_Cerrados;
use App\Models\Localidades;
use App\Models\Puntos_potenciales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiageoCerradosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('encuesta.diageo.edit')) {
            $cerrados = Puntos_potenciales::all();
        } else if ((auth()->user()->can('encuesta.diageo.index'))) {
            $cerrados = Puntos_potenciales::where('registradoPor', Auth::user()->name)->get();
        }

        return view('diageo_cerrados.index', compact('cerrados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $canal = [
            'Bar estandar' => 'Bar estandar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos tipicos' => 'Juegos tipicos'
        ];
        if (Auth::user()->municipio  == "BOGOTA") {
            $localidad = Localidades::where('municipio_id', 1)->get()->pluck('name');
        } else if (Auth::user()->municipio  == "MEDELLIN") {
            $localidad = Localidades::where('municipio_id', 2)->get()->pluck('name');
        } else if (Auth::user()->municipio  == "BARRANQUILLA") {
            $localidad = Localidades::where('municipio_id', 3)->get()->pluck('name');
        } else if (Auth::user()->municipio  == "SOACHA") {
            $localidad = Localidades::where('municipio_id', 4)->get()->pluck('name');
        } else if (Auth::user()->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 5)->get()->pluck('name');
        } else if (Auth::user()->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 6)->get()->pluck('name');
        } else {

            $localidad = Localidades::all()->pluck('name');
        }



        return view('diageo_cerrados.create', compact('canal', 'localidad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $datosCreacion = request()->except('token');
        if ($request->hasFile('fachada')) {

            $path = $request->file('fachada')->store('public/cerrados');
        } else {
            'no tiene una fachada cargada';
        }
        $data = new Diageo_Cerrados();

        $data->fachada =  $path;
        $data->canal = $request->canal;
        $data->lat = $request->lat;
        $data->lon = $request->lon;
        $data->registradoPor =  Auth::user()->name;
        $data->departamento =  Auth::user()->departamento;
        $data->municipio =  Auth::user()->municipio;
        $data->localidad = $request->localidad;
        $data->barrio = $request->barrio;
        $data->direccion = $request->direccion;
        $data->save();

        return redirect('encuestas')->with('alert', 'Los datos han sido registrado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diageo_Cerrados $diageo_Cerrados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diageo_Cerrados $diageo_Cerrados, $id)
    {

        $cerrados = Puntos_potenciales::findOrFail($id);
        $now = Carbon::now();
        $canal = [
            'Bar estandar' => 'Bar estandar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos tipicos' => 'Juegos tipicos',
        ];


        if ($cerrados->municipio  == "BOGOTA") {
            $localidad = Localidades::where('municipio_id', 1)->pluck('name');
        } else if ($cerrados->municipio  == "MEDELLIN") {
            $localidad = Localidades::where('municipio_id', 2)->pluck('name');
        } else if ($cerrados->municipio  == "BARRANQUILLA") {
            $localidad = Localidades::where('municipio_id', 3)->pluck('name');
        } else if ($cerrados->municipio  == "SOACHA") {
            $localidad = Localidades::where('municipio_id', 4)->pluck('name');
        } else if ($cerrados->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 5)->pluck('name');
        } else if ($cerrados->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 6)->pluck('name');
        };

        $statusClose = [
            'Para visitar de nuevo' => 'Para visitar de nuevo',
            'No es del foco según foto' => 'No es del foco según foto',
            'ya se activo en otra visita' => 'ya se activo en otra visita',
            'punto no valido por incosistencia en datos' => 'punto no valido por incosistencia en datos',
        ];

        return view ('diageo_cerrados.edit', compact('cerrados', 'canal', 'localidad', 'statusClose', 'now'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosCerrados = request()->except(['_token', '_method']);
        Puntos_potenciales::where('id', $id)->update($datosCerrados);
        return redirect('diageo_cerrados')->with('info', 'El registro de actualizao con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Diageo_Cerrados::destroy($id);

        return redirect()->route('diageo_cerrados.index')->with('info', 'El punto se elimino con éxito');
    }
}
