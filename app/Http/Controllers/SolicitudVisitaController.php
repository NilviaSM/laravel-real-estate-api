<?php

namespace App\Http\Controllers;

use App\Models\SolicitudVisita;
use Illuminate\Http\Request;

class SolicitudVisitaController extends Controller
{
    // Listar todas las solicitudes de visita
    public function index(Request $request)
    {
        $query = SolicitudVisita::with(['persona', 'propiedad']); // Incluimos las relaciones
        
        // Filtro por persona
        if ($request->filled('persona_id')) {
            $query->where('persona_id', $request->input('persona_id'));
        }

        // Filtro por propiedad
        if ($request->filled('propiedad_id')) {
            $query->where('propiedad_id', $request->input('propiedad_id'));
        }

        // Filtro por fecha de visita
        if ($request->filled('fecha_visita')) {
            $query->where('fecha_visita', $request->input('fecha_visita'));
        }
        
        // Paginación
        $solicitudes = $query->paginate(10);
        
        // Manejo de errores: si no se encuentran solicitudes
        if ($solicitudes->isEmpty()) {
            return response()->json(['message' => 'No se encontraron solicitudes de visita que coincidan con los criterios de búsqueda.'], 404);
        }

        return response()->json($solicitudes);
    }

    // Crear una nueva solicitud de visita
    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'propiedad_id' => 'required|exists:propiedades,id',
            'fecha_visita' => 'required|date',
            'comentarios' => 'nullable|string',
        ]);

        return SolicitudVisita::create($request->all());
    }

    // Mostrar una solicitud de visita por su ID
    public function show($id)
    {
        return SolicitudVisita::with(['persona', 'propiedad'])->findOrFail($id);
    }

    // Actualizar una solicitud de visita existente
    public function update(Request $request, $id)
    {
        $solicitud = SolicitudVisita::findOrFail($id);

        $request->validate([
            'persona_id' => 'exists:personas,id',
            'propiedad_id' => 'exists:propiedades,id',
            'fecha_visita' => 'date',
            'comentarios' => 'nullable|string',
        ]);

        $solicitud->update($request->all());

        return $solicitud;
    }

    // Eliminar una solicitud de visita
    public function destroy($id)
    {
        return SolicitudVisita::destroy($id);
    }
}

