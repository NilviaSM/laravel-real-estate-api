<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // Campos asignables masivamente
    protected $fillable = ['nombre', 'email', 'telefono'];

    public function solicitudesVisita()
{
    return $this->hasMany(SolicitudVisita::class);
}

}
