<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    public function pdf($id)
    {
        $now = Carbon::now();
        $reporte = Auditoria::findOrFail($id);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        // view()->share('reporte', $reporte);
        // $pdf = PDF::loadview('myPDF', $reporte->toArray())->output();
        // return $pdf->stream();
       //   return $pdf->download();





        //  $pdf = PDF::loadview('myPDF');
        //  $pdf = PDF::loadHTML('<h1 style= "color:green">Test</h1>');
        //  return $pdf->stream();
        //  return $pdf->download();


    }





    // public function download ($auditoria Auditoria){

    //     $pdf = PDF::loadView('auditoria', ['auditoria' => $id]);
    //     return $pdf->download();
    // }
}
