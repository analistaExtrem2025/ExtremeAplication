<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Exhibicion;
use App\Models\PuntosAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ExhibicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exhibicion = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.exhibicion', compact('exhibicion'));
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
    public function show($id)
    {
        $puntos_auditoria = Exhibicion::findOrFail($id);
        $usuario = Auth::user()->municipio;

        return view('auditoria.newExhibicion', compact('puntos_auditoria', 'usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibicion $exhibicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        $materiales = Exhibicion::findOrFail($id);
        if ($request->hasFile('seleccionron_byw')) {
            $imagenron_byw = $request->file('seleccionron_byw');
            $nombreron_byw = "_" . $request->precarga_id . '.' . 'png';
            $destinoron_byw = public_path('auditorias_pics/ron_byw');
            $request->seleccionron_byw->move($destinoron_byw, $nombreron_byw);
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
            $auditoria->seleccionron_byw = 'auditorias_pics/ron_byw' .  $nombreron_byw;
            $auditoria->save();
        } else {
            $auditoria->seleccionron_byw = 'public\img\no_diponible.png';
            $auditoria->save();
        }



        if ($request->hasFile('seleccionron_jhonny')) {

            $imagenron_jhonny = $request->file('seleccionron_jhonny');
            $nombreron_jhonny = "_" . $request->precarga_id . '.' . 'png';
            $destinoron_jhonny = public_path('auditorias_pics/ron_jhonny');
            $request->seleccionron_jhonny->move($destinoron_jhonny, $nombreron_jhonny);
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
            $auditoria->seleccionron_jhonny = 'auditorias_pics/ron_jhonny' .  $nombreron_jhonny;
            $auditoria->save();
        } else {
            $auditoria->seleccionron_jhonny = 'public\img\no_diponible.png';
            $auditoria->save();
        }
        if ($request->hasFile('seleccionaguard_smirnoff')) {

            $imagenaguard_smirnoff = $request->file('seleccionaguard_smirnoff');
            $nombreaguard_smirnoff = "_" . $request->precarga_id . '.' . 'png';
            $destinoaguard_smirnoff = public_path('auditorias_pics/aguard_smirnoff');
            $request->seleccionaguard_smirnoff->move($destinoaguard_smirnoff, $nombreaguard_smirnoff);
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
            $auditoria->seleccionaguard_smirnoff = 'auditorias_pics/aguard_smirnoff' .  $nombreaguard_smirnoff;
            $auditoria->save();
        } else {
            $auditoria->seleccionaguard_smirnoff = 'public\img\no_diponible.png';
            $auditoria->save();
        }



        $ronBlack = $request->ron_byw == "ron_byw_si" ? $request->ron_byw : "ron_byw_no";
        $ronJhonnie = $request->ron_jhonny == "ron_jhonny_si" ? $request->ron_jhonny : "ron_jhonny_no";
        $aguaSmir = $request->aguard_smirnoff == "aguard_smirnoff_si" ? $request->aguard_smirnoff : "aguard_smirnoff_no";


        $mergeData = [

            'ron_byw' => $ronBlack,
            'ron_jhonny' => $ronJhonnie,
            'aguard_smirnoff' => $aguaSmir,
            'criticidad' => 'paso 6 - Exhibicion',
        ];

        $datosExhibicion = request()->merge($mergeData)->except(
            [
                '_method',
                '_token',
                'seleccionron_byw',
                'seleccionron_jhonny',
                'seleccionaguard_smirnoff',
            ]
        );

        Exhibicion::where('id', '=', $id)->update($datosExhibicion);
        $id =  $materiales->precarga_id;
        $concretado = PuntosAuditoria::findOrFail($id);
        $concretado->estatusGestion = 'paso 6 - Exhibicion';
        $concretado->save();

        return redirect('gifts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibicion $exhibicion)
    {
        //
    }
}
