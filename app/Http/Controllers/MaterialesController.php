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
        } else {

            $auditoria->seleccionCenefa = 'public\img\no_diponible.png';
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
            $auditoria->seleccionMarco = 'auditorias_pics/Marco' .  $nombreMarco;
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
            $auditoria->seleccionRompetrafico = 'auditorias_pics/Rompetrafico' .  $nombreRompetrafico;
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
            $auditoria->seleccionFaxada = 'auditorias_pics/Faxada' .  $nombreFaxada;
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
            $auditoria->seleccionHielera = 'auditorias_pics/Hielera' .  $nombreHielera;
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
            $auditoria->seleccionBase_h = 'auditorias_pics/Base_h' .  $nombreBase_h;
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
            $auditoria->seleccionDosificadorD = 'auditorias_pics/DosificadorD' .  $nombreDosificadorD;
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
            $auditoria->seleccionDosificadorS = 'auditorias_pics/DosificadorS' .  $nombreDosificadorS;
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
            $auditoria->seleccionBranding = 'auditorias_pics/Branding' .  $nombreBranding;
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
            $auditoria->seleccionVasos = 'auditorias_pics/Vasos' .  $nombreVasos;
            $auditoria->save();
        } else {
            $auditoria->seleccionVasos = 'public\img\no_diponible.png';
            $auditoria->save();
        }


        $materiales = Materiales::findOrFail($id);
        $materiales->update(
            [
                'cenefa' => $request->cenefa,
                'cenefa_visi' => $request->cenefa_visi,
                'cenefa_colo' => $request->cenefa_colo,
                'marca_combo' => $request->marca_combo,
                'afiche' => $request->afiche,
                'afiche_visi' => $request->afiche_visi,
                'afiche_colo' => $request->afiche_colo,
                'aficheCombotizado' => $request->aficheCombotizado,
                'combox1' => $request->combox1,
                'combox2' => $request->combox2,
                'combox3' => $request->combox3,
                'marco' => $request->marco,
                'marco_visi' => $request->marco_visi,
                'marco_colo' => $request->marco_colo,
                'rompetraficos' => $request->rompetraficos,
                'prod_rt_visibles' => $request->prod_rt_visibles,
                'prod_rt_properly' => $request->prod_rt_properly,
                'fachadas' => $request->fachadas,
                'fachadas_visi' => $request->fachadas_visi,
                'fachadas_colo' => $request->fachadas_colo,
                'hielera' => $request->hielera,
                'hl_con_prod' => $request->hl_con_prod,
                'prod_hl_visible' => $request->prod_hl_visible,
                'prod_hl_danadas' => $request->prod_hl_danadas,
                'bases_h' => $request->bases_h,
                'baseshl_con_prod' => $request->baseshl_con_prod,
                'prod_baseshl_visible' => $request->prod_baseshl_visible,
                'prod_baseshl_danadas' => $request->prod_baseshl_danadas,
                "dosificadorD" => $request->dosificadorD,
                "prod_dsD_visibles" => $request->prod_dsD_visibles,
                "prod_dsD_diferentes" => $request->prod_dsD_diferentes,
                "prod_dsD_danados" => $request->prod_dsD_danados,
                'dosificadorS' => $request->dosificadorS,
                'prod_dsS_visibles' => $request->prod_dsS_visibles,
                'prod_dsS_diferentes' => $request->prod_dsS_diferentes,
                'prod_dsS_danados' => $request->prod_dsS_danados,
                'branding' => $request->branding,
                'branding_visible' => $request->branding_visible,
                'branding_danados' => $request->branding_danados,
                'vasos' => $request->vasos,
                'vasos_visibles' => $request->vasos_visibles,
                'vasos_quebrados' => $request->vasos_quebrados,
            ]
        );

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
