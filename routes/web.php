<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/pistas', [\App\Http\Controllers\PistasController::class,'index']);

Route::get('/pistas/{pista}', [\App\Http\Controllers\PistasController::class, 'show']);

Route::post('/pistas', [\App\Http\Controllers\PistasController::class,'store'])->name('guardarPista');

Route::get('/crear-pista', [\App\Http\Controllers\PistasController::class,'create']);

Route::get('/modificar-pista/{pista}', [\App\Http\Controllers\PistasController::class,'edit']);

Route::put('/pistas/{pista}', [\App\Http\Controllers\PistasController::class, 'update']);
Route::patch('/pistas/{pista}', [\App\Http\Controllers\PistasController::class, 'update']);

Route::delete('/pistas/{pista}', [\App\Http\Controllers\PistasController::class, 'destroy']);
