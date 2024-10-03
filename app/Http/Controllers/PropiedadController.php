<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
// Listar todas las propiedades
public function index(Request $request)
{
    $query = Propiedad::query();

    // Filtrar por comuna 
    if ($request->filled('comuna')) {
        $query->where('comuna', $request->input('comuna'));
    }

    // Filtrar por ciudad 
    if ($request->filled('ciudad')) {
        $query->where('ciudad', $request->input('ciudad'));
    }

    // Filtrar por rango de precios mínimos y máximos
    if ($request->filled('precio_min') && $request->filled('precio_max')) {
        $query->whereBetween('precio', [$request->input('precio_min'), $request->input('precio_max')]);
    } elseif ($request->filled('precio_min')) {
        $query->where('precio', '>=', $request->input('precio_min'));
    } elseif ($request->filled('precio_max')) {
        $query->where('precio', '<=', $request->input('precio_max'));
    }

    // Paginación de 10 elementos por página
    $propiedades = $query->paginate(10);

    // Manejo de errores: si no se encuentran propiedades
    if ($propiedades->isEmpty()) {
        return response()->json(['message' => 'No se encontraron propiedades que coincidan con los criterios de búsqueda.'], 404);
    }

    return response()->json($propiedades);
}

    
    


    // Crear una nueva propiedad
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        return Propiedad::create($request->all());
    }

    // Mostrar una propiedad por su ID
    public function show($id)
    {
        return Propiedad::findOrFail($id);
    }

    // Actualizar una propiedad existente
    public function update(Request $request, $id)
    {
        $propiedad = Propiedad::findOrFail($id);

        $request->validate([
            'direccion' => 'string|max:255',
            'ciudad' => 'string|max:255',
            'precio' => 'numeric',
            'descripcion' => 'nullable|string',
        ]);

        $propiedad->update($request->all());

        return $propiedad;
    }

    // Eliminar una propiedad
    public function destroy($id)
    {
        return Propiedad::destroy($id);
    }
}
