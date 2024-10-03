<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudVisita extends Model
{
    use HasFactory;

    // Campos asignables masivamente
    protected $fillable = ['persona_id', 'propiedad_id', 'fecha_visita', 'comentarios'];

    // Relación con Persona
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    // Relación con Propiedad
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
}
