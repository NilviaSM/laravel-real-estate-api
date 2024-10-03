<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    
   // Listar todas las personas
public function index(Request $request)
{
    $query = Persona::query();
    
    // Filtro por nombre 
    if ($request->filled('nombre')) {
        $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
    }

    // Filtro por email
    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->input('email') . '%');
    }

    // Filtro por teléfono
    if ($request->filled('telefono')) {
        $query->where('telefono', 'like', '%' . $request->input('telefono') . '%');
    }

    // Paginación de 10 elementos por página
    $personas = $query->paginate(10);
    
    // Manejo de errores: si no se encuentran personas
    if ($personas->isEmpty()) {
        return response()->json(['message' => 'No se encontraron personas que coincidan con los criterios de búsqueda.'], 404);
    }

    return response()->json($personas);
}

    

    // Crear una nueva persona
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email',
            'telefono' => 'required|string|max:15',
        ]);

        return Persona::create($request->all());
    }

    // Mostrar una persona por su ID
    public function show($id)
    {
        return Persona::findOrFail($id);
    }

    // Actualizar una persona existente
    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);

        $request->validate([
            'nombre' => 'string|max:255',
            'email' => 'email|unique:personas,email,'.$id,
            'telefono' => 'string|max:15',
        ]);

        $persona->update($request->all());

        return $persona;
    }

    // Eliminar una persona
    public function destroy($id)
    {
        $deleted = Persona::destroy($id);
    
        // Verifica si se eliminó
        if ($deleted) {
            return response()->json(['message' => 'Persona eliminada correctamente'], 200);
        }
    
        // Si no se encontró la persona, devuelve un mensaje de error
        return response()->json(['message' => 'Persona no encontrada'], 404);
    }
    
}
