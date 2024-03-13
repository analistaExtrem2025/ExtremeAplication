<?php

namespace App\Http\Controllers;

use App\Models\dashPqr;
use App\Models\Pqr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashPqrController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $today = Carbon::now()->format('d-m-Y');
        $pqr = Pqr::whereNot('estatusRespuesta', 'Punto devuelto')
        ->whereNot('creado_por', 'MARIA ALEJANDRA LEMUS CASTIBLANCO')
        ->whereNot('creado_por', 'FLORALBA RINCON ROMERO')
        ->get();

        //dd($pqr[0]->created_at->diffInDays($today) );

        return view('dashPqr.index', compact(
            'today',
            'pqr'

        ));
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
    public function show(dashPqr $dashPqr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashPqr $dashPqr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashPqr $dashPqr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashPqr $dashPqr)
    {
        //
    }
}
