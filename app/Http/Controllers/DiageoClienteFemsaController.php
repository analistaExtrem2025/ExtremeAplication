<?php

namespace App\Http\Controllers;

use App\Models\Diageo_ClienteFemsa;
use App\Models\Encuestas;
use App\Models\Localidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DiageoClienteFemsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = Carbon::now();
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
        } else if (Auth::user()->municipio  == "CALI") {
            $localidad = Localidades::where('municipio_id', 6)->get()->pluck('name');
        } else {

            $localidad = Localidades::all()->pluck('name');
        }
        return view('diageo_clienteFemsa.create', compact('now', 'localidad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $now = Carbon::now();
        $datosCreacion = request()->except('token');
        if ($request->hasFile('fachada')) {
            $path = $request->file('fachada')->store('public/clienteFemsa');
        }
        if ($request->hasFile('fotoDocs')) {
            $path2 = $request->file('fotoDocs')->store('public/clienteFemsa');
        }
        $data = new Encuestas();
        $data->clienteFemsa = 'si';
        $data->fotoActiv =  $path;
        $data->fotoDocs =  $path2;
        $data->codigo = $request->codigo;
        $data->razonSocial = $request->nombreNegocio;
        $data->nombreNegocio = $request->nombreNegocio;
        $data->direccion = $request->direccion;
        $data->latitude = $request->lat;
        $data->longitude = $request->lon;
        $data->star = $request->star;
        $data->promotor =  Auth::user()->name;
        $data->departamento =  Auth::user()->departamento;
        $data->municipio =  Auth::user()->municipio;
        $data->localidad = $request->localidad;
        $data->barrio = $request->barrio;
        $data->gestionActual = 'Cliente Femsa';
        $data->estadoCarga = 'Visitado';
        $data->obsCierre = $request->ObsCierre;
        $data->star = $request->star;
        $data->estadoEnvio = 'Pendiente Gestion Calidad';
        $data->respuestaEnvio = 'Enviado a Calidad';
        $data->fechaRespuesta = $now;
        $data->save();
        $notification = 'El punto se ha registrado correctamente.';
        return redirect('/encuestas')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Diageo_ClienteFemsa $diageo_ClienteFemsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        $now = Carbon::now();
        $encuestas = Encuestas::findOrFail($id);

        if ($request->hasFile('fotoActiv')) {
            $path = $request->file('fotoActiv')->store('public/clienteFemsa');
        }
        $datosActivados = request()->except(['_token', '_method']);

        //dd($request->all());
        if ($request->estatusCalidad != 'Revisado Ok') {
            $encuestas->update(
                [
                    'estatusCalidad' => $request->estatusCalidad,
                    'estadoEnvio' => 'Gestionado Calidad',
                    'respuestaEnvio' => $request->estatusCalidad,
                    'fechaRespuesta' => $now
                ]
            );
        } else if ($request->estatusCalidad == 'Revisado Ok') {
            $encuestas->update(
                [
                    'estatusCalidad' => $request->estatusCalidad,
                    'estadoEnvio' => 'Gestionado Calidad',
                    'respuestaEnvio' => 'Disponible envio Femsa',
                    'fechaRespuesta' => $now
                ]
            );
        }
        $encuestas->update(
            $datosActivados
        );
        return back()->with('info', 'El registro de actualizo con éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diageo_ClienteFemsa $diageo_ClienteFemsa)
    {
        //
    }
}

