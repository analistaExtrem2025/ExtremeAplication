<?php

namespace App\Http\Controllers;

use App\Models\calidadAuditoria;
use Illuminate\Http\Request;
use App\Models\Auditoria;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalidadAuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::Where('star', '>=', '2000-01-01 00:00:00')
            //$auditoria = Auditoria::Where('star', '>=', '2023-11-15 00:00:00')
        //    ->where('revisadoPor', Auth::user()->name)
            //    ->where('criticidad', null)
            ->get();
        return view('auditoria.galeriaIndex', compact('auditoria'));
    }


    public function inactivos()Ñ
    {


        $user = User::select('name')->where('name', 'Fernando Alexander Carillo Leon')->get();
        $user2 = User::select('name')->where('name', 'MAIDA MARCELA ROJAS PIRAGAUTA')->get();
        if (Auth::user()->name == 'Fernando Alexander Carillo Leon' ||  Auth::user()->name == 'MAIDA MARCELA ROJAS PIRAGAUTA') {
            $puntos_auditoria = Auditoria::Where('star', '>=', '2000-01-01 00:00:00')
                //$auditoria = Auditoria::Where('star', '>=', '2023-11-15 00:00:00')
                //->where('activacion' 'inactivos')
                ->get();
            return view('auditoria.inactivos', compact('puntos_auditoria'));
        } else {
            return response()->json([
                'Mensaje' => 'Pagina no autorizada.'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $now = Carbon::now();


        $this->validate(

            $request,
            [
                'activacion' => ['required'],
                'auditadoPor' =>  ['required'],
                'segmento' => [($request->activacionState == 'activo' ? 'required' : 'nullable')],
                'cantidadCajas' => [($request->activacionState == 'activo' ? 'required' : 'nullable')],
                'tipologia' => [($request->activacionState == 'activo' ? 'required' : 'nullable')],
                'CenefaVisi' => [($request->stateCenefa  == 'cenefa_si' ? 'required' : 'nullable')],
                'CenefaColo' => [($request->stateCenefa  == 'cenefa_si' ? 'required' : 'nullable')],
                'aficheVis' => [($request->stateAfiche  == 'afiche_si' ? 'required' : 'nullable')],
                'aficheColo' => [($request->stateAfiche  == 'afiche_si' ? 'required' : 'nullable')],
                'aficheCombo'  => [($request->aficheCombo  == 'afiche_combo_si' ? 'required' : 'nullable')],
                'marcoVisi' => [($request->stateMarco  == 'marco_si' ? 'required' : 'nullable')],
                'marcoColo' => [($request->stateMarco  == 'marco_si' ? 'required' : 'nullable')],
                'rompeVisi' => [($request->stateRompetrafico  == 'rompetraficos_si' ? 'required' : 'nullable')],
                'rompeColo' => [($request->stateRompetrafico  == 'rompetraficos_si' ? 'required' : 'nullable')],
                'faxadaVisi' => [($request->statefachadas  == 'rompetraficos_si' ? 'required' : 'nullable')],
                'faxadaEstado' => [($request->statefachadas  == 'rompetraficos_si' ? 'required' : 'nullable')],
                'hieleraProd' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                'hieleraVisi' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                'hieleraEstado' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                'basesHieProd' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                'basesHieVisi' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                'basesHieEstado' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                'dosiDVisi' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                'dosiDProd' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                'dosiDEstado' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                'dosiSVisi' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                'dosiSProd' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                'dosiSEstado' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                'brandingVisi' => [($request->stateBranding == 'branding_si' ? 'required' : 'nullable')],
                'brandingEstado' => [($request->stateBranding == 'branding_si' ? 'required' : 'nullable')],
                'vasosVisi' => [($request->vasos == 'vasos_si' ? 'required' : 'nullable')],
                'vasosEstado' => [($request->vasos == 'vasos_si' ? 'required' : 'nullable')],
                'calMarcVisi' => [($request->cal_marc_visible != null ? 'required' : 'nullable')],
                'calMarcEstado' => [($request->cal_marc_danados != null ? 'required' : 'nullable')],
                'calMarcEtiqueta' => [($request->cal_marc_et_danados != null ? 'required' : 'nullable')],
                'RonBlack' => [($request->ron_byw != null ? 'required' : 'nullable')],
                'ronVsJhonnie' => [($request->ron_jhonny != null ? 'required' : 'nullable')],
                'aguVsSmirnoff' => [($request->aguard_smirnoff != null ? 'required' : 'nullable')],
                'gift' => [($request->gift != null ? 'required' : 'nullable')],
                'observacionesCalidad' => ['nullable']
            ],
        );

        $comentario = [
            "activacion" => $request->activacion,
            "segmento" => $request->segmento,
            "cantidadCajas" => $request->cantidadCajas,
            "tipologia" => $request->tipologia,
            "CenefaVisi" => $request->CenefaVisi,
            "CenefaColo" => $request->CenefaColo,
            "aficheVis" => $request->aficheVis,
            "aficheColo" => $request->aficheColo,
            "aficheCombo" => $request->aficheCombo,
            "marcoVisi" => $request->marcoVisi,
            "marcoColo" => $request->marcoColo,
            "rompeVisi" => $request->rompeVisi,
            "rompeColo" => $request->rompeColo,
            "faxadaVisi" => $request->faxadaVisi,
            "faxadaEstado" => $request->faxadaEstado,
            "hieleraProd" => $request->hieleraProd,
            "hieleraVisi" => $request->hieleraVisi,
            "hieleraEstado" => $request->hieleraEstado,
            "basesHieProd" => $request->basesHieProd,
            "basesHieVisi" => $request->basesHieVisi,
            "basesHieEstado" => $request->basesHieEstado,
            "dosiDVisi" => $request->dosiDVisi,
            "dosiDProd" => $request->dosiDProd,
            "dosiDEstado" => $request->dosiDEstado,
            "dosiSVisi" => $request->dosiSVisi,
            "dosiSProd" => $request->dosiSProd,
            "dosiSEstado" => $request->dosiSEstado,
            "brandingVisi" => $request->brandingVisi,
            "brandingEstado" => $request->brandingEstado,
            "vasosVisi" => $request->vasosVisi,
            "vasosEstado" => $request->vasosEstado,
            "calMarcVisi" => $request->calMarcVisi,
            "calMarcEstado" => $request->calMarcEstado,
            "calMarcEtiqueta" => $request->calMarcEtiqueta,
            "RonBlack" => $request->RonBlack,
            "ronVsJhonnie" => $request->ronVsJhonnie,
            "aguVsSmirnoff" => $request->aguVsSmirnoff,
            "gif" => $request->gif,

        ];
        $revisadoPor = Auth::user()->name;
        $promotor = $request->auditadoPor;
        $criticidad = $request->criticidad;
        calidadAuditoria::create(
            $request->merge(
                [
                    'auditadoPor' => $promotor,
                    'comentarios' => $comentario = implode(' ', $comentario),
                    'fechaRevision' => $now,
                    'revisadoPor' => $revisadoPor,
                    'estadoCalidad' => 'revisado',
                    'criticidad' => $criticidad,
                    'observacionesCalidad' => $request->observacionesCalidad,
                ]
            )->all()
        );
        $auditoria = Auditoria::where('id', $request->auditoria_id);
        $auditoria->update(
            [
                'revisionCalidad' =>  $request->observacionesCalidad,
                'fechaCalidad' => $now,
                'criticidad' => $criticidad
            ]
        );
        return redirect('/Galeria')->with('info', 'El punto se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reporte = Auditoria::findOrFail($id);
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
        $cenefa_visi = [
            'cenefa_visi_si' => 'cenefa visible si',
            'cenefa_visi_no' => 'cenefa visible no',
        ];
        $cenefa_colo = [
            'cenefa_colo_si' => 'cenefa colocada si',
            'cenefa_colo_no' => 'cenefa colocada no',
        ];
        $afiche_visi = [
            'afiche_visi_si' => 'afiche visible si',
            'afiche_visi_no' => 'afiche visible no',
        ];
        $aficheColo = [
            'afiche_colo_si' => 'afiche colocada si',
            'afiche_colo_no' => 'afiche colocada no',
        ];
        $aficheCombotizado = [
            'afiche_combo_si' => 'Afiche combotizado si',
            'afiche_combo_no' => 'Afiche combotizado no',
        ];
        $Combox1 = [
            'combox1_si' => 'Diageo + otro producto si',
            'combox1_no' => 'Diageo + otro producto no',
        ];
        $Combox2 = [
            'combox2_si' => 'Diageo + otro producto si',
            'combox2_no' => 'Diageo + otro producto no',
        ];
        $Combox3 = [
            'combox3_si' => 'Diageo + gift si',
            'combox3_no' => 'Diageo + gift no',
        ];
        $marca_combo = [
            "Black & White" => "Black & White",
            "Smirnoff x 1" => "Smirnoff x 1",
            "Jhonnie Walker" => "Jhonnie Walker",
            "Buchanna's" => "Buchanna's",
            "Old Parr" => "Old Parr",
            "Multimarca" => "Multimarca",
        ];
        $marco_visi = [
            'marco_visi_si' => 'marco visible si',
            'marco_visi_no' => 'marco visible no',
        ];
        $marco_colo = [
            'marco_colo_si' => 'marco colocada si',
            'marco_colo_no' => 'marco colocada no',
        ];
        $rompe_visi = [
            'prod_rt_visibles_si' => 'rompetraficos visible si',
            'prod_rt_visibles_no' => 'rompetraficos visible no',
        ];
        $rompe_colo = [
            'prod_rt_properly_si' => 'rompetraficos colocado si',
            'prod_rt_properly_no' => 'rompetraficos colocado no',
        ];
        $fachadas_visi = [
            'fachadas_visi_si' => 'fachadas y avisos visibles si',
            'fachadas_visi_no' => 'fachadas y avisos visibles no',
        ];
        $fachadas_colo = [
            'fachadas_colo_si' => 'fachadas y avisos colocados si',
            'fachadas_colo_no' => 'fachadas y avisos colocados no',
        ];
        $hielera_prod = [
            'hl_con_prod_si' => 'hielera con producto si',
            'hl_con_prod_no' => 'hielera con producto no',
        ];
        $hielera_visi = [
            'prod_hl_visible_si' => 'hielera visible si',
            'prod_hl_visible_no' => 'hielera visible no',
        ];
        $hielera_esta = [
            'prod_hl_danadas_si' => 'hielera en buen estado si',
            'prod_hl_danadas_no' => 'hielera en buen estado no',
        ];
        $baseshl_con_prod = [
            'baseshl_con_prod_si' => 'bases de hielera con producto si',
            'baseshl_con_prod_no' => 'bases de hielera con producto no',
        ];
        $prod_baseshl_visible = [
            'prod_baseshl_visible_si' => 'bases de hielera visible si',
            'prod_baseshl_visible_no' => 'bases de hielera visible no',
        ];
        $prod_baseshl_danadas = [
            'prod_baseshl_danadas_si' => 'bases de hielera en buen estado si',
            'prod_baseshl_danadas_no' => 'bases de hielera en buen estado no',
        ];
        $prod_dsD_visibles = [
            'prod_dsD_visibles_si' => 'dosificador doble visible si',
            'prod_dsD_visibles_no' => 'dosificador doble visible no',
        ];
        $prod_dsD_diferentes = [
            'prod_dsD_diferentes_si' => 'dosificador doble con producto de la marca si',
            'prod_dsD_diferentes_no' => 'dosificador doble con producto de la marca no',
        ];
        $prod_dsD_danados = [
            'prod_dsD_danados_si' => 'dosificador doble en buen estado si',
            'prod_dsD_danados_no' => 'dosificador doble en buen estado no',
        ];

        $prod_dsS_visibles = [
            'prod_dsS_visibles_si' => 'dosificador sencillo visible si',
            'prod_dsS_visibles_no' => 'dosificador sencillo visible no',
        ];
        $prod_dsS_diferentes = [
            'prod_dsS_diferentes_si' => 'dosificador sencillo con producto de la marca si',
            'prod_dsS_diferentes_no' => 'dosificador sencillo con producto de la marca no',
        ];
        $prod_dsS_danados = [
            'prod_dsS_danados_si' => 'dosificador sencillo en buen estado si',
            'prod_dsS_danados_no' => 'dosificador sencillo en buen estado no',
        ];
        $branding_visible = [
            'branding_visible_si' => 'branding visible si',
            'branding_visible_no' => 'branding visible no',
        ];
        $branding_danados = [
            'branding_danados_si' => 'branding en buen estado si',
            'branding_danados_no' => 'branding en buen estado no',
        ];
        $vasos_visibles = [
            'vasos_visibles_si' => 'vasos y copas visibles si',
            'vasos_visibles_no' => 'vasos y copas visibles no',
        ];
        $vasos_quebrados = [
            'vasos_quebrados_si' => 'vasos y copas en buen estado si',
            'vasos_quebrados_no' => 'vasos y copas en buen estado no',
        ];
        $cal_marc_visible = [
            'cal_marc_visible_si' => 'visibilidad general de la marca si',
            'cal_marc_visible_no' => 'visibilidad general de la marca no',
        ];
        $cal_marc_danados = [
            'cal_marc_danados_si' => 'estado optimo de la marca si',
            'cal_marc_danados_no' => 'estado optimo de la marca no',
        ];
        $cal_marc_et_danados = [
            'cal_marc_et_danados_si' => 'estado de las etiquetas de la marca si',
            'cal_marc_et_danados_no' => 'estado de las etiquetas de la marca no',
        ];

        $calificacion = [1 => "si", 0 => 'no'];
        //dd($reporte);
        return view('auditoria.galeriaEdit', compact(
            'reporte',
            'calificacion',
            'tipologia',
            'segmento',
            'cenefa_visi',
            'cenefa_colo',
            'afiche_visi',
            'aficheColo',
            'aficheCombotizado',
            'Combox1',
            'Combox2',
            'Combox3',
            'marca_combo',
            'marco_visi',
            'marco_colo',
            'rompe_visi',
            'rompe_colo',
            'fachadas_visi',
            'fachadas_colo',
            'hielera_prod',
            'hielera_visi',
            'hielera_esta',
            'baseshl_con_prod',
            'prod_baseshl_visible',
            'prod_baseshl_danadas',
            'prod_dsD_visibles',
            'prod_dsD_diferentes',
            'prod_dsD_danados',
            'prod_dsS_visibles',
            'prod_dsS_diferentes',
            'prod_dsS_danados',
            'branding_visible',
            'branding_danados',
            'vasos_quebrados',
            'vasos_visibles',
            'cal_marc_visible',
            'cal_marc_danados',
            'cal_marc_et_danados',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(calidadAuditoria $calidadAuditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $calidadAuditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();

        //dd($request->all());
        $now = Carbon::now();


        $this->validate(

            $request,
            [
                // 'activacion' => ['required'],
                // 'auditadoPor' =>  ['required'],
                // 'Calsegmento' => [($request->activacionState == 'activo' ? 'required' : 'nullable')],
                // 'Caltipologia' => [($request->activacionState == 'activo' ? 'required' : 'nullable')],
                // 'CenefaVisi' => [($request->stateCenefa  == 'cenefa_si' ? 'required' : 'nullable')],
                // 'CenefaColo' => [($request->stateCenefa  == 'cenefa_si' ? 'required' : 'nullable')],
                // 'aficheVis' => [($request->stateAfiche  == 'afiche_si' ? 'required' : 'nullable')],
                // 'aficheColo' => [($request->stateAfiche  == 'afiche_si' ? 'required' : 'nullable')],
                // 'aficheCombo'  => [($request->aficheCombo  == 'afiche_combo_si' ? 'required' : 'nullable')],
                // 'marcoVisi' => [($request->stateMarco  == 'marco_si' ? 'required' : 'nullable')],
                // 'marcoColo' => [($request->stateMarco  == 'marco_si' ? 'required' : 'nullable')],
                // 'rompeVisi' => [($request->stateRompetrafico  == 'rompetraficos_si' ? 'required' : 'nullable')],
                // 'rompeColo' => [($request->stateRompetrafico  == 'rompetraficos_si' ? 'required' : 'nullable')],
                // 'faxadaVisi' => [($request->statefachadas  == 'rompetraficos_si' ? 'required' : 'nullable')],
                // 'faxadaEstado' => [($request->statefachadas  == 'rompetraficos_si' ? 'required' : 'nullable')],
                // 'hieleraProd' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                // 'hieleraVisi' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                // 'hieleraEstado' => [($request->stateHielera  == 'hielera_si' ? 'required' : 'nullable')],
                // 'basesHieProd' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                // 'basesHieVisi' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                // 'basesHieEstado' => [($request->stateBaseHielera == 'bases_h_si' ? 'required' : 'nullable')],
                // 'dosiDVisi' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                // 'dosiDProd' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                // 'dosiDEstado' => [($request->stateDosificadorD == 'dosificadorD_si' ? 'required' : 'nullable')],
                // 'dosiSVisi' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                // 'dosiSProd' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                // 'dosiSEstado' => [($request->stateDosificadorS == 'dosificadorS_si' ? 'required' : 'nullable')],
                // 'brandingVisi' => [($request->stateBranding == 'branding_si' ? 'required' : 'nullable')],
                // 'brandingEstado' => [($request->stateBranding == 'branding_si' ? 'required' : 'nullable')],
                // 'vasosVisi' => [($request->vasos == 'vasos_si' ? 'required' : 'nullable')],
                // 'vasosEstado' => [($request->vasos == 'vasos_si' ? 'required' : 'nullable')],
                // 'calMarcVisi' => [($request->cal_marc_visible != null ? 'required' : 'nullable')],
                // 'calMarcEstado' => [($request->cal_marc_danados != null ? 'required' : 'nullable')],
                // 'calMarcEtiqueta' => [($request->cal_marc_et_danados != null ? 'required' : 'nullable')],
                // 'RonBlack' => [($request->ron_byw != null ? 'required' : 'nullable')],
                // 'ronVsJhonnie' => [($request->ron_jhonny != null ? 'required' : 'nullable')],
                // 'aguVsSmirnoff' => [($request->aguard_smirnoff != null ? 'required' : 'nullable')],
                // 'gift' => [($request->gift != null ? 'required' : 'nullable')],
                // 'observacionesCalidad' => ['nullable']
            ],
        );

        $comentario = [
            "activacion" => $request->activacion,
            "Calsegmento" => $request->Calsegmento,
            "cantidadCajas" => $request->cantidadCajas,
            "Caltipologia" => $request->Caltipologia,
            "CenefaVisi" => $request->CalCenefaVisi,
            "CenefaColo" => $request->CalCenefaColo,
            "aficheVis" => $request->CalaficheVis,
            "aficheColo" => $request->CalaficheColo,
            "aficheCombo" => $request->CalaficheCombo,
            "marcoVisi" => $request->CalmarcoVisi,
            "marcoColo" => $request->CalmarcoColo,
            "rompeVisi" => $request->rompeVisi,
            "rompeColo" => $request->CalrompeColo,
            "faxadaVisi" => $request->CalfaxadaVisi,
            "faxadaEstado" => $request->CalfaxadaEstado,
            "hieleraProd" => $request->CalhieleraProd,
            "hieleraVisi" => $request->CalhieleraVisi,
            "hieleraEstado" => $request->CalhieleraEstado,
            "basesHieProd" => $request->CalbasesHieProd,
            "basesHieVisi" => $request->CalbasesHieVisi,
            "basesHieEstado" => $request->CalbasesHieEstado,
            "dosiDVisi" => $request->CaldosiDVisi,
            "dosiDProd" => $request->CaldosiDProd,
            "dosiDEstado" => $request->CaldosiDEstado,
            "dosiSVisi" => $request->CaldosiSVisi,
            "dosiSProd" => $request->CaldosiSProd,
            "dosiSEstado" => $request->CaldosiSEstado,
            "brandingVisi" => $request->CalbrandingVisi,
            "brandingEstado" => $request->CalbrandingEstado,
            "vasosVisi" => $request->CalvasosVisi,
            "vasosEstado" => $request->CalasosEstado,
            "calMarcVisi" => $request->calMarcVisi,
            "calMarcEstado" => $request->calMarcEstado,
            "calMarcEtiqueta" => $request->calMarcEtiqueta,
            "RonBlack" => $request->RonBlack,
            "ronVsJhonnie" => $request->ronVsJhonnie,
            "aguVsSmirnoff" => $request->aguVsSmirnoff,
            "gif" => $request->gif,

        ];
        $revisadoPor = Auth::user()->name;
        $promotor = $request->auditadoPor;
        $criticidad = $request->criticidad;
        calidadAuditoria::create(
            $request->merge(
                [
                    'auditadoPor' => $promotor,
                    'comentarios' => $comentario = implode(' ', $comentario),
                    'fechaRevision' => $now,
                    'revisadoPor' => $revisadoPor,
                    'estadoCalidad' => 'revisado',
                    'criticidad' => $criticidad,
                    'observacionesCalidad' => $request->observacionesCalidad,
                ]
            )->all()
        );
        $auditoria = Auditoria::where('id', $request->auditoria_id);
        $auditoria->update(
            [

                "segmento" => $request->segmento,
                "caja_cerveza" => $request->caja_cerveza,
                "caja_aguardiente" => $request->aguardiente,
                "caja_ron" => $request->caja_ron,
                "caja_whiskey" => $request->caja_whiskey,
                "tipologia" => $request->tipologia,
                "cenefa_visi" => $request->cenefa_visi,
                "cenefa_colo" => $request->cenefa_colo,
                "afiche_visi" => $request->afiche_visi,
                "afiche_colo" => $request->afiche_colo,
                "aficheCombotizado" => $request->afiche_combo,
                "marca_combo" => $request->marca_combo,
                "combox1" => $request->combox1,
                "combox2" => $request->combox2,
                "combox3" => $request->combox3,
                "marco_visi" => $request->cenefa_visi,
                "marco_colo" => $request->cenefa_colo,
                "prod_rt_visibles" => $request->rompe_visi,
                "prod_rt_properly" => $request->rompe_colo,
                "fachadas_visi" => $request->fachadas_visi,
                "fachadas_colo" => $request->fachadas_colo,
                "hl_con_prod" => $request->hl_con_prod,
                "prod_hl_visible" => $request->prod_hl_visible,
                "prod_hl_danadas" => $request->prod_hl_danadas,
                "baseshl_con_prod" => $request->baseshl_con_prod,
                "prod_baseshl_visible" => $request->prod_baseshl_visible,
                "prod_baseshl_danadas" => $request->prod_baseshl_danadas,
                "prod_dsD_visibles" => $request->prod_dsD_visibles,
                "prod_dsD_diferentes" => $request->prod_dsD_diferentes,
                "prod_dsD_danados" => $request->prod_dsD_danados,
                "prod_dsS_visibles" => $request->prod_dsS_visibles,
                "prod_dsS_diferentes" => $request->prod_dsS_diferentes,
                "prod_dsS_danados" => $request->prod_dsS_danados,
                "branding_visible" => $request->branding_danados,
                "branding_danados" => $request->branding_danados,
                "vasos_visibles" => $request->vasos_visibles,
                "vasos_quebrados" => $request->vasos_quebrados,
                "cal_marc_visible" => $request->cal_marc_visible,
                "cal_marc_danados" => $request->cal_marc_danados,
                "cal_marc_et_danados" => $request->cal_marc_et_danados,

                // "ron_byw" => $request->RonBlack,
                // "ronVsJhonnie" => $request->ronVsJhonnie,
                // "aguVsSmirnoff" => $request->aguVsSmirnoff,
                // "gif" => $request->gif,
                "revisionPor" => Auth::user()->name,
                "revisionCalidad" =>  $request->observacionesCalidad,
                "fechaCalidad" => $now,
                "criticidad" => $criticidad,
            ]
        );
        return redirect('/Galeria')->with('info', 'El punto se ha registrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Auditoria::destroy($id);
        return back()->with('status_success', 'registro eliminado exitosamente');
    }
}
