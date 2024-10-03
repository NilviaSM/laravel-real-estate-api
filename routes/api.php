<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\SolicitudVisitaController;

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
    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });
});

// Rutas públicas para registro e inicio de sesión
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
});

Route::post('/login', function (Request $request) {
    $validated = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $user = \App\Models\User::where('email', $validated['email'])->first();

    if (! $user || ! \Illuminate\Support\Facades\Hash::check($validated['password'], $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
});
