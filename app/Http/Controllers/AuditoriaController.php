<?php

namespace App\Http\Controllers;


use App\Models\Auditoria;
use App\Models\PuntosAuditoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Validator;


class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = Carbon::today();
        $date = $date->toDateString();

        $puntos_auditoria = PuntosAuditoria::all();

        // $puntos_auditoria = PuntosAuditoria::where('asignadoA', Auth::user()->name)
        //     ->where('estatusGestion', 'Asignado')
        //     ->where('fechaAsignado', $date)
        //     ->get();
        return view('auditoria.index', compact('puntos_auditoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = SupportCarbon::now();

        $si_no = ['si' => 'si', 'no' => 'no'];

        $tipologia = [
            'Bar estándar' => 'Bar estándar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos típicos' => 'Juegos típicos',
            'Otro' => 'Otro',
        ];

        $segmento = [

            "Gold" => "Gold",
            "Silver" => "Silver",
            "Bronce" => "Bronce",
        ];

        $noConcreciones = [
            'El cliente no permitio' => 'El cliente no permitio',
            'PDV cerrado' => 'PDV cerrado',
            'Dirección no existente' => 'Dirección no existente',
            'Incumplimiento de agencía' => 'Incumplimiento de agencía',
            'Negocio terminado' => 'Negocio terminado',
            'Otro motivo' => 'Otro motivo',
        ];

        $diageoMarca = [
            "Black & White" => "Black & White",
            "Smirnoff x 1" => "Smirnoff x 1",
            "Jhonnie Walker" => "Jhonnie Walker",
            "Buchanna's" => "Buchanna's",
            "Old Parr" => "Old Parr",
            "Multimarca" => "Multimarca",
        ];

        $marcasDisponibles = [
            'Black & White 1000 ml' => 'Black & White 1000 ml',
            'Black & White 700 ml' => 'Black & White 700 ml',
            'Black & White 375 ml' => 'Black & White 375 ml',
            'Smirnoff 700 ml' => 'Smirnoff 700 ml',
            'Smirnoff 375 ml' => 'Smirnoff 375 ml',
            'Johnnie Walker 1000 ml' => 'Johnnie Walker 1000 ml',
            'Johnnie Walker 700 ml' => 'Johnnie Walker 700 ml',
            'Johnnie Walker 375 ml' => 'Johnnie Walker 375 ml',
            'Buchanan´s 700 ml' => 'Buchanan´s 700 ml',
            'Buchanan´s 375 ml' => 'Buchanan´s 375 ml',
            'Old Parr 750 ml' => 'Old Parr 750 ml',

        ];

        $competenciaRon = [
            'Viejo de caldas' => 'Viejo de caldas',
            'Medellín añejo 3 años' => 'Medellín añejo 3 años',
            'Santa Fe' => 'Santa Fe',
            'Otro' => 'Otro',
            'Ninguno' => 'Ninguno',
        ];
        $competenciaAguardiente = [
            'Antioqueño con azúcar' => 'Antioqueño con azúcar',
            'Antioqueño sin azúcar' => 'Antioqueño sin azúcar',
            'Antioqueño  24  grados verde' => 'Antioqueño  24  grados verde',
            'Néctar con azúcar' => 'Néctar con azúcar',
            'Néctar 24 grados verde' => 'Néctar 24 grados verde',
            'Blanco  del  valle con azúcar' => 'Blanco  del  valle con azúcar',
            'Blanco del valle sin azúcar' => 'Blanco del valle sin azúcar',
            'Blanco  24 grados nigth' => 'Blanco  24 grados nigth',
            'Amarillo 750 ml' => 'Amarillo 750 ml',
            'Otro' => 'Otro',
            'Ninguno' => 'Ninguno',
        ];

        return view(
            'auditoria.create',
            compact(
                'si_no',
                'tipologia',
                'noConcreciones',
                'segmento',
                'now',
                'diageoMarca',
                'marcasDisponibles',
                'competenciaRon',
                'competenciaAguardiente'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'precarga_id' => 'unique:auditorias',
            ],
            $messages =
                [
                    'unique' => 'el registro con el id :'.  $request->precarga_id. ', ya se guardo con anterioridad',
                ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $datosReporte = request()->except('_token');
            if ($request->hasFile('fotoActiv')) {
                $imagen = $request->file('fotoActiv');
                $nombre = "_" . $request->precarga_id . '.' . 'png';
                $destino = public_path('auditorias_pics/activacion');
                $request->fotoActiv->move($destino, $nombre);
                $red = Image::make($destino . '/' . $nombre);
                $red->resize(
                    380,
                    null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                );
                $red->text(
                    $request->precarga_id . " " .
                        $request->activacion . " " .
                        $request->star . " " .
                        $request->direccion . " " .
                        $request->municipio . " " .
                        $request->lat . " " .
                        $request->lon,
                    0,
                    10,
                    function ($font) {
                        $font->file(1);
                        $font->color('#00ff40');
                        $font->size(65);
                        $font->align('left');
                        $font->valign('top');
                        $font->angle(45);
                        $font->countLines(4);
                    }
                );
                $red->save($destino . $nombre);
            }
            if ($request->activacion == 'activo') {
                $activacion = new Auditoria();
                $activacion->star = $request->star;
                $activacion->latitude = $request->lat;
                $activacion->longitude = $request->lon;
                $activacion->razonSocial = $request->razonSocial;
                $activacion->promotor =  Auth::user()->name;
                $activacion->nit = $request->nit;
                $activacion->direccion = $request->direccion;
                $activacion->precarga_id = $request->precarga_id;
                $activacion->telefono = $request->telefono;
                $activacion->departamento = $request->departamento;
                $activacion->municipio = $request->municipio;
                $activacion->barrio = $request->barrio;
                $activacion->activacion = $request->activacion;
                $activacion->fotoActiv = 'auditorias_pics/fachadas' .  $nombre;
                $activacion->estatusGestion = 'Pendiente - tipologia';
                $activacion->save();
                return redirect('tipologia');
            } else if ($request->activacion == 'inactivo') {
                $activacion = new Auditoria();
                $activacion->star = $request->star;
                $activacion->latitude = $request->lat;
                $activacion->longitude = $request->lon;
                $activacion->razonSocial = $request->razonSocial;
                $activacion->promotor =  Auth::user()->name;
                $activacion->nit = $request->nit;
                $activacion->direccion = $request->direccion;
                $activacion->precarga_id = $request->precarga_id;
                $activacion->telefono = $request->telefono;
                $activacion->departamento = $request->departamento;
                $activacion->municipio = $request->municipio;
                $activacion->barrio = $request->barrio;
                $activacion->activacion = $request->activacion;
                $activacion->noConcreciones = $request->noConcreciones;
                $activacion->cual = $request->cual;
                $activacion->observaciones = $request->observaciones;
                $activacion->fotoActiv = 'auditorias_pics/fachadas' .  $nombre;

                $activacion->save();
                $now = Carbon::now();
                $id =  $request->precarga_id;
                $no_concretado = PuntosAuditoria::findOrFail($id);
                $no_concretado->estatusGestion = 'gestionado - no concretado';
                $no_concretado->fechaFinalizado = $now;
                $no_concretado->save();
                return redirect('auditoria');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $now = Carbon::now();

        $si_no = ['si' => 'si', 'no' => 'no'];

        $tipologia = [
            'Bar estándar' => 'Bar estándar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos típicos' => 'Juegos típicos',
        ];

        $segmento = [

            "Gold" => "Gold",
            "Silver" => "Silver",
            "Bronce" => "Bronce",

        ];

        $noConcreciones = [
            'El cliente no permitio' => 'El cliente no permitio',
            'PDV cerrado' => 'PDV cerrado',
            'Dirección no existente' => 'Dirección no existente',
            'Incumplimiento de agencía' => 'Incumplimiento de agencía',
            'Negocio terminado' => 'Negocio terminado',
            'Otro motivo' => 'Otro motivo',
        ];

        $diageoMarca = [
            "Black & White" => "Black & White",
            "Smirnoff x 1" => "Smirnoff x 1",
            "Jhonnie Walker" => "Jhonnie Walker",
            "Buchanna's" => "Buchanna's",
            "Old Parr" => "Old Parr",
            "Multimarca" => "Multimarca",
        ];

        $marcasDisponibles = [
            'Black & White 1000 ml' => 'Black & White 1000 ml',
            'Black & White 700 ml' => 'Black & White 700 ml',
            'Black & White 375 ml' => 'Black & White 375 ml',
            'Smirnoff 700 ml' => 'Smirnoff 700 ml',
            'Smirnoff 375 ml' => 'Smirnoff 375 ml',
            'Johnnie Walker 1000 ml' => 'Johnnie Walker 1000 ml',
            'Johnnie Walker 700 ml' => 'Johnnie Walker 700 ml',
            'Johnnie Walker 375 ml' => 'Johnnie Walker 375 ml',
            'Buchanan´s 700 ml' => 'Buchanan´s 700 ml',
            'Buchanan´s 375 ml' => 'Buchanan´s 375 ml',
            'Old Parr 750 ml' => 'Old Parr 750 ml',
        ];

        $competenciaRon = [
            'Viejo de caldas' => 'Viejo de caldas',
            'Medellín añejo 3 años' => 'Medellín añejo 3 años',
            'Santa Fe' => 'Santa Fe',
            'Otro' => 'Otro',
        ];
        $competenciaAguardiente = [
            'Antioqueño con azúcar' => 'Antioqueño con azúcar',
            'Antioqueño sin azúcar' => 'Antioqueño sin azúcar',
            'Antioqueño  24  grados verde' => 'Antioqueño  24  grados verde',
            'Néctar con azúcar' => 'Néctar con azúcar',
            'Néctar 24 grados verde' => 'Néctar 24 grados verde',
            'Blanco  del  valle con azúcar' => 'Blanco  del  valle con azúcar',
            'Blanco del valle sin azúcar' => 'Blanco del valle sin azúcar',
            'Blanco  24 grados nigth' => 'Blanco  24 grados nigth',
            'Amarillo 750 ml' => 'Amarillo 750 ml',
            'Otro' => 'Otro',
        ];
        $puntos_auditoria = PuntosAuditoria::findOrFail($id);
        $usuario = Auth::user()->municipio;

        return view(
            'auditoria.show',
            compact(
                'puntos_auditoria',
                'si_no',
                'tipologia',
                'noConcreciones',
                'segmento',
                'now',
                'diageoMarca',
                'marcasDisponibles',
                'competenciaRon',
                'competenciaAguardiente',
                'usuario'
            )
        );
    }


    // public function export(){
    //     return Excel::download(new UsersExport, 'users.xlsx');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auditoria $auditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auditoria $auditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Auditoria::destroy($id);
        return redirect()->route('auditoria.index')
            ->with('status_success', 'registro eliminado exitosamente');
    }
}
