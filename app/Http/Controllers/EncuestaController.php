<?php

namespace App\Http\Controllers;


use App\Models\encuesta;
use App\Models\Encuestas;
use App\Models\Localidades;
use App\Models\Municipios;
use App\Models\Puntos_potenciales;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encuestas = Encuestas::all();
        return view('encuestas.index', compact('encuestas'));
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
        $tipoD =
            [
                'CE – Cedula de extranjería' => 'CE – Cedula de extranjería',
                'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
                'NIT – Nit empresas' => 'NIT – Nit empresas',
                'PAS – Pasaporte' => 'PAS – Pasaporte',
                'PEP – Permiso especial de permanencia'
                => 'PEP – Permiso especial de permanencia',
                'PPT – Permiso por protección temporal'
                => 'PPT – Permiso por protección temporal'
            ];
        $canal =
            [
                'Bar estandar' => 'Bar estandar',
                'Tienda de consumo' => 'Tienda de consumo',
                'Licobares' => 'Licobares',
                'Juegos tipicos' => 'Juegos tipicos',
            ];
        return view(
            'encuestas.create',
            compact(
                'localidad',
                'tipoD',
                'now',
                'noConcreciones',
                'canal'
            )
        );
    }

    public function noconcretados(Request $request)
    {
        $datosCreacion = request()->except('token');
        $data = ($request->only(
            'tipoD',
            'canal',
            'departamento',
            'municipio',
            'barrio',
            'motivo_nc',
            'Latitude',
            'Longitude',
            'star'
        )
            +
            [
                'user_id' => Auth::user()->id,
                'localidad' => Localidades::where('id', $request->localidad)->name,
                'gestionActual' => 'Visitado',
                'estadoCarga' => 'NO ACTIVADO'
            ]
        );
        Encuestas::create($data);
        $notification = 'El punto se ha registrado correctamente.';
        return redirect('/encuestas')->with(compact('notification'));
    }

    public function cerrados(Request $request)
    {
        $canal =
            [
                'Bar estandar' => 'Bar estandar',
                'Tienda de consumo' => 'Tienda de consumo',
                'Licobares' => 'Licobares',
                'Juegos tipicos' => 'Juegos tipicos',
            ];
        $datosCreacion = request()->except('token');
        $data = ($request->only(
            'fachada',
            'canal',
            'lat',
            'lon',
            'departamento',
            'municipio',
        )
            +
            [
                'localidad' => Localidades::where('id', $request->localidad)->name,
                'registradoPor' => Auth::user()->id,

            ]
        );
        Puntos_potenciales::create($data);
        $notification = 'El punto se ha registrado correctamente.';
        return redirect('/encuestas')->with(compact('notification', 'canal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->estado == 'cerrado') {
            $datosCreacion = request()->except('token');
            if ($request->hasFile('fachada')) {
                $datosReclutamiento['fachada'] = $request->file('fachada')->store('uploads', 'public');
            }
            $data = ($request->only(
                'fachada',
                'canal',
                'lat',
                'lon',
                'departamento',
                'municipio',
                'localidad'
            )
                +
                [
                    'registradoPor' => Auth::user()->name,
                ]
            );
            Puntos_potenciales::create($data);
            $notification = 'El punto se ha registrado correctamente.';
            return redirect('/encuestas')->with(compact('notification'));
        } else if ($request->estado == 'no') {
            $datosCreacion = request()->except('token');
            $data = ($request->only(
                'tipoD',
                'canal',
                'departamento',
                'municipio',
                'barrio',
                'motivo_nc',
                'Latitude',
                'Longitude',
                'star'
            )
                +
                [
                    'user_id' => Auth::user()->id,
                    'gestionActual' => 'Visitado',
                    'estadoCarga' => 'NO ACTIVADO'
                ]
            );
            Encuestas::create($data);
            $notification = 'El punto se ha registrado correctamente.';
            return redirect('/encuestas')->with(compact('notification'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $now = Carbon::now();
        $departamentos = [

            'BOGOTA' => 'BOGOTA',
            'ATLANTICO' => 'ATLANTICO',
            'VALLE DEL CAUCA' => 'VALLE DEL CAUCA',
            'SANTANDER' => 'SANTANDER',
            'ANTIOQUIA' => 'ANTIOQUIA',
        ];
        $tipoD = [
            'CE – Cedula de extranjería' => 'CE – Cedula de extranjería',
            'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
            'NIT – Nit empresas' => 'NIT – Nit empresas',
            'PAS – Pasaporte' => 'PAS – Pasaporte',
            'PEP – Permiso especial de permanencia' => 'PEP – Permiso especial de permanencia',
            'PPT – Permiso por protección temporal' => 'PPT – Permiso por protección temporal'
        ];
        $encuestas = Encuestas::findOrFail($id);
        return view('encuestas.edit', compact('encuestas', 'now', 'tipoD', 'departamentos'));
    }
}
