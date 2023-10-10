<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Exhibicion;
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
            $imagenron_byw= $request->file('seleccionron_byw');
            $nombreron_byw= "_" . $request->precarga_id . '.' . 'png';
            $destinoron_byw= public_path('auditorias_pics/ron_byw');
            $request->seleccionron_byw->move($destinoron_byw, $nombreron_byw);
            $redron_byw= Image::make($destinoron_byw. '/' . $nombreron_byw);
            $redron_byw->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redron_byw->text(
                'Ron vs B&W' . " ".
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
            $redron_byw->save($destinoron_byw. $nombreron_byw);
            $auditoria->seleccionron_byw = 'auditorias_pics/ron_byw' .  $nombreron_byw;
            $auditoria->save();
        } else {
            $auditoria->seleccionron_byw = 'public\img\no_diponible.png';
            $auditoria->save();
        }



        if ($request->hasFile('seleccionron_jhonny')) {

            $imagenron_jhonny= $request->file('seleccionron_jhonny');
            $nombreron_jhonny= "_" . $request->precarga_id . '.' . 'png';
            $destinoron_jhonny= public_path('auditorias_pics/ron_jhonny');
            $request->seleccionron_jhonny->move($destinoron_jhonny, $nombreron_jhonny);
            $redron_jhonny= Image::make($destinoron_jhonny. '/' . $nombreron_jhonny);
            $redron_jhonny->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redron_jhonny->text(
                'Ron vs Jhonnie' . " ".
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
            $redron_jhonny->save($destinoron_jhonny. $nombreron_jhonny);
        }

        if ($request->hasFile('seleccionaguard_smirnoff')) {

            $imagenaguard_smirnoff= $request->file('seleccionaguard_smirnoff');
            $nombreaguard_smirnoff= "_" . $request->precarga_id . '.' . 'png';
            $destinoaguard_smirnoff= public_path('auditorias_pics/aguard_smirnoff');
            $request->seleccionaguard_smirnoff->move($destinoaguard_smirnoff, $nombreaguard_smirnoff);
            $redaguard_smirnoff= Image::make($destinoaguard_smirnoff. '/' . $nombreaguard_smirnoff);
            $redaguard_smirnoff->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redaguard_smirnoff->text(
                'Aguardiente vs Smirnoff' . " ".
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
            $redaguard_smirnoff->save($destinoaguard_smirnoff. $nombreaguard_smirnoff);
            $auditoria->seleccionaguard_smirnoff = 'auditorias_pics/aguard_smirnoff' .  $nombreaguard_smirnoff;
            $auditoria->save();
        } else {
            $auditoria->seleccionaguard_smirnoff = 'public\img\no_diponible.png';
            $auditoria->save();
        }


   //dd($request->all());
        if ( $request->ron_jhonny != null  ) {
            $materiales->update(
                [
                    'ron_byw' => $request->ron_byw,
                    'ron_jhonny' => $request->ron_jhonny,
                    'aguard_smirnoff' => $request->aguard_smirnoff
,
                ]
            );
        } else {
            $materiales->update(
                [
                    'ron_byw' => $request->ron_byw,
                    'aguard_smirnoff' => $request->aguard_smirnoff,

                ]
            );
        }
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
