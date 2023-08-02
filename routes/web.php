<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CerradosController;
use App\Http\Controllers\DiageoActivadosController;
use App\Http\Controllers\DiageoCerradosController;
use App\Http\Controllers\DiageoClienteFemsaController;
use App\Http\Controllers\DiageoNoActivadosController;
use App\Http\Controllers\EncuestaController;
use Illuminate\Support\Facades\Auth;

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


Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])
    ->names('admin.users');

Route::post('cerrados', [EncuestaController::class, 'cerrados'])
    ->name('cerrados');
Route::post(
    'encuestas.noconcretados',
    [
        EncuestaController::class, 'encuesta.noconcretados'
    ]
)
    ->name('encuesta.noconcretados');
Route::resource('encuestas', EncuestaController::class)->names('encuesta.diageo');

Route::resource('diageo_cerrados', DiageoCerradosController::class);
Route::resource('diageo_activados', DiageoActivadosController::class);
Route::resource('diageo_noactivados', DiageoNoActivadosController::class);
Route::resource('diageo_clienteFemsa', DiageoClienteFemsaController::class);



Route::resource('roles', RoleController::class)->names('admin.roles');
