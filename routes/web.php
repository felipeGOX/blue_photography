<?php

use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\OrganizadoresController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\FotografiasController;
use App\Http\Controllers\FotografosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaquetesController;
use App\Http\Controllers\InvitadoController;

use Mockery\Generator\StringManipulation\Pass\Pass;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return response()->redirectTo('/dashboard');
});
Route::get('/test', function () {
    return view('adminlte');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//aqui van todas las rutas de tus crud
Route::resource('organizador', OrganizadoresController::class);
Route::resource('evento',EventosController::class);
Route::resource('catalogo', CatalogosController::class);

Route::resource('fotografo',FotografosController::class);
Route::resource('paquetes',PaquetesController::class);
Route::resource('fotografia',FotografiasController::class);

Route::resource('invitado', InvitadoController::class);
Route::resource('invitacion', InvitacionController::class);

