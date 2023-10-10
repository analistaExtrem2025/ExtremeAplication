<?php

namespace App\Http\Controllers;

use App\Models\Encuestas;
use App\Models\Quality;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now();
        $today = Carbon::parse($today);
        $role = auth()->user()->role;
        if ($role == 3 ||  $role == 1 ) {
            $encuestas = Encuestas::where('estadoEnvio', 'Devuelto')->orWhere('estadoEnvio', 'Pendiente Gestion Calidad')->get();
            return view('quality.index', compact('encuestas'));
        }
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
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quality $quality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quality $quality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quality $quality)
    {
        //
    }
}
