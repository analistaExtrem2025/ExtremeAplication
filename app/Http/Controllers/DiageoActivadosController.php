<?php

namespace App\Http\Controllers;

use App\Models\Diageo_Activados;
use App\Models\Encuestas;
use App\Models\Localidades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiageoActivadosController extends Controller
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
        $tipoD =
            [

                'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
                'NIT – Nit empresas' => 'NIT – Nit empresas',
            ];
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
        } else if (Auth::user()->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 6)->get()->pluck('name');
        } else {

            $localidad = Localidades::all()->pluck('name');
        }
        $canal = [
            'Bar estandar' => 'Bar estandar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos tipicos' => 'Juegos tipicos',
        ];
        $venta = [

            '$0 $300000' => '$0 $300000',
            '$300000 $1500000' => '$300000 $1500000',
            'mas de $1500000' => 'mas de $1500000',

        ];
        $tamaño = [
            'Grande más de 6 metros' => 'Grande más de 6 metros',
            'Mediano entre 3 y 6 metros' => 'Mediano entre 3 y 6 metros',
            'Pequeño menos de 3 metros' => 'Pequeño menos de 3 metros',
        ];
        return view(
            'diageo_activados.create',
            compact(
                'now',
                'tipoD',
                'localidad',
                'canal',
                'venta',
                'tamaño'
            )
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $datosCreacion = request()->except('token');

        if ($request->hasFile('fotoActiv')) {
            $path = $request->file('fotoActiv')->store('public/activados');
        }
        if ($request->hasFile('fotoDocs')) {
            $path2 = $request->file('fotoDocs')->store('public/activados');
        }
        if ($request->hasFile('fotoGifts')) {
            $path3 = $request->file('fotoGifts')->store('public/activados');
        }
        $data = new Encuestas();
        $data->clienteFemsa = 'no';
        $data->razonSocial = $request->razonSocial;
        $data->tipoD = $request->Tipo_de_Documento;
        $data->nDocumento = $request->nDocumento;
        $data->fotoActiv = $path;
        $data->fotoGifts = $path3;
        $data->fotoDocs = $path2;
        $data->nombreNegocio = $request->nombreNegocio;
        $data->nFijo = $request->nFijo;
        $data->nCelular = $request->nCelular;
        $data->email = $request->email;
        $data->departamento =  Auth::user()->departamento;
        $data->municipio =  Auth::user()->municipio;
        $data->localidad = $request->localidad;
        $data->direccion = $request->direccion;
        $data->barrio = $request->barrio;
        $data->canal = $request->canal;
        $data->star = $request->star;
        $data->promotor =  Auth::user()->name;
        $data->nombre_contacto = $request->nombre_contacto;
        $data->apellidos_contacto = $request->apellidos_contacto;
        $data->telContacto = $request->telContacto;
        $data->mane_licores = $request->mane_licores;
        $data->ventaPesos = $request->ventaPesos;
        $data->tamañoEst = $request->tamañoEst;
        $data->gestionActual = 'Activado';
        $data->estadoCarga = 'Visitado';
        $data->gift = $request->gift;
        $data->cantidad = $request->cantidad;
        $data->obsCierre = $request->ObsCierre;
        $data->latitude = $request->lat;
        $data->longitude = $request->lon;
        $data->portafolioDiageo =   json_encode($request->portafolioDiageo);
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
    public function show(Diageo_Activados $diageo_Activados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diageo_Activados $diageo_Activados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $now = Carbon::now();
        $encuestas = Encuestas::findOrFail($id);
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
    public function destroy(Diageo_Activados $diageo_Activados)
    {
        //
    }
}
