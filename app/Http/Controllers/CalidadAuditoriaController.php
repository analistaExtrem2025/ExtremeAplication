<?php

namespace App\Http\Controllers;

use App\Models\calidadAuditoria;
use Illuminate\Http\Request;
use App\Models\Auditoria;
use App\Models\AuditoriaEditable;
use App\Models\Materiales;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CalidadAuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::where('star', '>=', '2000-01-01 00:00:00')
            //$auditoria = Auditoria::Where('star', '>=', '2023-11-15 00:00:00')
            //    ->where('revisadoPor', Auth::user()->name)
            //   ->whereNull('revisionCalidad')
            ->get();
        return view('auditoria.galeriaIndex', compact('auditoria'));
    }


    public function inactivos()
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
        $validateAuditoria = [


            'cenefa_visi' => [($request->cenefa  == 'cenefa_si' ? 'required' : 'nullable')],
            'cenefa_colo' => [($request->cenefa  == 'cenefa_si' ? 'required' : 'nullable')],
            'seleccionCenefa' => [($request->cenefa  == 'cenefa_si' ? 'required' : 'nullable')],


        ];

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
        $star = $reporte->star;
        $tipologia = [
            'Bar estándar' => 'Bar estándar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos típicos' => 'Juegos típicos',
            'Otro' => 'Otro',
        ];

        $otros = [
            'Almacenes' => 'Almacenes',
            'Alquiler De Videos /Video Jueg' => 'Alquiler De Videos /Video Jueg',
            'Autoventa' => 'Autoventa',
            'Cafe/ Reposteria / Pasteleria' => 'Cafe/ Reposteria / Pasteleria',
            'Cafeteria De Colegio' => 'Cafeteria De Colegio',
            'Cafeteria/Restaurante' => 'Cafeteria/Restaurante',
            'Cafeterias/Heladerias' => 'Cafeterias/Heladerias',
            'Casas De Barrio/Ventanitas' => 'Casas De Barrio/Ventanitas',
            'Casino' => 'Casino',
            'Cinema/Teatro' => 'Cinema/Teatro',
            'Club' => 'Club',
            'Club Social Premium' => 'Club Social Premium',
            'Clubes Sociales' => 'Clubes Sociales',
            'Comidas Rapidas' => 'Comidas Rapidas',
            'Conjunto Residencial' => 'Conjunto Residencial',
            'Consultorio Independiente' => 'Consultorio Independiente',
            'Corporativo' => 'Corporativo',
            'Depositos/Distribuidoras' => 'Depositos/Distribuidoras',
            'Discoteca' => 'Discoteca',
            'Drogueria' => 'Drogueria',
            'Droguerias/Tiendas Naturistas' => 'Droguerias/Tiendas Naturistas',
            'Entidades Financieras' => 'Entidades Financieras',
            'Escuela/Colegio/Inst./Univer.' => 'Escuela/Colegio/Inst./Univer.',
            'Estaciones De Ser./Tienda Conv' => 'Estaciones De Ser./Tienda Conv',
            'Eventos' => 'Eventos',
            'Fabrica/Bodega' => 'Fabrica/Bodega',
            'Fabricas/Industrias' => 'Fabricas/Industrias',
            'Farmacias/Droguerias' => 'Farmacias/Droguerias',
            'Fruver' => 'Fruver',
            'Gimnasio/Centro Deportivo' => 'Gimnasio/Centro Deportivo',
            'Guarderia / Jardin / Preescola' => 'Guarderia / Jardin / Preescola',
            'Hipermercado' => 'Hipermercado',
            'Hotel' => 'Hotel',
            'Instit. Públicas' => 'Instit. Públicas',
            'Institucion Financiera' => 'Institucion Financiera',
            'Kioscos/Casetas/Chazas/Carreta' => 'Kioscos/Casetas/Chazas/Carreta',
            'Licorera' => 'Licorera',
            'Mayorista' => 'Mayorista',
            'Minimercados' => 'Minimercados',
            'Miscelanea' => 'Miscelanea',
            'Obra Civil' => 'Obra Civil',
            'Oficinas Mixtas' => 'Oficinas Mixtas',
            'Oficinas Particulares' => 'Oficinas Particulares',
            'Panaderia' => 'Panaderia',
            'Parque Diversines' => 'Parque Diversines',
            'Parroquias / Comunidades Relig' => 'Parroquias / Comunidades Relig',
            'Persona Natural' => 'Persona Natural',
            'Porterias' => 'Porterias',
            'Puestos De Revistas/Librerias' => 'Puestos De Revistas/Librerias',
            'Restaurante Estandar' => 'Restaurante Estandar',
            'Salsamentaria' => 'Salsamentaria',
            'Superetes' => 'Superetes',
            'Supermercado Independiente' => 'Supermercado Independiente',
            'Supermercado Regional' => 'Supermercado Regional',
            'Supermercados' => 'Supermercados',
            'Talleres Mecanicos/Lavaderos' => 'Talleres Mecanicos/Lavaderos',
            'Tienda Abarrotera' => 'Tienda Abarrotera',
            'Tienda Domicilios' => 'Tienda Domicilios',
            'Tienda Snackera' => 'Tienda Snackera',
            'Tiendas / Minimercados' => 'Tiendas / Minimercados',
            'Transportador' => 'Transportador',

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
        $competenciaRon = [
            'Viejo de caldas' => 'Viejo de caldas',
            'Medellín añejo 3 años' => 'Medellín añejo 3 años',
            'Santa Fe' => 'Santa Fe',
            'Otro' => 'Otro',
            'Ninguno' => 'Ninguno',
        ];
        $competenciaAguardiente = [
            'Amarillo 750 ml' => 'Amarillo 750 ml',
            'Antioqueño con azúcar' => 'Antioqueño con azúcar',
            'Antioqueño sin azúcar' => 'Antioqueño sin azúcar',
            'Antioqueño  24  grados verde' => 'Antioqueño  24  grados verde',
            'Néctar con azúcar' => 'Néctar con azúcar',
            'Néctar 24 grados verde' => 'Néctar 24 grados verde',
            'Blanco  del  valle con azúcar' => 'Blanco  del  valle con azúcar',
            'Blanco del valle sin azúcar' => 'Blanco del valle sin azúcar',
            'Blanco  24 grados nigth' => 'Blanco  24 grados nigth',
            'Otro' => 'Otro',
            'Ninguno' => 'Ninguno',
        ];

        $diageoMarca = [
            "Black & White" => "Black & White",
            "Smirnoff x 1" => "Smirnoff x 1",
            "Jhonnie Walker" => "Jhonnie Walker",
            "Buchanna's" => "Buchanna's",
            "Old Parr" => "Old Parr",
            "Multimarca" => "Multimarca",
        ];

        $seleccionLinealR = "auditorias_pics/Ron_".$reporte->precarga_id. ".png";
        $seleccionLinealA = "auditorias_pics/Aguardiente_".$reporte->precarga_id. ".png";

        $calificacion = [1 => "si", 0 => 'no'];
        //dd($reporte);
        return view('auditoria.galeriaEdit', compact(
            'star',
            'reporte',
            'calificacion',
            'tipologia',
            'segmento',
            'cenefa_visi',
            'cenefa_colo',
            'afiche_visi',
            'aficheColo',
            'aficheCombotizado',
            'diageoMarca',
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
            'competenciaRon',
            'competenciaAguardiente',
            'seleccionLinealR',
            'seleccionLinealA',
            'otros'

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

        $now = Carbon::now();
        $validate = $request->all();

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
        $auditoria = AuditoriaEditable::where('id', $request->id)->first();

        //  dd($auditoria);


        if ($request->hasFile('seleccionCenefa')) {

            $imagenCenefa = $request->file('seleccionCenefa');
            $nombreCenefa = "_" . $request->precarga_id . '.' . 'png';
            $destinoCenefa = public_path('auditorias_pics/Cenefa');
            $request->seleccionCenefa->move($destinoCenefa, $nombreCenefa);
            $redCenefa = Image::make($destinoCenefa . '/' . $nombreCenefa);
            $redCenefa->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redCenefa->text(
                'Cenefa' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redCenefa->save($destinoCenefa . $nombreCenefa);
            $auditoria->seleccionCenefa = 'auditorias_pics/Cenefa' .  $nombreCenefa;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionAfiche')) {
            $imagenAfiche = $request->file('seleccionAfiche');
            $nombreAfiche = "_" . $request->precarga_id . '.' . 'png';
            $destinoAfiche = public_path('auditorias_pics/Afiche');
            $request->seleccionAfiche->move($destinoAfiche, $nombreAfiche);
            $redAfiche = Image::make($destinoAfiche . '/' . $nombreAfiche);
            $redAfiche->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redAfiche->text(
                'Afiche' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redAfiche->save($destinoAfiche . $nombreAfiche);
            $auditoria->seleccionAfiche = 'auditorias_pics/Afiche' .  $nombreAfiche;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionMarco')) {
            $imagenMarco = $request->file('seleccionMarco');
            $nombreMarco = "_" . $request->precarga_id . '.' . 'png';
            $destinoMarco = public_path('auditorias_pics/Marco');
            $request->seleccionMarco->move($destinoMarco, $nombreMarco);
            $redMarco = Image::make($destinoMarco . '/' . $nombreMarco);
            $redMarco->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redMarco->text(
                'Marco' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redMarco->save($destinoMarco . $nombreMarco);
            $auditoria->seleccionMarco = 'auditorias_pics/Marco' .  $nombreMarco;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionRompetrafico') ) {

            $imagenRompetrafico = $request->file('seleccionRompetrafico');
            $nombreRompetrafico = "_" . $request->precarga_id . '.' . 'png';
            $destinoRompetrafico = public_path('auditorias_pics/Rompetrafico');
            $request->seleccionRompetrafico->move($destinoRompetrafico, $nombreRompetrafico);
            $redRompetrafico = Image::make($destinoRompetrafico . '/' . $nombreRompetrafico);
            $redRompetrafico->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redRompetrafico->text(
                'Rompetrafico' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $auditoria->seleccionRompetrafico = 'auditorias_pics/Rompetrafico' .  $nombreRompetrafico;
            $redRompetrafico->save($destinoRompetrafico . $nombreRompetrafico);

            $auditoria->save();
        }
        if ($request->hasFile('seleccionFaxada')) {
            $imagenFaxada = $request->file('seleccionFaxada');
            $nombreFaxada = "_" . $request->precarga_id . '.' . 'png';
            $destinoFaxada = public_path('auditorias_pics/Faxada');
            $request->seleccionFaxada->move($destinoFaxada, $nombreFaxada);
            $redFaxada = Image::make($destinoFaxada . '/' . $nombreFaxada);
            $redFaxada->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redFaxada->text(
                'Faxada' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redFaxada->save($destinoFaxada . $nombreFaxada);
            $auditoria->seleccionFaxada = 'auditorias_pics/Faxada' .  $nombreFaxada;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionHielera')) {
            $imagenHielera = $request->file('seleccionHielera');
            $nombreHielera = "_" . $request->precarga_id . '.' . 'png';
            $destinoHielera = public_path('auditorias_pics/Hielera');
            $request->seleccionHielera->move($destinoHielera, $nombreHielera);
            $redHielera = Image::make($destinoHielera . '/' . $nombreHielera);
            $redHielera->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redHielera->text(
                'Hielera' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redHielera->save($destinoHielera . $nombreHielera);
            $auditoria->seleccionHielera = 'auditorias_pics/Hielera' .  $nombreHielera;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionBase_h')) {
            $imagenBase_h = $request->file('seleccionBase_h');
            $nombreBase_h = "_" . $request->precarga_id . '.' . 'png';
            $destinoBase_h = public_path('auditorias_pics/Base_h');
            $request->seleccionBase_h->move($destinoBase_h, $nombreBase_h);
            $redBase_h = Image::make($destinoBase_h . '/' . $nombreBase_h);
            $redBase_h->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redBase_h->text(
                'Base hielera' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redBase_h->save($destinoBase_h . $nombreBase_h);
            $auditoria->seleccionBase_h = 'auditorias_pics/Base_h' .  $nombreBase_h;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionDosificadorD')) {
            $imagenDosificadorD = $request->file('seleccionDosificadorD');
            $nombreDosificadorD = "_" . $request->precarga_id . '.' . 'png';
            $destinoDosificadorD = public_path('auditorias_pics/DosificadorD');
            $request->seleccionDosificadorD->move($destinoDosificadorD, $nombreDosificadorD);
            $redDosificadorD = Image::make($destinoDosificadorD . '/' . $nombreDosificadorD);
            $redDosificadorD->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redDosificadorD->text(
                'Dosificador doble' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redDosificadorD->save($destinoDosificadorD . $nombreDosificadorD);
            $auditoria->seleccionDosificadorD = 'auditorias_pics/DosificadorD' .  $nombreDosificadorD;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionDosificadorS')) {
            $imagenDosificadorS = $request->file('seleccionDosificadorS');
            $nombreDosificadorS = "_" . $request->precarga_id . '.' . 'png';
            $destinoDosificadorS = public_path('auditorias_pics/DosificadorS');
            $request->seleccionDosificadorS->move($destinoDosificadorS, $nombreDosificadorS);
            $redDosificadorS = Image::make($destinoDosificadorS . '/' . $nombreDosificadorS);
            $redDosificadorS->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redDosificadorS->text(
                'Dosificador sencillo' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redDosificadorS->save($destinoDosificadorS . $nombreDosificadorS);
            $auditoria->seleccionDosificadorS = 'auditorias_pics/DosificadorS' .  $nombreDosificadorS;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionBranding')) {
            $imagenBranding = $request->file('seleccionBranding');
            $nombreBranding = "_" . $request->precarga_id . '.' . 'png';
            $destinoBranding = public_path('auditorias_pics/Branding');
            $request->seleccionBranding->move($destinoBranding, $nombreBranding);
            $redBranding = Image::make($destinoBranding . '/' . $nombreBranding);
            $redBranding->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redBranding->text(
                'Branding' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redBranding->save($destinoBranding . $nombreBranding);
            $auditoria->seleccionBranding = 'auditorias_pics/Branding' .  $nombreBranding;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionVasos')) {
            $imagenVasos = $request->file('seleccionVasos');
            $nombreVasos = "_" . $request->precarga_id . '.' . 'png';
            $destinoVasos = public_path('auditorias_pics/Vasos');
            $request->seleccionVasos->move($destinoVasos, $nombreVasos);
            $redVasos = Image::make($destinoVasos . '/' . $nombreVasos);
            $redVasos->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redVasos->text(
                'Vasos' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redVasos->save($destinoVasos . $nombreVasos);
            $auditoria->seleccionVasos = 'auditorias_pics/Vasos' .  $nombreVasos;
            $auditoria->save();
        }
        if ($request->hasFile('seleccionLinealR')) {
            $imagenRon = $request->file('seleccionLinealR');
            $nombreRon = "_" . $request->precarga_id . '.' . 'png';
            $destinoRon = public_path('auditorias_pics/Ron');
            $request->seleccionLinealR->move($destinoRon, $nombreRon);
            $redRon = Image::make($destinoRon . '/' . $nombreRon);
            $redRon->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redRon->text(
                'Compet Ron' . " ".
                    $auditoria->star. " ".
                    $auditoria->direccion. " ".
                    $auditoria->municipio. " ".
                    $auditoria->lat. " ".
                    $auditoria->lon,
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
            $redRon->save($destinoRon . $nombreRon);
            $auditoria->seleccionLinealR = 'auditorias_pics/Ron' .  $nombreRon;
            $auditoria->save();
        }
        if ($request->hasFile('fotoLinealA')) {
            $imagenAguardiente = $request->file('fotoLinealA');
            $nombreAguardiente = "_" . $request->precarga_id . '.' . 'png';
            $destinoAguardiente = public_path('auditorias_pics/Aguardiente');
            $request->fotoLinealA->move($destinoAguardiente, $nombreAguardiente);
            $redAguardiente = Image::make($destinoAguardiente . '/' . $nombreAguardiente);
            $redAguardiente->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redAguardiente->text(
                'Compet Aguardiente' . " ".
                    $auditoria->star. " ".
                    $auditoria->direccion. " ".
                    $auditoria->municipio. " ".
                    $auditoria->lat. " ".
                    $auditoria->lon,
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
            $redAguardiente->save($destinoAguardiente . $nombreAguardiente);
            $auditoria->save();
        }

        if ($request->hasFile('fotoron_byw')) {
            $imagenron_byw = $request->file('fotoron_byw');
            $nombreron_byw = "_" . $request->precarga_id . '.' . 'png';
            $destinoron_byw = public_path('auditorias_pics/ron_byw');
            $request->fotoron_byw->move($destinoron_byw, $nombreron_byw);
            $redron_byw = Image::make($destinoron_byw . '/' . $nombreron_byw);
            $redron_byw->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redron_byw->text(
                'Ron vs B&W' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redron_byw->save($destinoron_byw . $nombreron_byw);
            $auditoria->save();
        }


        if ($request->hasFile('fotoron_jhonny')) {

            $imagenron_jhonny = $request->file('fotoron_jhonny');
            $nombreron_jhonny = "_" . $request->precarga_id . '.' . 'png';
            $destinoron_jhonny = public_path('auditorias_pics/ron_jhonny');
            $request->fotoron_jhonny->move($destinoron_jhonny, $nombreron_jhonny);
            $redron_jhonny = Image::make($destinoron_jhonny . '/' . $nombreron_jhonny);
            $redron_jhonny->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redron_jhonny->text(
                'Ron vs Jhonnie' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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

            $redron_jhonny->save($destinoron_jhonny . $nombreron_jhonny);
            $auditoria->save();
        }





        if ($request->hasFile('fotoaguard_smirnoff')) {

            $imagenaguard_smirnoff = $request->file('fotoaguard_smirnoff');
            $nombreaguard_smirnoff = "_" . $request->precarga_id . '.' . 'png';
            $destinoaguard_smirnoff = public_path('auditorias_pics/aguard_smirnoff');
            $request->fotoaguard_smirnoff->move($destinoaguard_smirnoff, $nombreaguard_smirnoff);
            $redaguard_smirnoff = Image::make($destinoaguard_smirnoff . '/' . $nombreaguard_smirnoff);
            $redaguard_smirnoff->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redaguard_smirnoff->text(
                'Aguardiente vs Smirnoff' . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->lat . " " .
                    $auditoria->lon,
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
            $redaguard_smirnoff->save($destinoaguard_smirnoff . $nombreaguard_smirnoff);
            $auditoria->save();
        }

        $mergeData = [
            "revisadoPor" => Auth::user()->name,
            "fechaCalidad" => $now,
        ];
       //dd($request->all());


        $datosCalidad = request()->merge($mergeData)->except(
            [
                '_method',
                'activacion',
                'aficheCombo',
                'stateAfiche',
                'CalCenefaColo',
                'CalCenefaVisi',
                'stateCenefa',
                'comentarios',
                'observacionesCalidad',
                'estadoCalidad',
                'fechaRevision',
                'RonBlack',
                'cantidadCajas',
                '_token',
                'auditadoPor',
                'auditoria_id',
                'activacionState',
                'Calsegmento',
                'Caltipologia',
                'calMarcVisi',
                'calMarcEstado',
                'calMarcEtiqueta',
                'ResultadoSuma',
                'CalaficheVis',
                'CalaficheColo',
                'CalaficheCombo',
                'stateMarco',
                'CalmarcoVisi',
                'CalmarcoColo',
                'stateBaseHielera',
                'CalbasesHieProd',
                'CalbasesHieVisi',
                'CalbasesHieEstado',
                'stateDosificadorD',
                'CaldosiDVisi',
                'CaldosiDProd',
                'CaldosiDEstado',
                'rompeVisi',
                'rompeColo',
                'stateRompetrafico',
                'CalrompeColo',
                'stateFachadas',
                'CalfaxadaVisi',
                'CalfaxadaEstado',
                'stateHielera',
                'CalhieleraProd',
                'CalhieleraVisi',
                'CalhieleraEstado',
                'stateDosificadorS',
                'CaldosiSVisi',
                'CaldosiSProd',
                'CaldosiSEstado',
                'stateBranding',
                'CalbrandingVisi',
                'CalbrandingEstado',
                'stateVasos',
                'CalvasosVisi',
                'CalasosEstado',
                'fotoLinealA',
                'fotoron_byw',
                'fotoron_jhonny',
                'fotoaguard_smirnoff',
            ]
        );

       //dd($datosCalidad);
        AuditoriaEditable::where('precarga_id', '=', $id)->update($datosCalidad);
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
