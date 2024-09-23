<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarController;
use App\Http\Controllers\TragoController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtiquetaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class)->name('home');

Route::resource('/bars',BarController::class)->names('bar');
Route::get('bars/etiqueta/{etiqueta}',[BarController::class,'etiqueta'])->name('bar.etiqueta');

Route::resource('/tragos',TragoController::class)->names('trago');
Route::get('/tragos/etiqueta/{etiqueta}',[TragoController::class,'etiqueta'])->name('trago.etiqueta');

Route::resource('/tutorials',TutorialController::class)->names('tutorial');
Route::get('/tutorials/etiqueta/{etiqueta}',[TutorialController::class,'etiqueta'])->name('tutorial.etiqueta');

Route::resource('/users',UserController::class)->middleware(['can:user.index','auth'])->names('user');

Route::resource('/etiquetas',EtiquetaController::class)->names('etiqueta');


require __DIR__.'/auth.php';
