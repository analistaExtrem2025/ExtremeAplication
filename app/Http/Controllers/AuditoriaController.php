<?php

namespace App\Http\Controllers;


use App\Models\Auditoria;
use App\Models\Pqr;
use App\Models\PuntosAuditoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Intervention\Image\Facades\Image;
use Validator;


class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->role;
        $today = Carbon::now();
        $today = Carbon::parse($today);
        $date = Carbon::today();
        $inicioMes = Carbon::now()->startOfMonth();
        $date = $date->toDateString();
        $usuario = Auth::user()->name;
        $puntos_auditoria = PuntosAuditoria::where('asignadoA', Auth::user()->name)
            ->whereNot('estatusGestion', 'Diligenciado')
            ->whereNot('estatusGestion', 'gestionado - no concretado')
            ->where('fechaAsignado', $date)
            ->get();
        $asignados = PuntosAuditoria::whereDate('fechaAsignado', $today)
            ->where('estatusGestion', 'Asignado')
            ->where('asignadoA', $usuario)
            ->get()
            ->count();
        $asignadosNoGestionado = PuntosAuditoria::whereDate('fechaAsignado', '<>',  $today)
            ->where('estatusGestion', 'Asignado')
            ->where('asignadoA', $usuario)
            ->get()
            ->count();
        $finalizados = Auditoria::where(
            'criticidad',
            'Pendiente Calidad'
        )
            ->where('promotor', $usuario)
            ->whereRaw('month(star) = month(now())')
            ->get()->count();
        $finalizadosHoy = Auditoria::whereDate('created_at', $today)
            ->where(
                'criticidad',
                'Pendiente Calidad'
            )
            ->where('promotor', $usuario)
            ->get()->count();
        $calidadOk = Auditoria::where('criticidad', 'sin errores')
            ->whereRaw('month(star) = month(now())')
            ->where('promotor', $usuario)
            ->get()->count();
        $calidadFondo = Auditoria::where('criticidad', 'error critico de fondo')
            ->whereRaw('month(star) = month(now())')
            ->where('promotor', $usuario)
            ->get()->count();
        $calidadForma = Auditoria::where('criticidad', 'error critico de forma')
            ->whereRaw('month(star) = month(now())')
            ->where('promotor', $usuario)
            ->get()->count();
        $calidadAmbos = Auditoria::where('criticidad', 'errores criticos de fondo y forma')
            ->whereRaw('month(star) = month(now())')
            ->where('promotor', $usuario)
            ->get()->count();
        $pendienteCierre = Auditoria::where('criticidad', 'paso 1 - activacion')
            ->orWhere('criticidad', 'paso 2 - tipologia')
            ->orWhere('criticidad', 'paso 3 - segmento')
            ->orWhere('criticidad', 'paso 4 - materiales')
            ->orWhere('criticidad', 'paso 5 - disponibilidad')
            ->orWhere('criticidad', 'paso 6 - comparativo')
            ->orWhere('criticidad', 'paso 7 - Exhibicion')
            ->orWhere('criticidad', 'paso 8 - gift')
            ->get()->count();
        // }

        // $puntos_auditoria = PuntosAuditoria::where('asignadoA', Auth::user()->name)
        //      ->whereNot('estatusGestion', 'Diligenciado')
        //     ->whereNot('estatusGestion', 'gestionado - no concretado')
        //     ->where('fechaAsignado', $date)
        //     ->get();
        return view(
            'auditoria.index',
            compact(
                'puntos_auditoria',
                'asignados',
                'finalizadosHoy',
                'finalizados',
                'calidadFondo',
                'calidadForma',
                'calidadAmbos',
                'pendienteCierre',
                'asignadosNoGestionado'
            )
        );
    }

    public function indexVisitor()
    {

        $todos = Auditoria::where('criticidad', 'sin errores')->where('created_at', '>=', '2023-12-01')->get();

        $gold = Auditoria::where('criticidad', 'sin errores')->where('segmento', 'Gold')->where('created_at', '>=', '2023-12-01')->get();
        $silver = Auditoria::where('criticidad', 'sin errores')->where('segmento', 'Silver')->where('created_at', '>=', '2023-12-01')->get();
        $bronce = Auditoria::where('criticidad', 'sin errores')->where('segmento', 'Bronce')->where('created_at', '>=', '2023-12-01')->get();

        $bar = Auditoria::where('criticidad', 'sin errores')->where('tipologia', 'Bar estándar')->where('created_at', '>=', '2023-12-01')->get();
        $tienda = Auditoria::where('criticidad', 'sin errores')->where('tipologia', 'Tienda de consumo')->where('created_at', '>=', '2023-12-01')->get();
        $lico = Auditoria::where('criticidad', 'sin errores')->where('tipologia', 'Licobares')->where('created_at', '>=', '2023-12-01')->get();
        $juegos = Auditoria::where('criticidad', 'sin errores')->where('tipologia', 'Juegos típicos')->where('created_at', '>=', '2023-12-01')->get();
        $otro = Auditoria::where('criticidad', 'sin errores')->where('tipologia', 'otro')->where('created_at', '>=', '2023-12-01')->get();
        $area = [
            'Calidad' => 'Calidad',
            'Operativa' => 'Operativa',
            'Desarrollo' => 'Desarrollo',
            'Administrativa' => 'Administrativa',
            'Estadistica' => 'Estadistica'
        ];


        return view('auditoria.IndexVisitor', compact('todos', 'gold', 'silver', 'bronce', 'bar', 'tienda', 'lico', 'juegos', 'otro', 'area'));
    }


    public function storeVisitor(Request $request)
    {
        if (Pqr::latest('id')->first() == null) {
            $ultimoId = 1;
        } else {
            $ultimoId = Pqr::latest('id')->first()->id + 1;
        }
        $validator = Validator::make(
            $request->all(),
            [
                'area' => 'required',
                'tituloReq' => 'required',
                'detalle' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $datosReporte = request()->except('_token');
            if ($request->hasFile('evidenciapqr')) {
                $imagen = $request->file('evidenciapqr');
                $nombre = "_" . $ultimoId . '.' . 'png';
                $destino = public_path('PQR');
                $request->evidenciapqr->move($destino, $nombre);
                $red = Image::make($destino . '/' . $nombre);
                $red->resize(
                    380,
                    null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    }
                );
                $red->text(
                    $request->id . " " .
                        $request->area . " " .
                        $request->tituloReq . " " .
                        $request->detalle . " ",

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
            $pqr = new Pqr();
            $pqr->area = $request->area;
            $pqr->creado_por = Auth::user()->name;
            $pqr->femsa_id = $request->femsa_id;
            $pqr->tituloReq = $request->tituloReq;
            $pqr->detalle = $request->detalle;
            $pqr->observaciones = $request->observaciones;
            $pqr->estatusRespuesta = "Caso creado";
            if ($request->hasFile('evidenciapqr')) {
                $pqr->evidenciapqr = "evidenciaPqr/PQR" . $nombre;
            } else {
                $pqr->evidenciapqr = "no registra evidencia";
            }
            $pqr->save();
            return redirect('indexVisitor')->with("caso creado exitosamene");
        }
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
            'Ron viejo de caldas' => 'Ron viejo de caldas',
            'Ron Medellín añejo 3 años' => 'Ron Medellín añejo 3 años',
            'Ron Santa Fe' => 'Ron Santa Fe',
            'Ron Marquez' => 'Ron Marquez',
            'Ron Barcardi' => 'Ron Barcardi',
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

        if ($request->precarga_id % 2 === 0) {
            $calidad = "MARIA ALEJANDRA LEMUS CASTIBLANCO";
        } else {
            $calidad = "FLORALBA RINCON ROMERO";
        }

        $validator = FacadesValidator::make(
            $request->all(),
            [
                'precarga_id' => 'unique:auditorias',
            ],
            $messages =
                [
                    'unique' => 'el registro con el id :' .  $request->precarga_id . ', ya se guardo con anterioridad',
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
                $activacion->criticidad = 'paso 1 - activacion';
                $activacion->save();
                $id =  $request->precarga_id;
                $concretado = PuntosAuditoria::findOrFail($id);
                $concretado->estatusGestion = 'paso 1 - activacion';
                $concretado->save();
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
                $activacion->revisionCalidad =  $calidad;
                $activacion->criticidad =  'Pendiente Calidad';
                $activacion->save();
                $fechaFinalizado = Carbon::now();
                $id = $request->precarga_id;
                $concretado = PuntosAuditoria::where('id', $id)->get();
                //dd($concretado);
                $estatusGestion = 'gestionado - no concretado';
                $mergeData = [
                    'estatusGestion' => $estatusGestion,
                    'fechaFinalizado' => $fechaFinalizado,
                ];
                PuntosAuditoria::where('id', '=', $id)->update($mergeData);
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
            'PDV cerrado segunda visita' => 'PDV cerrado segunda visita',
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
            'Ron viejo de caldas' => 'Ron viejo de caldas',
            'Ron Medellín añejo 3 años' => 'Ron Medellín añejo 3 años',
            'Ron Santa Fe' => 'Ron Santa Fe',
            'Ron Marquez' => 'Ron Marquez',
            'Ron Barcardi' => 'Ron Barcardi',
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

    public function notificacionStore(Request $request, $id)
    {

        $id = $request->id;
        $pqr = request()->except(['_token', '_method']);
        // dd($pqr);
        Pqr::where('id', '=', $id)->update($pqr);
        return back();
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
