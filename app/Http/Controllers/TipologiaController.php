<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\PuntosAuditoria;
use App\Models\Tipologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TipologiaController extends Controller
{
    /**
     * Indes parte 3 de la encuesta.
     */
    public function index()
    {

        $tipologia = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.tipologia', compact('tipologia'));
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipologia = [
            'Bar estándar' => 'Bar estándar',
            'Tienda de consumo' => 'Tienda de consumo',
            'Licobares' => 'Licobares',
            'Juegos típicos' => 'Juegos típicos',
        ];
        $puntos_auditoria = Tipologia::findOrFail($id);
        $datos = PuntosAuditoria::select('tipologia')->where('id', $puntos_auditoria->precarga_id)->get()->pluck('tipologia');
        return view('auditoria.newTipologia', compact('tipologia', 'puntos_auditoria', 'datos'));
    }

    public function update(Request $request, $id)
    {

        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        $tipologia = Tipologia::findOrFail($id);
        $datos = PuntosAuditoria::select('tipologia')->where('id', $tipologia->precarga_id)->get()->pluck('tipologia');
        $datosReporte = request()->except('_token');
        if ($request->hasFile('fototipologia')) {
            $imagenTipologia = $request->file('fototipologia');
            $nombreTipologia = "_" . $request->precarga_id . '.' . 'png';
            $destinoTipologia = public_path('auditorias_pics/tipologia');
            $request->fototipologia->move($destinoTipologia, $nombreTipologia);
            $redTipologia = Image::make($destinoTipologia . '/' . $nombreTipologia);
            $redTipologia->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redTipologia->text(
                "tipologia" . " " .
                    $auditoria->star . " " .
                    $auditoria->direccion . " " .
                    $auditoria->municipio . " " .
                    $auditoria->latitude . " " .
                    $auditoria->longitude,
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
            $redTipologia->save($destinoTipologia . $nombreTipologia);
        }

        if ($request->state_tipologia == 'tipologia_no') {

            $tipologia->update(
                [
                    'state_tipologia' => $request->state_tipologia,
                    'tipologia' => $request->tipologia,
                    'fototipologia' => 'auditorias_pics/tipologia' . $nombreTipologia,
                ]
            );
        } else if ($request->state_tipologia == 'tipologia_si') {
            $tipologia->update(
                [
                    'state_tipologia' => $request->state_tipologia,
                    'tipologia' => $datos,
                    'fototipologia' => 'auditorias_pics/tipologia' . $nombreTipologia,
                ]
            );
        }
        return redirect('segmento');
    }
}
