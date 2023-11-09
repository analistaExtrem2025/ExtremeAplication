<?php

namespace App\Http\Controllers;

use App\Models\calidadAuditoria;
use Illuminate\Http\Request;
use App\Models\Auditoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CalidadAuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auditoria = Auditoria::Where('star', '>=', '2023-01-01 00:00:00')
            ->where('revisadoPor', Auth::user()->name)
            ->where('criticidad', null)
            ->get();

        //$auditoria = Auditoria::all();
        // dd($auditoria[0]);
        return view('auditoria.galeriaIndex', compact('auditoria'));
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
        $calificacion = [1 => "si", 0 => 'no'];
        //dd($reporte);
        return view('auditoria.galeriaEdit', compact('reporte', 'calificacion'));
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
    public function update(Request $request, calidadAuditoria $calidadAuditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calidadAuditoria $calidadAuditoria)
    {
        //
    }
}
