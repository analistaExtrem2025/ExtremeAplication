<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AsignacionesController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\CalidadAuditoriaController;
use App\Http\Controllers\ComparativoMarcasController;
// use App\Http\Controllers\DashboardAuditoriasController;
use App\Http\Controllers\DiageoActivadosController;
use App\Http\Controllers\DiageoCerradosController;
use App\Http\Controllers\DiageoClienteFemsaController;
use App\Http\Controllers\DiageoNoActivadosController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\ExportPdfController;
use App\Http\Controllers\GeneralidadesController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\PqryRtasController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\ReemplazoController;
use App\Http\Controllers\SegmentoController;
use App\Http\Controllers\TapadosController;
use App\Http\Controllers\TipologiaController;
// use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Auth::routes();

Route::get(
    '/home',
    [
        App\Http\Controllers\HomeController::class,
        'index'
    ]
)->name('home');


Route::get(
    '/auditorias-list-excel',
    [
        App\Http\Controllers\HomeController::class,
        'exportExcel'
    ]
)->name('auditorias.excel');

Route::get(
    '/puntos-list-excel',
    [
        App\Http\Controllers\HomeController::class,
        'exportPuntosExcel'
    ]
)->name('puntos.excel');





Route::resource('users', UserController::class)->only(['index', 'edit', 'update']);
Route::post('cerrados', [EncuestaController::class, 'cerrados'])
    ->name('cerrados');
Route::post(
    'encuestas.noconcretados',
    [
        EncuestaController::class, 'encuesta.noconcretados'
    ]
)
    ->name('encuesta.noconcretados');
Route::resource('qualitys', QualityController::class)->names('quality');
Route::resource('encuestas', EncuestaController::class)->names('encuesta.diageo');
Route::resource('diageo_cerrados', DiageoCerradosController::class);
Route::resource('diageo_activados', DiageoActivadosController::class);
Route::resource('diageo_noactivados', DiageoNoActivadosController::class);
Route::resource('reemplazo', ReemplazoController::class)
    ->names('encuesta.reemplazo');
Route::resource('diageo_clienteFemsa', DiageoClienteFemsaController::class);
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('auditoria', AuditoriaController::class);
Route::resource('tipologia', TipologiaController::class);
Route::resource('segmento', SegmentoController::class);
Route::resource('materiales', MaterialesController::class);
Route::resource('disponibilidad', DisponibilidadController::class);
Route::resource('comparativo', ComparativoMarcasController::class);
Route::resource('tapados', TapadosController::class);
Route::resource('exhibicion', ExhibicionController::class);
Route::resource('gifts', GiftsController::class);
Route::resource('generalidades', GeneralidadesController::class);
Route::resource('pdfExport', ExportPdfController::class);
Route::resource('Galeria', CalidadAuditoriaController::class);
Route::get('inactivos', [CalidadAuditoriaController::class, 'inactivos'])->name('inactivos');
Route::resource('asignaciones', AsignacionesController::class);
Route::get('downloadPdf/{id}', [ExportPdfController::class, 'downloadPdf'])->name('downloadPdf');

Route::get('indexVisitor', [AuditoriaController::class, 'indexVisitor'])->name('indexVisitor');
Route::post('storeVisitor', [AuditoriaController::class, 'storeVisitor'])->name('storeVisitor');

Route::resource('pdf', ExportPdfController::class);

Route::get('notificacionEdit/{id}', [HomeController::class, 'notificacionEdit'])->name('notificacionEdit');
Route::put('notificacionStore', [AuditoriaController::class, 'notificacionStore'])->name('auditorias.notificacionStore');
Route::resource('PqryRtas', PqryRtasController::class);


