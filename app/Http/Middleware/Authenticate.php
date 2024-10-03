<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta a la que se debe redirigir al usuario cuando no está autenticado.
     */
    protected function redirectTo(Request $request): ?string
    {
        // No redirige, ya que se trata de una API.
        return $request->expectsJson() ? null : null;
    }

    /**
     * Maneja las solicitudes no autenticadas.
     */
    protected function unauthenticated($request, array $guards)
    {
        // Si es una solicitud JSON (API), devuelve un mensaje de error personalizado
        if ($request->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'message' => 'No tienes acceso. Por favor, asegúrate de estar autenticado.',
            ], 401));
        }

        // Para otras solicitudes (no aplicable a APIs), no se redirige
        return null;
    }
}
