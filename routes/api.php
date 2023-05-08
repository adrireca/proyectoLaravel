<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    //
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/users', UserController::class);
});

//Obtenemos las pistas.
Route::get('/pistas', [\App\Http\Controllers\Api\ControllerPistas::class,'index']);

//Mostrar una pista
Route::get('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'show']);

//Creamos una pista.
Route::post('/pistas', [\App\Http\Controllers\Api\ControllerPistas::class,'store'])->name('guardarPista');

//Modificamos una pista.
Route::put('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'update']);
Route::patch('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'update']);

//Eliminamos una pista.
Route::delete('/pistas/{pista}', [\App\Http\Controllers\Api\ControllerPistas::class, 'destroy']);



//
Route::post('/signup', [AuthController::class, 'signup']);

//
Route::post('/login', [AuthController::class, 'login']);
