<?php

namespace App\Http\Controllers;

use App\Models\Diageo_NoActivados;
use App\Models\Encuestas;
use App\Models\Localidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiageoNoActivadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = Carbon::now();
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
        $noConcreciones =
            [
                'Por razones de seguridad' => 'Por razones de seguridad',
                'La actividad no le genera confianza'
                => 'La actividad no le genera confianza',
                'No hubo confirmacion por parte de FEMSA'
                => 'No hubo confirmacion por parte de FEMSA',
                'No es el dueño' => 'No es el dueño',
                'No sabe los datos' => 'No sabe los datos',
            ];
        return view('diageo_noConcretados.create', compact('canal', 'localidad', 'noConcreciones', 'now'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $datosCreacion = request()->except('token');
        if ($request->hasFile('fachada')) {
            $path = $request->file('fachada')->store('public/activados');
        }
        $data = new Encuestas();
        $data->fotoActiv =  $path;
        $data->canal = $request->canal;
        $data->motivo_nc = $request->motivo_nc;
        $data->Latitude = $request->lat;
        $data->Longitude = $request->lon;
        $data->star = $request->star;
        $data->promotor =  Auth::user()->name;
        $data->departamento =  Auth::user()->departamento;
        $data->municipio =  Auth::user()->municipio;
        $data->localidad = $request->localidad;
        $data->barrio = $request->barrio;
        $data->gestionActual = 'No Activado';
        $data->estadoCarga = 'Visitado';
        $data->ObsCierre = $request->ObsCierre;
        $data->razonSocial = $request->razonSocial;
        $data->nombreNegocio = $request->razonSocial;
        $data->direccion = $request->direccion;
        $data->save();

        $notification = 'El punto se ha registrado correctamente.';
        return redirect('/encuestas')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Diageo_NoActivados $diageo_NoActivados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diageo_NoActivados $diageo_NoActivados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diageo_NoActivados $diageo_NoActivados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diageo_NoActivados $diageo_NoActivados)
    {
        //
    }
}
