<?php

namespace App\Http\Controllers;


use App\Models\Encuestas;
use App\Models\Localidades;
use App\Models\Puntos_potenciales;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class EncuestaController extends Controller
{





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->role;
        $today = Carbon::now();
        $today = Carbon::parse($today);


        //if (auth()->user()->can('encuesta.diageo.edit')) {
        if ($role == 3) {
            $activados = Encuestas::where(
                'gestionActual',
                'Activado'
            )->get()->count();
            $noactivados = Encuestas::where('gestionActual', 'No Concretado')
                ->get()->count();
            $femsa = Encuestas::where('gestionActual', 'Cliente Femsa')
                ->get()->count();
            $cerrados = Puntos_potenciales::get()->count();
            $activadosHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'Activado')->get()->count();
            $noactivadosHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'No Concretado')->get()->count();
            $femsaHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'Cliente Femsa')->get()->count();
            $cerradosHoy = Puntos_potenciales::whereDate('created_at', $today)
                ->get()->count();

            $encuestas = Encuestas::all();
            //$encuestas = Encuestas::where('estadoEnvio', 'Devuelto' || 'Pendiente Gestion Calidad')->get();
            return view(
                'encuestas.index',
                compact(
                    'encuestas',
                    'activados',
                    'noactivados',
                    'femsa',
                    'cerrados',
                    'activadosHoy',
                    'noactivadosHoy',
                    'femsaHoy',
                    'cerradosHoy'
                )
            );
        } else if ($role == 2) {

            $activados = Encuestas::where('gestionActual', 'Activado')->where('promotor', Auth::user()->name)->get()->count();
            $noactivados = Encuestas::where('gestionActual', 'No Concretado')->where('promotor', Auth::user()->name)->get()->count();
            $femsa = Encuestas::where('gestionActual', 'Cliente Femsa')->where('promotor', Auth::user()->name)->get()->count();
            $cerrados = Puntos_potenciales::where('registradoPor', Auth::user()->name)->get()->count();

            $activadosHoy = Encuestas::where('gestionActual', 'Activado')->where('promotor', Auth::user()->name)->whereDate('created_at', $today)->get()->count();
            $noactivadosHoy = Encuestas::where('gestionActual', 'No Concretado')->where('promotor', Auth::user()->name)->whereDate('created_at', $today)->get()->count();
            $femsaHoy = Encuestas::where('gestionActual', 'Cliente Femsa')->where('promotor', Auth::user()->name)->whereDate('created_at', $today)->get()->count();
            $cerradosHoy = Puntos_potenciales::where('registradoPor', Auth::user()->name)->whereDate('created_at', $today)->get()->count();

            $encuestas = Encuestas::where('promotor', Auth::user()->name)->get();
            return view(
                'encuestas.index',
                compact(
                    'encuestas',
                    'activados',
                    'noactivados',
                    'femsa',
                    'cerrados',
                    'activadosHoy',
                    'noactivadosHoy',
                    'femsaHoy',
                    'cerradosHoy'
                )
            );
        } else if ($role == 1) {
            $activados = Encuestas::where(
                'gestionActual',
                'Activado'
            )->get()->count();
            $noactivados = Encuestas::where('gestionActual', 'No Concretado')
                ->get()->count();
            $femsa = Encuestas::where('gestionActual', 'Cliente Femsa')
                ->get()->count();
            $cerrados = Puntos_potenciales::get()->count();
            $activadosHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'Activado')->get()->count();
            $noactivadosHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'No Concretado')->get()->count();
            $femsaHoy = Encuestas::whereDate('created_at', $today)
                ->where('gestionActual', 'Cliente Femsa')->get()->count();
            $cerradosHoy = Puntos_potenciales::whereDate('created_at', $today)
                ->get()->count();
            $encuestas = Encuestas::all();

            return view(
                'encuestas.index',
                compact(
                    'encuestas',
                    'activados',
                    'noactivados',
                    'femsa',
                    'cerrados',
                    'activadosHoy',
                    'noactivadosHoy',
                    'femsaHoy',
                    'cerradosHoy'
                )
            );
        }
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

                'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
                'NIT – Nit empresas' => 'NIT – Nit empresas',

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
                'estadoCarga' => 'No Concretado'
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
                    'estadoCarga' => 'No Concretado'
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

        $encuestas = Encuestas::findOrFail($id);
        if ($encuestas->municipio  == "BOGOTA") {
            $localidad = Localidades::where('municipio_id', 1)->pluck('name');
        } else if ($encuestas->municipio  == "MEDELLIN") {
            $localidad = Localidades::where('municipio_id', 2)->pluck('name');
        } else if ($encuestas->municipio  == "BARRANQUILLA") {
            $localidad = Localidades::where('municipio_id', 3)->pluck('name');
        } else if ($encuestas->municipio  == "SOACHA") {
            $localidad = Localidades::where('municipio_id', 4)->pluck('name');
        } else if ($encuestas->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 5)->pluck('name');
        } else if ($encuestas->municipio  == "BUCARAMANGA") {
            $localidad = Localidades::where('municipio_id', 6)->pluck('name');
        };

        $canal =
            [
                'Bar estandar' => 'Bar estandar',
                'Tienda de consumo' => 'Tienda de consumo',
                'Licobares' => 'Licobares',
                'Juegos tipicos' => 'Juegos tipicos',
            ];

        $tipoD =
            [
                'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
                'NIT – Nit empresas' => 'NIT – Nit empresas',

            ];

        $statusC = [
            'Revisado Ok' => 'Revisado Ok',
            'email no existe' => 'email no existe',
            'Nit o CC no encontradas' => 'Nit o CC no encontradas',
            'Direccion imposible de corregir' => 'Direccion imposible de corregir',
        ];

        $statusF = [
            'Revisado Ok' => 'Revisado Ok',
            'Direccion imposible de corregir' => 'Direccion imposible de corregir',
            'Codigo no coincide' => 'Codigo no coincide',
        ];

        $statusN = [
            'Revisado Ok' => 'Revisado Ok',
            'Direccion imposible de corregir' => 'Direccion imposible de corregir',
            'volver a visitar' => 'volver a visitar',
        ];

        if ($encuestas->gestionActual == 'Cliente Femsa') {

            return view('diageo_clienteFemsa.edit', compact('encuestas', 'canal',  'statusF', 'now'));
        } else if ($encuestas->gestionActual ==  'No Concretado') {
            return view('diageo_noConcretados.edit', compact('encuestas', 'canal',  'statusN', 'now'));
        } else if ($encuestas->gestionActual ==  'Activado') {
            return view('diageo_activados.edit', compact('encuestas', 'tipoD', 'canal', 'statusC', 'now'));
        }

        $now = Carbon::now();
        $departamentos = [

            'BOGOTA' => 'BOGOTA',
            'ATLANTICO' => 'ATLANTICO',
            'VALLE DEL CAUCA' => 'VALLE DEL CAUCA',
            'SANTANDER' => 'SANTANDER',
            'ANTIOQUIA' => 'ANTIOQUIA',
        ];
        $tipoD = [
            'CC – Cedula de Ciudadanía' => 'CC – Cedula de Ciudadanía',
            'NIT – Nit empresas' => 'NIT – Nit empresas',

        ];

        return view('encuestas.edit', compact('encuestas', 'now', 'tipoD', 'departamentos'));
    }

    public function show(Request $request, $id)
    {

        $encuestas = Encuestas::findOrFail($id);

        return view('encuestas.show', compact('encuestas'));
    }


    public function subida(Request $request, $id, Encuestas $encuestas)
    {
        $encuestas = Encuestas::findOrFail($id);
        $data = $request->only(
            'fotoActiv',
            'codigo',
        );
        // Valido si el check es igual a 1 lo que significa que se subió un nuevo archivo
        if ($request->hasfile('fotoActiv')) {
            // Guardo el archivo en la carpeta Publica Uploads y obtengo la ubicacion
            $filepath = $request->file('fotoActiv')->store('clienteFemsa', 'public');
        }
        $data['fotoActiv'] = $filepath;

        $encuestas->update($data);

        return redirect('encuestas')->with('info', 'El registro de actualizo con éxito');
    }


    public function update(Request $request, $id, Encuestas $encuestas)
    {
        $now = Carbon::now();
        // Busco el id en repo_table
        $encuestas = Encuestas::findOrFail($id);
        $filepath = "";
        $data = $request->only(
            'fotoActiv',
            'codigo',
            'canal',
            'nombreNegocio',
            'direccion',
            'localidad',
            'barrio',
            'municipio',
            'departamento',
            'latitude',
            'longitude',
            'star',
            'promotor',
            'gestionActual',
            'estadoCarga',
            'usuarioCalidad',
            'ObsCalidad',
            'fechaCalidad'

        );
        if (is_null($encuestas->fotoActiv)) {
            // Valido si el check es igual a 1 lo que significa que se subió un nuevo archivo
            if ($request->hasfile('fotoActiv')) {
                // Guardo el archivo en la carpeta Publica Uploads y obtengo la ubicacion

                $filepath = $request->file('fotoActiv')->store('clienteFemsa', 'public');
            }
            $data['fotoActiv'] = $filepath;
        }

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
            $data
        );
        //return back();
        return back()->with('info', 'El registro de actualizo con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Encuestas::destroy($id);

        return back()->with('info', 'El punto se elimino con éxito');
    }
}
