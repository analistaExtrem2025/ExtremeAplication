<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Disponibilidad;
use App\Models\PuntosAuditoria;
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
            'Ron viejo de caldas' => 'Ron viejo de caldas',
            'Ron Medellín añejo 3 años' => 'Ron Medellín añejo 3 años',
            'Ron Santa Fe' => 'Ron Santa Fe',
            'Ron Marquez' => 'Ron Marquez',
            'Ron Barcardi' => 'Ron Barcardi',
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
                'Lineal Diageo' . " " .
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
            $redLinealDiageo->save($destinoLinealDiageo . $nombreLinealDiageo);
            $auditoria->seleccionLinealDiageo = 'auditorias_pics/LinealDiageo' .  $nombreLinealDiageo;
            $auditoria->save();
        } else {
            $auditoria->seleccionLinealDiageo = 'public\img\no_diponible.png';
            $auditoria->save();
        }

        $disponibilidad = Disponibilidad::findOrFail($id);

        $black1000     = $request->bAndw1000 == "bAndw1000_si" ? $request->bAndw1000 : "no aplica";
        $black1000C    = $request->bAndw1000 == "bAndw1000_si" ? $request->caras_bAndw1000 : "0";
        $black1000P    = $request->bAndw1000 == "bAndw1000_si" ? $request->precio_bAndw1000 : "0";

        $black700      = $request->bAndw700 == "bAndw700_si" ? $request->bAndw700 : "no aplica";
        $black700C     = $request->bAndw700 == "bAndw700_si" ? $request->caras_bAndw700 : "0";
        $black700P     = $request->bAndw700 == "bAndw700_si" ? $request->precio_bAndw700 : "0";

        $black375      = $request->bAndw375 == "bAndw375_si" ? $request->bAndw375 : "no aplica";
        $black375C     = $request->bAndw375 == "bAndw375_si" ? $request->caras_bAndw375 : "0";
        $black375P     = $request->bAndw375 == "bAndw375_si" ? $request->precio_bAndw375 : "0";

        $smir700       = $request->smirnoff700 == "smirnoff700_si" ? $request->smirnoff700 : "no aplica";
        $smir700C      = $request->smirnoff700 == "smirnoff700_si" ? $request->caras_smirnoff700 : "0";
        $smir700P      = $request->smirnoff700 == "smirnoff700_si" ? $request->precio_smirnoff700 : "0";

        $smir375       = $request->smirnoff375 == "smirnoff375_si" ? $request->smirnoff375 : "no aplica";
        $smir375C      = $request->smirnoff375 == "smirnoff375_si" ? $request->caras_smirnoff375 : "0";
        $smir375P      = $request->smirnoff375 == "smirnoff375_si" ? $request->precio_smirnoff375 : "0";

        $smirNs700     = $request->smirnoff_ns700 == "smirnoff_ns700_si" ? $request->smirnoff_ns700 : "no aplica";
        $smirNs700C    = $request->smirnoff_ns700 == "smirnoff_ns700_si" ? $request->caras_smirnoff_ns700 : "0";
        $smirNs700P    = $request->smirnoff_ns700 == "smirnoff_ns700_si" ? $request->precio_smirnoff_ns700 : "0";

        $smirNs375     = $request->smirnoff_ns375 == "smirnoff_ns375_si" ? $request->smirnoff_ns375 : "no aplica";
        $smirNs375C    = $request->smirnoff_ns375 == "smirnoff_ns375_si" ? $request->caras_smirnoff_ns375 : "0";
        $smirNs375P    = $request->smirnoff_ns375 == "smirnoff_ns375_si" ? $request->precio_smirnoff_ns375 : "0";

        $johnnie1000   = $request->jhonnie1000 == "jhonnie1000_si" ? $request->jhonnie1000 : "no aplica";
        $johnnie1000C  = $request->jhonnie1000 == "jhonnie1000_si" ? $request->caras_jhonnie1000 : "0";
        $johnnie1000P  = $request->jhonnie1000 == "jhonnie1000_si" ? $request->precio_jhonnie1000 : "0";

        $johnnie700    = $request->jhonnie700 == "jhonnie700_si" ? $request->jhonnie700 : "no aplica";
        $johnnie700C   = $request->jhonnie700 == "jhonnie700_si" ? $request->caras_jhonnie700 : "0";
        $johnnie700P   = $request->jhonnie700 == "jhonnie700_si" ? $request->precio_jhonnie700 : "0";

        $johnnie375    = $request->jhonnie375 == "jhonnie375_si" ? $request->jhonnie375 : "no aplica";
        $johnnie375C   = $request->jhonnie375 == "jhonnie375_si" ? $request->caras_jhonnie375 : "0";
        $johnnie375P   = $request->jhonnie375 == "jhonnie375_si" ? $request->precio_jhonnie375 : "0";

        $old750        = $request->oldparr750 == "oldparr750_si" ? $request->oldparr750 : "no aplica";
        $old750C       = $request->oldparr750 == "oldparr750_si" ? $request->caras_oldparr750 : "0";
        $old750P       = $request->oldparr750 == "oldparr750_si" ? $request->precio_oldparr750 : "0";

        $buchannas700  = $request->buchannas700 == "buchannas700_si" ? $request->buchannas700 : "no aplica";
        $buchannas700C = $request->buchannas700 == "buchannas700_si" ? $request->caras_buchannas700 : "0";
        $buchannas700P = $request->buchannas700 == "buchannas700_si" ? $request->precio_buchannas700 : "0";

        $buchannas375  = $request->buchannas375 == "buchannas375_si" ? $request->buchannas375 : "no aplica";
        $buchannas375C = $request->buchannas375 == "buchannas375_si" ? $request->caras_buchannas375 : "0";
        $buchannas375P = $request->buchannas375 == "buchannas375_si" ? $request->precio_buchannas375 : "0";



        $mergeData = [
            'bAndw1000' => $black1000,
            'caras_bAndw1000' => $black1000C,
            'precio_bAndw1000' => $black1000P,
            'bAndw700' => $black700,
            'caras_bAndw700' => $black700C,
            'precio_bAndw700' => $black700P,
            'bAndw375' => $black375,
            'caras_bAndw375' => $black375C,
            'precio_bAndw375' => $black375P,
            'smirnoff700' => $smir700,
            'caras_smirnoff700' => $smir700C,
            'precio_smirnoff700' => $smir700P,
            'smirnoff375' => $smir375,
            'caras_smirnoff375' => $smir375C,
            'precio_smirnoff375' => $smir375P,
            'smirnoff_ns700' => $smirNs700,
            'caras_smirnoff_ns700' => $smirNs700C,
            'precio_smirnoff_ns700' => $smirNs700P,
            'smirnoff_ns375' => $smirNs375,
            'caras_smirnoff_ns375' => $smirNs375C,
            'precio_smirnoff_ns375' => $smirNs375P,
            'jhonnie1000' => $johnnie1000,
            'caras_jhonnie1000' => $johnnie1000C,
            'precio_jhonnie1000' => $johnnie1000P,
            'jhonnie700' => $johnnie700,
            'caras_jhonnie700' => $johnnie700C,
            'precio_jhonnie700' => $johnnie700P,
            'jhonnie375' =>  $johnnie375 ,
            'caras_jhonnie375' =>  $johnnie375C,
            'precio_jhonnie375' =>  $johnnie375P,
            'oldparr750' => $old750,
            'caras_oldparr750' => $old750C,
            'precio_oldparr750' => $old750P,
            'buchannas700' => $buchannas700,
            'caras_buchannas700' => $buchannas700C,
            'precio_buchannas700' => $buchannas700P,
            'buchannas375' => $buchannas375,
            'caras_buchannas375' => $buchannas375C,
            'precio_buchannas375' => $buchannas375P,

        ];
        $datosDisponibilidad = request()->merge($mergeData)->except(
            [
                '_method',
                '_token',
                'seleccionLinealDiageo',
                'seleccionLinealR',
                'seleccionLinealA',
                'Blackywhite',
                'Smirnoff',
                'SmirnoffNs',
                'Jhonnie',
                'OldParr',
                'Buchannas'

            ]
        );

        Disponibilidad::where('id', '=', $id )->update($datosDisponibilidad);
        $id =  $disponibilidad->precarga_id;
        $concretado = PuntosAuditoria::findOrFail($id);
        $concretado->estatusGestion = 'paso 5 - disponibilidad';
        //$concretado->estatusGestion = 'paso 5 - disponibilidad';
        $concretado->save();
        return redirect('comparativo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disponibilidad $disponibildad)
    {
        //
    }
}
