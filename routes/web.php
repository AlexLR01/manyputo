<?php

use App\Http\Controllers\TablaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/',[TablaController::class, 'index'])->name('tabla.index');
Route::post('/guardar',[TablaController::class, 'guardar'])->name('tabla.guardar');
Route::post('/borrar', [TablaController::class, 'borrar'])->name('tabla.borrar');
Route::post('/agregar', [TablaController::class, 'agregar'])->name('tabla.agregar');
Route::put('/abonar', [TablaController::class, 'abonar'])->name('tabla.abonar');

