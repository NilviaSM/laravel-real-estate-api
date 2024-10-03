<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Creación del usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    
        // Generación del token
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 201);
    }
    
    public function login(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $validated['email'])->first();
    
        // Verificación de credenciales
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Credencial inválida'], 401);
        }
    
        // Generación del token
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);
    }
    
}
