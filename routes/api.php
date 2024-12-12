<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotociclistaController;
use App\Http\Controllers\PerfilClinicoMotociclistaController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('motociclistas', MotociclistaController::class);
Route::resource('perfil_clinico_motociclistas', PerfilClinicoMotociclistaController::class);