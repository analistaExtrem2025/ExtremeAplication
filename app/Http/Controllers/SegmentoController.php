<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\PuntosAuditoria;
use App\Models\Segmento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class SegmentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $segmento = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.segmento', compact('segmento'));
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

        $segmento = [

            "Gold" => "Gold",
            "Silver" => "Silver",
            "Bronce" => "Bronce",
        ];
        $puntos_auditoria = Segmento::findOrFail($id);

        $datos = PuntosAuditoria::select('segmentacion')->where('id', $puntos_auditoria->precarga_id)->get()->pluck('segmentacion');

        return view('auditoria.newSegmento', compact('segmento', 'puntos_auditoria', 'datos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        $segmento = Segmento::findOrFail($id);
        $datos = PuntosAuditoria::select('segmentacion')->where('id', $segmento->precarga_id)->get()->pluck('segmentacion');
        $datosReporte = request()->except('_token');
        if ($request->hasFile('fotosegmento')) {
            $imagenSegmento= $request->file('fotosegmento');
            $nombreSegmento = "_" . $request->precarga_id . '.' . 'png';
            $destinoSegmento = public_path('auditorias_pics/segmento');
            $request->fotosegmento->move($destinoSegmento, $nombreSegmento);
            $redSegmento = Image::make($destinoSegmento . '/' . $nombreSegmento);
            $redSegmento->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redSegmento->text(
                "segmento" . " " .
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
            $redSegmento->save($destinoSegmento . $nombreSegmento);
        }

        if ($request->state_segmento == 'segmento_no') {

            $segmento->update(
                [
                    'state_segmento' => $request->state_segmento,
                    'segmento' => $request->segmento,
                    'caja_cerveza' => $request->caja_cerveza,
                    'caja_aguardiente' => $request->caja_aguardiente,
                    'caja_ron' => $request->caja_ron,
                    'caja_whiskey' => $request->caja_whiskey,
                    'fotosegmento' => 'auditorias_pics/segmento'. $nombreSegmento,
                    'criticidad' => 'paso 3 - segmento',
                ]
            );
        } else if ($request->state_segmento == 'segmento_si') {
            $segmento->update(
                [
                    'state_segmento' => $request->state_segmento,
                    'segmento' =>  $datos,
                    'caja_cerveza' => $request->caja_cerveza,
                    'caja_aguardiente' => $request->caja_aguardiente,
                    'caja_ron' => $request->caja_ron,
                    'caja_whiskey' => $request->caja_whiskey,
                    'fotosegmento' => 'auditorias_pics/segmento'. $nombreSegmento,
                    'criticidad' => 'paso 3 - segmento',
                ]
            );
        }
        return redirect('materiales');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
