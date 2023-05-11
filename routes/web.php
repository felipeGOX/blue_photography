<?php

use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\FotografiasController;
use App\Http\Controllers\FotografosController;
use App\Http\Controllers\InvitacionController;
use App\Http\Controllers\InvitadoController;
use App\Http\Controllers\OrganizadoresController;
use App\Http\Controllers\PaquetesController;
use App\Models\Fotografias;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
    $str = Str::orderedUuid();
    dd($str, str_split($str, 13)[0]);
    $publicPath = public_path(Fotografias::getWatermarkImagePath());
    $imgPath = public_path('storage/images/evento/325732555_138001552189509_4093740861347866895_n.jpeg');
    $waterMark = Image::make($publicPath);
    $image = Image::make($imgPath);
    $image->insert($waterMark, 'center');
    $newPath = $image->save('public/watermark/evento' . Str::uuid() . ".jpg");
//    return view('adminlte');
//    dd($image);
//    return response()->file($publicPath);
    return response()->file(public_path($newPath));
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('evento')->group(function () {
        Route::resource('fotografia', FotografiasController::class);
    });

    Route::resource('organizador', OrganizadoresController::class);
    Route::resource('evento', EventosController::class);
    Route::resource('evento/catalogo', CatalogosController::class);

    Route::resource('fotografo', FotografosController::class);
    Route::resource('paquetes', PaquetesController::class);
//    Route::resource('fotografia', FotografiasController::class);

    Route::resource('invitado', InvitadoController::class);
    Route::resource('invitacion', InvitacionController::class);
});

