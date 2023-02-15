<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pistas', [\App\Http\Controllers\Api\ControllerPistas::class,'index']);

Route::get('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'show']);

Route::post('/pistas', [\App\Http\Controllers\Api\ControllerPistas::class,'store'])->name('guardarPista');

Route::get('/crear-pista', [\App\Http\Controllers\Api\ControllerPistas::class,'create']);

Route::get('/modificar-pista/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class,'edit']);

Route::put('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'update']);
Route::patch('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'update']);

Route::delete('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'destroy']);
