<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    // Definir el nombre correcto de la tabla
    protected $table = 'propiedades';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = ['direccion', 'comuna', 'ciudad', 'precio', 'descripcion'];

    public function solicitudesVisita()
    {
        return $this->hasMany(SolicitudVisita::class);
    }
}
