<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\SolicitudVisitaController;
use App\Http\Controllers\Auth\AuthController; // Importar el controlador de autenticación

// Ruta para obtener el usuario autenticado (protegida por Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Agrupar rutas protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Rutas para el CRUD de Persona
    Route::apiResource('personas', PersonaController::class);

    // Rutas para el CRUD de Propiedad
    Route::apiResource('propiedades', PropiedadController::class);

    // Rutas para el CRUD de Solicitud de Visita
    Route::apiResource('solicitudes-visita', SolicitudVisitaController::class);

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Rutas públicas para registro e inicio de sesión
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
