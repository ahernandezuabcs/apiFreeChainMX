<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotociclistaController;
use App\Http\Controllers\PerfilClinicoMotociclistaController;
use App\Http\Controllers\MotocicletaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MesaDirectivaMotoclubController;






Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('motociclistas', MotociclistaController::class);
Route::resource('perfil_clinico_motociclistas', PerfilClinicoMotociclistaController::class);
Route::resource('motocicletas', MotocicletaController::class);
Route::resource('eventos', EventoController::class);
Route::resource('mesa_directiva', MesaDirectivaMotoclubController::class);