<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditoriasExport;
use App\Exports\PuntosExport;
use App\Models\Auditoria;
use App\Models\Pqr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $auditoria = Auditoria::all();
        return view('home', compact('auditoria'));
    }

    public function exportExcel()
    {

        return Excel::download(new AuditoriasExport, 'auditorias-list.xlsx');
    }

    public function exportPuntosExcel()
    {

        return Excel::download(new PuntosExport, 'puntos-list.xlsx');
    }


    public function notificacionEdit($id)
    {
        $pqr = Pqr::findOrFail($id);


        return view('notificacionEdit', compact('pqr'));
    }


}
