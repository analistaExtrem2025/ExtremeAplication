<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Materiales;
use App\Models\PuntosAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $materiales = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.materiales', compact('materiales'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $puntos_auditoria = Materiales::findOrFail($id);
        $diageoMarca = [
            "Black & White" => "Black & White",
            "Smirnoff x 1" => "Smirnoff x 1",
            "Jhonnie Walker" => "Jhonnie Walker",
            "Buchanna's" => "Buchanna's",
            "Old Parr" => "Old Parr",
            "Multimarca" => "Multimarca",
        ];

        return view('auditoria.newMateriales', compact('puntos_auditoria', 'diageoMarca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        if ($request->hasFile('seleccionCenefa')) {

            $imagenCenefa = $request->file('seleccionCenefa');
            $nombreCenefa = "_" . $request->precarga_id . '.' . 'png';
            $destinoCenefa = public_path('auditorias_pics/Cenefa');
            $request->seleccionCenefa->move($destinoCenefa, $nombreCenefa);
            $auditoria->seleccionCenefa =  'auditorias_pics/Cenefa' . $nombreCenefa;
            $auditoria->save();
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
            $auditoria->seleccionCenefa = 'auditoria/Cenefa' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionCenefa = 'public\img\no_diponible.png';
            $auditoria->save();
        }

        if ($request->hasFile('seleccionAfiche')) {

            $imagenAfiche = $request->file('seleccionAfiche');
            $nombreAfiche = "_" . $request->precarga_id . '.' . 'png';
            $destinoAfiche = public_path('auditorias_pics/Afiche');
            $request->seleccionAfiche->move($destinoAfiche, $nombreAfiche);
            $auditoria->seleccionAfiche =  'auditorias_pics/Afiche' . $nombreAfiche;
            $auditoria->save();
            $redAfiche = Image::make($destinoAfiche . '/' . $nombreAfiche);
            $redAfiche->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redAfiche->text(
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
            $redAfiche->save($destinoAfiche . $nombreAfiche);
            $auditoria->seleccionAfiche = 'auditoria/Afiche' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionAfiche = 'public\img\no_diponible.png';
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
            $auditoria->seleccionMarco = 'auditoria/Marco' . $request->precarga_id . '.png';
            $auditoria->save();

        } else {
            $auditoria->seleccionMarco = 'public\img\no_diponible.png';
            $auditoria->save();
        }


        if ($request->hasFile('seleccionRompetrafico')) {
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
            $redRompetrafico->save($destinoRompetrafico . $nombreRompetrafico);
            $auditoria->seleccionRompetrafico = 'auditoria/Rompetrafico_' . $request->precarga_id . '.png';
            $auditoria->save();

        } else {
            $auditoria->seleccionRompetrafico = 'public\img\no_diponible.png';
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
            $auditoria->seleccionFaxada = 'auditoria/Faxada' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionFaxada = 'public\img\no_diponible.png';
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
            $auditoria->seleccionHielera = 'auditoria/Hielera' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionHielera = 'public\img\no_diponible.png';
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
            $auditoria->seleccionBase_h = 'auditoria/Base_h' . $request->precarga_id . '.png';
            $auditoria->save();


        } else {
            $auditoria->seleccionBase_h = 'public\img\no_diponible.png';
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
            $auditoria->seleccionDosificadorD = 'auditoria/DosificadorD' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionDosificadorD = 'public\img\no_diponible.png';
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
            $auditoria->seleccionDosificadorS = 'auditoria/DosificadorS_' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionDosificadorS = 'public\img\no_diponible.png';
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
            $auditoria->seleccionBranding = 'auditoria/Branding_' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionBranding = 'public\img\no_diponible.png';
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
            $auditoria->seleccionVasos = 'auditoria/Vasos_' . $request->precarga_id . '.png';
            $auditoria->save();
        } else {
            $auditoria->seleccionVasos = 'public\img\no_diponible.png';
            $auditoria->save();
        }

        $materiales = Materiales::findOrFail($id);

        $cenefaVyes = $request->cenefa == "cenefa_si" ? $request->cenefa_visi : "no aplica";
        $cenefaCyes = $request->cenefa == "cenefa_si" ? $request->cenefa_colo : "no aplica";
        $aficheVyes = $request->afiche == "afiche_si" ? $request->afiche_visi : "no aplica";
        $aficheCyes = $request->afiche == "afiche_si" ? $request->afiche_colo : "no aplica";
        $aficheCom = $request->afiche == "afiche_si" ? $request->aficheCombotizado : "no aplica";
        $aficheMarcyes = $request->aficheCombotizado == "afiche_combo_si" ? $request->marca_combo : "no aplica";
        $aficheCom1yes = $request->aficheCombotizado == "afiche_combo_si" ? $request->combox1 : "no aplica";
        $aficheCom2yes = $request->aficheCombotizado == "afiche_combo_si" ? $request->combox2 : "no aplica";
        $aficheCom3yes = $request->aficheCombotizado == "afiche_combo_si" ? $request->combox3 : "no aplica";
        $marcoVyes = $request->marco == "marco_si" ? $request->marco_visi : "no aplica";
        $marcoCyes = $request->marco == "marco_si" ? $request->marco_colo : "no aplica";
        $rompetraficoVyes = $request->rompetraficos == "rompetraficos_si" ? $request->prod_rt_visibles : "no aplica";
        $rompetraficoCyes = $request->rompetraficos == "rompetraficos_si" ? $request->prod_rt_properly : "no aplica";
        $fachadasVyes = $request->fachadas == "fachadas_si" ? $request->fachadas_visi : "no aplica";
        $fachadasCyes = $request->fachadas == "fachadas_si" ? $request->fachadas_colo : "no aplica";
        $hieleraVyes = $request->hielera == "hielera_si" ? $request->prod_hl_visible : "no aplica";
        $hieleraPyes = $request->hielera == "hielera_si" ? $request->hl_con_prod : "no aplica";
        $hieleraDyes = $request->hielera == "hielera_si" ? $request->prod_hl_danadas : "no aplica";
        $bhieleraVyes = $request->bases_h == "bases_h_si" ? $request->prod_baseshl_visible : "no aplica";
        $bhieleraPyes = $request->bases_h == "bases_h_si" ? $request->baseshl_con_prod : "no aplica";
        $bhieleraDyes = $request->bases_h == "bases_h_si" ? $request->prod_baseshl_danadas : "no aplica";
        $dosificadorDVyes = $request->dosificadorD == "dosificadorD_si" ? $request->prod_dsD_visibles : "no aplica";
        $dosificadorDPyes = $request->dosificadorD == "dosificadorD_si" ? $request->prod_dsD_diferentes : "no aplica";
        $dosificadorDDyes = $request->dosificadorD == "dosificadorD_si" ? $request->prod_dsD_danados : "no aplica";
        $dosificadorSVyes = $request->dosificadorS == "dosificadorS_si" ? $request->prod_dsS_visibles : "no aplica";
        $dosificadorSPyes = $request->dosificadorS == "dosificadorS_si" ? $request->prod_dsS_diferentes : "no aplica";
        $dosificadorSDyes = $request->dosificadorS == "dosificadorS_si" ? $request->prod_dsS_danados : "no aplica";
        $brandingVyes = $request->branding == "branding_si" ? $request->branding_visible : "no aplica";
        $brandingPyes = $request->branding == "branding_si" ? $request->branding_danados : "no aplica";
        $vasosVyes = $request->vasos == "vasos_si" ? $request->vasos_visibles : "no aplica";
        $vasosPyes = $request->vasos == "vasos_si" ? $request->vasos_quebrados : "no aplica";

        $mergeData = [
            'cenefa_visi' => $cenefaVyes,
            'cenefa_colo' => $cenefaCyes,
            'afiche_visi' => $aficheVyes,
            'afiche_colo' => $aficheCyes,
            'marca_combo' => $aficheMarcyes,
            'aficheCombotizado' => $aficheCom,
            'combox1' =>  $aficheCom1yes,
            'combox2' =>  $aficheCom2yes,
            'combox3' =>  $aficheCom3yes,
            'marco_visi' => $marcoVyes,
            'marco_colo' => $marcoCyes,
            'prod_rt_visibles' => $rompetraficoVyes,
            'prod_rt_properly' => $rompetraficoCyes,
            'fachadas_visi' => $fachadasVyes,
            'fachadas_colo' => $fachadasCyes,
            'hl_con_prod' => $hieleraVyes,
            'prod_hl_visible' => $hieleraPyes,
            'prod_hl_danadas' => $hieleraDyes,
            'baseshl_con_prod' => $bhieleraVyes,
            'prod_baseshl_visible' => $bhieleraPyes,
            'prod_baseshl_danadas' => $bhieleraDyes,
            'prod_dsD_visibles' => $dosificadorDVyes,
            'prod_dsD_diferentes' => $dosificadorDPyes,
            'prod_dsD_danados' => $dosificadorDDyes,
            'prod_dsS_visibles' => $dosificadorSVyes,
            'prod_dsS_diferentes' => $dosificadorSPyes,
            'prod_dsS_danados' => $dosificadorSDyes,
            'branding_visible' => $brandingVyes,
            'branding_danados' => $brandingPyes,
            'vasos_visibles' => $vasosVyes,
            'vasos_quebrados' => $vasosPyes,
            'criticidad' => 'paso 4 - materiales',
        ];
        $datosMateriales = request()->merge($mergeData)->except(
            [
                '_method',
                '_token',
                'seleccionCenefa',
                'seleccionAfiche',
                'seleccionMarco',
                'seleccionRompetrafico',
                'seleccionFaxada',
                'seleccionHielera',
                'seleccionBase_h',
                'seleccionDosificadorD',
                'seleccionDosificadorS',
                'seleccionBranding',
                'seleccionVasos',

            ]
        );

        Materiales::where('id', '=', $id)->update($datosMateriales);
        $id =  $materiales->precarga_id;
        $concretado = PuntosAuditoria::findOrFail($id);
        $concretado->estatusGestion = 'paso 4 - materiales';
        $concretado->save();


        return redirect('disponibilidad');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
