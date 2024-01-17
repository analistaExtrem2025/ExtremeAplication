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
            'Otro' => 'Otro',

        ];


        $otros = [
            'Almacenes' => 'Almacenes',
            'Alquiler De Videos /Video Jueg' => 'Alquiler De Videos /Video Jueg',
            'Autoventa' => 'Autoventa',
            'Cafe/ Reposteria / Pasteleria' => 'Cafe/ Reposteria / Pasteleria',
            'Cafeteria De Colegio' => 'Cafeteria De Colegio',
            'Cafeteria/Restaurante' => 'Cafeteria/Restaurante',
            'Cafeterias/Heladerias' => 'Cafeterias/Heladerias',
            'Casas De Barrio/Ventanitas' => 'Casas De Barrio/Ventanitas',
            'Casas De Barrio/Ventanitas}' => 'Casas De Barrio/Ventanitas}',
            'Casino' => 'Casino',
            'Cinema/Teatro' => 'Cinema/Teatro',
            'Club' => 'Club',
            'Club Social Premium' => 'Club Social Premium',
            'Clubes Sociales' => 'Clubes Sociales',
            'Comidas Rapidas' => 'Comidas Rapidas',
            'Conjunto Residencial' => 'Conjunto Residencial',
            'Consultorio Independiente' => 'Consultorio Independiente',
            'Corporativo' => 'Corporativo',
            'Depositos/Distribuidoras' => 'Depositos/Distribuidoras',
            'Discoteca' => 'Discoteca',
            'Drogueria' => 'Drogueria',
            'Droguerias/Tiendas Naturistas' => 'Droguerias/Tiendas Naturistas',
            'Entidades Financieras' => 'Entidades Financieras',
            'Escuela/Colegio/Inst./Univer.' => 'Escuela/Colegio/Inst./Univer.',
            'Estaciones De Ser./Tienda Conv' => 'Estaciones De Ser./Tienda Conv',
            'Eventos' => 'Eventos',
            'Eventos' => 'Eventos',
            'Fabrica/Bodega' => 'Fabrica/Bodega',
            'Fabricas/Industrias' => 'Fabricas/Industrias',
            'Farmacias/Droguerias' => 'Farmacias/Droguerias',
            'Fruver' => 'Fruver',
            'Gimnasio/Centro Deportivo' => 'Gimnasio/Centro Deportivo',
            'Guarderia / Jardin / Preescola' => 'Guarderia / Jardin / Preescola',
            'Hipermercado' => 'Hipermercado',
            'Hotel' => 'Hotel',
            'Instit. Públicas' => 'Instit. Públicas',
            'Institucion Financiera' => 'Institucion Financiera',
            'Kioscos/Casetas/Chazas/Carreta' => 'Kioscos/Casetas/Chazas/Carreta',
            'Licorera' => 'Licorera',
            'Mayorista' => 'Mayorista',
            'Mayorista' => 'Mayorista',
            'Minimercados' => 'Minimercados',
            'Miscelanea' => 'Miscelanea',
            'Obra Civil' => 'Obra Civil',
            'Oficinas Mixtas' => 'Oficinas Mixtas',
            'Oficinas Particulares' => 'Oficinas Particulares',
            'Panaderia' => 'Panaderia',
            'Parque Diversines' => 'Parque Diversines',
            'Parroquias / Comunidades Relig' => 'Parroquias / Comunidades Relig',
            'Persona Natural' => 'Persona Natural',
            'Porterias' => 'Porterias',
            'Puestos De Revistas/Librerias' => 'Puestos De Revistas/Librerias',
            'Restaurante Estandar' => 'Restaurante Estandar',
            'Salsamentaria' => 'Salsamentaria',
            'Superetes' => 'Superetes',
            'Supermercado Independiente' => 'Supermercado Independiente',
            'Supermercado Regional' => 'Supermercado Regional',
            'Supermercados' => 'Supermercados',
            'Talleres Mecanicos/Lavaderos' => 'Talleres Mecanicos/Lavaderos',
            'Tienda Abarrotera' => 'Tienda Abarrotera',
            'Tienda Domicilios' => 'Tienda Domicilios',
            'Tienda Snackera' => 'Tienda Snackera',
            'Tiendas / Minimercados' => 'Tiendas / Minimercados',
            'Transportador' => 'Transportador',

        ];

        $puntos_auditoria = Tipologia::findOrFail($id);
        $datos = PuntosAuditoria::select('tipologia')->where('id', $puntos_auditoria->precarga_id)->get()->pluck('tipologia');
        return view('auditoria.newTipologia', compact('tipologia', 'puntos_auditoria', 'datos', 'otros'));
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
                    'OtraTipologia' => $request->OtraTipologia,
                    'fototipologia' => 'auditorias_pics/tipologia' . $nombreTipologia,
                    'criticidad' => 'paso 2 - tipologia',
                ]
            );
            $id =  $tipologia->precarga_id;
            $concretado = PuntosAuditoria::findOrFail($id);
            $concretado->estatusGestion = 'paso 2 - tipologia';
            $concretado->save();
        } else if ($request->state_tipologia == 'tipologia_si') {

            $tipologia->update(
                [
                    'state_tipologia' => $request->state_tipologia,
                    'tipologia' => $datos,
                    'fototipologia' => 'auditorias_pics/tipologia' . $nombreTipologia,
                    'criticidad' => 'paso 2 - tipologia',
                ]
            );
            $id =  $tipologia->precarga_id;
            $concretado = PuntosAuditoria::findOrFail($id);
            $concretado->estatusGestion = 'paso 2 - tipologia';
            $concretado->save();
        }
        return redirect('segmento');
    }
}
