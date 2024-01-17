<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Gifts;
use App\Models\PuntosAuditoria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.gifts', compact('gifts'));
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
        $puntos_auditoria = Gifts::findOrFail($id);

        return view('auditoria.newGifts', compact('puntos_auditoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gifts $gifts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        if ($request->hasFile('selecciongift')) {

            $imagenGift = $request->file('selecciongift');
            $nombreGift = "_" . $request->precarga_id . '.' . 'png';
            $destinoGift = public_path('auditorias_pics/Gift');
            $request->selecciongift->move($destinoGift, $nombreGift);
            $redGift = Image::make($destinoGift . '/' . $nombreGift);
            $redGift->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redGift->text(
                'Gift' . " " .
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
            $redGift->save($destinoGift . $nombreGift);
            $auditoria->selecciongift = 'auditorias_pics/Gift' .  $nombreGift;
            $auditoria->save();
        } else {
            $auditoria->selecciongift = '\public\img\no_gift.png';
            $auditoria->save();
        }
        $disponibilidad = Gifts::findOrFail($id);

        if ($request->selecciongift != null) {

            $disponibilidad->update(
                [
                    'gift' => $request->gift,
                    'cant_gift' => $request->cant_gift,
                    'criticidad' => "paso 7 - gift",
                ]
            );
        } else {
            $disponibilidad->update(
                [
                    'gift' => $request->gift,
                    'cant_gift' => 0,
                    'criticidad' => "paso 7 - gift",
                ]
            );
        }

        $id =  $disponibilidad->precarga_id;
        $concretado = PuntosAuditoria::findOrFail($id);
        $concretado->estatusGestion = "paso 7 - gift";
        $concretado->save();
        return redirect('generalidades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gifts $gifts)
    {
        //
    }
}
