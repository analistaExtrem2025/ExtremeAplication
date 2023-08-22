<?php

namespace App\Http\Controllers;

use App\Models\Encuestas;
use App\Models\Reemplazo;
use Illuminate\Http\Request;

class ReemplazoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encuestas = Encuestas::where('fotoactiv', 'like', '%/tmp/%')->get();

        return view('reemplazo.index', compact('encuestas'));
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
        $encuestas = Encuestas::findOrFail('$id');


        return view('reemplazo.edit', compact('encuestas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $encuestas = Encuestas::findOrFail('$id');


        return view('reemplazo.edit', compact('encuestas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Busco el id en repo_table
        $encuestas = Encuestas::findOrFail($id);
        $data = $request->only(
            'fotoActiv',
            'codigo',
        );
        // Valido si el check es igual a 1 lo que significa que se subió un nuevo archivo
        if ($request->hasfile('fotoActiv')) {
            // Guardo el archivo en la carpeta Publica Uploads y obtengo la ubicacion
            $filepath = $request->file('fotoActiv')->storeAs('clienteFemsa', $encuestas->fotoActiv . '.jpg', 'public');
            $data['fotoActiv'] = $filepath;
        }
        $encuestas->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reemplazo $reemplazo)
    {
        //
    }
}
