<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\ComparativoMarcas;
use App\Models\PuntosAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ComparativoMarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comparativo = Auditoria::where('promotor', Auth::user()->name)
            ->orderBy('created_at', 'desc')->first();
        return view('auditoria.comparativo', compact('comparativo'));
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
        $puntos_auditoria = ComparativoMarcas::findOrFail($id);
        $usuario = Auth::user()->municipio;

        return view(
            'auditoria.newComparativo',
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
    public function edit(ComparativoMarcas $comparativoMarcas)
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
                'Compet Ron' . " " .
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
                'Compet Aguardiente' . " " .
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
            $redAguardiente->save($destinoAguardiente . $nombreAguardiente);
            $auditoria->seleccionLinealA = 'auditorias_pics/Aguardiente' .  $nombreAguardiente;
            $auditoria->save();
        } else {
            $auditoria->seleccionLinealA = 'public\img\no_diponible.png';
            $auditoria->save();
        }
        $comparativo = ComparativoMarcas::findOrFail($id);

        $ron1          = $request->hay_ron == "hay_ron_Si" ? $request->comp_ron1 : "no aplica";
        $ron1P         = $request->hay_ron == "hay_ron_Si" ? $request->precio_comp_ron1 : "0";
        $ron2          = $request->hay_ron == "hay_ron_Si" ? $request->comp_ron2 : "no aplica";
        $ron2P         = $request->hay_ron == "hay_ron_Si" ? $request->precio_comp_ron2 : "0";
        $ron1C         = $request->hay_ron == "hay_ron_Si" ? $request->caras_comp_ron : "0";
        $agua1         = $request->hay_aguardiente == "hay_aguardiente_Si" ? $request->comp_aguard1 : "no aplica";
        $agua1P        = $request->hay_aguardiente == "hay_aguardiente_Si" ? $request->precio_comp_aguardiente1 : "0";
        $agua2         = $request->hay_aguardiente == "hay_aguardiente_Si" ? $request->comp_aguard2 : "no aplica";
        $agua2P        = $request->hay_aguardiente == "hay_aguardiente_Si" ? $request->precio_comp_aguardiente2 : "0";
        $agua1C        = $request->hay_aguardiente == "hay_aguardiente_Si" ? $request->caras_comp_aguardiente : "0";

        $mergeData = [
            'comp_ron1' =>  $ron1 ,
            'precio_comp_ron1' =>  $ron1P,
            'comp_ron2' =>  $ron2 ,
            'precio_comp_ron2' =>  $ron2P,
            'caras_comp_ron' =>  $ron1C,
            'comp_aguard1' =>  $agua1,
            'precio_comp_aguardiente1' =>  $agua1P,
            'comp_aguard2' =>  $agua2,
            'precio_comp_aguardiente2' =>  $agua2P,
            'caras_comp_aguardiente' =>  $agua1C,
            'hay_ron' => $request->hay_ron,
            'hay_aguardiente' => $request->hay_aguardiente
        ];


        $datosComparativo = request()->merge($mergeData)->except(
            [
                '_method',
                '_token',
                'seleccionLinealR',
                'seleccionLinealA',
                'RonesComp',
                'AguarComp'

            ]
        );

        ComparativoMarcas::where('id', '=', $id )->update($datosComparativo);
        $id =  $comparativo->precarga_id;
        $concretado = PuntosAuditoria::findOrFail($id);
        $concretado->estatusGestion = 'paso 6 - comparativo';
        $concretado->save();
        return redirect('exhibicion');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComparativoMarcas $comparativoMarcas)
    {
        //
    }
}
