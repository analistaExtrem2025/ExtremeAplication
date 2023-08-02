<?php

namespace App\Http\Controllers;

use App\Models\Diageo_Cerrados;
use App\Models\Localidades;
use App\Models\Puntos_potenciales;
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
        return view('diageo_cerrados.index');
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

        return back()->with('alert', 'Los datos han sido registrado con exito');
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
    public function edit(Diageo_Cerrados $diageo_Cerrados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diageo_Cerrados $diageo_Cerrados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diageo_Cerrados $diageo_Cerrados)
    {
        //
    }
}
