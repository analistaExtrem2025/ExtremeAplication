<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Disponibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos_auditoria = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.disponibilidad', compact('puntos_auditoria'));
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
        $puntos_auditoria = Disponibilidad::findOrFail($id);
        $usuario = Auth::user()->municipio;

        return view(
            'auditoria.newDisponibilidad',
            compact(
                'puntos_auditoria',
                'usuario',
                'competenciaRon',
                'competenciaAguardiente'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disponibilidad $disponibildad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

     //dd($request->all());
        $auditoria = Auditoria::where('precarga_id', $request->precarga_id)->first();
        $nombreRon = "_" . $request->precarga_id . '.' . 'png';
        $nombreAguardiente = "_" . $request->precarga_id . '.' . 'png';

        if ($request->hasFile('seleccionLinealDiageo')) {

            $imagenLinealDiageo = $request->file('seleccionLinealDiageo');
            $nombreLinealDiageo = "LinealDg_" . $request->precarga_id . '.' . 'png';
            $destinoLinealDiageo = public_path('auditorias_pics/LinealDiageo');
            $request->seleccionLinealDiageo->move($destinoLinealDiageo, $nombreLinealDiageo);
            $redLinealDiageo = Image::make($destinoLinealDiageo . '/' . $nombreLinealDiageo);
            $redLinealDiageo->resize(
                380,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $redLinealDiageo->text(
                'Lineal Diageo' . " ".
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
            $redLinealDiageo->save($destinoLinealDiageo. $nombreLinealDiageo);
            $auditoria->seleccionLinealDiageo = 'auditorias_pics/LinealDiageo' .  $nombreLinealDiageo;
            $auditoria->save();


        } else {
            $auditoria->seleccionLinealDiageo = 'public\img\no_diponible.png';
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
        } else {
            $auditoria->seleccionLinealR = 'public\img\no_diponible.png';
            $auditoria->save();
        }


        if ($request->hasFile('seleccionLinealA')) {
            $imagenAguardiente = $request->file('seleccionLinealA');
            $nombreAguardiente = "_" . $request->precarga_id . '.' . 'png';
            $destinoAguardiente = public_path('auditorias_pics/Aguardiente');
            $request->seleccionLinealA->move($destinoAguardiente, $nombreAguardiente);
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
            $auditoria->seleccionLinealA = 'auditorias_pics/Aguardiente' .  $nombreAguardiente;
            $auditoria->save();
        } else {
            $auditoria->seleccionLinealA = 'public\img\no_diponible.png';
            $auditoria->save();
        }

        //dd($request->all());

        $disponibilidad = Disponibilidad::findOrFail($id);
        $disponibilidad->update(
            [
                'bAndw1000' => $request->bAndw1000,
                'caras_bAndw1000' => $request->caras_bAndw1000,
                'precio_bAndw1000' => $request->precio_bAndw1000,
                'bAndw700' => $request->bAndw700,
                'caras_bAndw700' => $request->caras_bAndw700,
                'precio_bAndw700' => $request->precio_bAndw700,
                'bAndw375' => $request->bAndw375,
                'caras_bAndw375' => $request->caras_bAndw375,
                'precio_bAndw375' => $request->precio_bAndw375,
                'smirnoff700' => $request->smirnoff700,
                'caras_smirnoff700' => $request->caras_smirnoff700,
                'precio_smirnoff700' => $request->precio_smirnoff700,
                'smirnoff375' => $request->smirnoff375,
                'caras_smirnoff375' => $request->caras_smirnoff375,
                'precio_smirnoff375' => $request->precio_smirnoff375,
                'smirnoff_ns700' => $request->smirnoff_ns700,
                'caras_smirnoff_ns700' => $request->caras_smirnoff_ns700,
                'precio_smirnoff_ns700' => $request->precio_smirnoff_ns700,
                'smirnoff_ns375' => $request->smirnoff_ns375,
                'caras_smirnoff_ns375' => $request->caras_smirnoff_ns375,
                'precio_smirnoff_ns375' => $request->precio_smirnoff_ns375,
                'jhonnie1000' => $request->jhonnie1000,
                'caras_jhonnie1000' => $request->caras_jhonnie1000,
                'precio_jhonnie1000' => $request->precio_jhonnie1000,
                'jhonnie700' => $request->jhonnie700,
                'caras_jhonnie700' => $request->caras_jhonnie700,
                'precio_jhonnie700' => $request->precio_jhonnie700,
                'jhonnie375' => $request->jhonnie375,
                'caras_jhonnie375' => $request->caras_jhonnie375,
                'precio_jhonnie375' => $request->precio_jhonnie375,
                'oldparr750' => $request->oldparr750,
                'caras_oldparr750' => $request->caras_oldparr750,
                'precio_oldparr750' => $request->precio_oldparr750,
                'buchannas700' => $request->buchannas700,
                'caras_buchannas700' => $request->caras_buchannas700,
                'precio_buchannas700' => $request->precio_buchannas700,
                'buchannas375' => $request->buchannas375,
                'caras_buchannas375' => $request->caras_buchannas375,
                'precio_buchannas375' => $request->precio_buchannas375,
                'cal_marc_visible' => $request->cal_marc_visible,
                'cal_marc_danados' => $request->cal_marc_danados,
                'cal_marc_et_danados' => $request->cal_marc_et_danados,
                'hay_ron' => $request->hay_ron,
                'hay_aguardiente' => $request->hay_aguardiente,
                'comp_ron1' => $request->comp_ron1,
                'caras_comp_ron' => $request->caras_comp_ron,
                'precio_comp_ron1' => $request->precio_comp_ron1,
                'comp_ron2' => $request->comp_ron2,
                'precio_comp_ron2' => $request->precio_comp_ron2,
                'comp_aguard1' => $request->comp_aguard1,
                'caras_comp_aguardiente' => $request->caras_comp_aguardiente,
                'precio_comp_aguardiente1' => $request->precio_comp_aguardiente1,
                'comp_aguard2' => $request->comp_aguard2,
                'precio_comp_aguardiente2' => $request->precio_comp_aguardiente2,
                'seleccionLinealDiageo' => 'auditorias_pics/LinealDiageo' .  $nombreLinealDiageo,
                'seleccionLinealR' => 'auditorias_pics/Ron'.  $nombreRon,
                'seleccionLinealA' =>'auditorias_pics/Aguardiente' .  $nombreAguardiente,
                'criticidad' => 'paso 5 - disponibilidad',

            ]
        );
        return redirect('exhibicion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disponibilidad $disponibildad)
    {
        //
    }
}
