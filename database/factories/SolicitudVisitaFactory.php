<?php

namespace Database\Factories;

use App\Models\SolicitudVisita;
use App\Models\Persona;
use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudVisitaFactory extends Factory
{
    protected $model = SolicitudVisita::class;

    public function definition(): array
    {
        return [
            'persona_id' => Persona::factory(),
            'propiedad_id' => Propiedad::factory(),
            'fecha_visita' => $this->faker->date(),
            'comentarios' => $this->faker->sentence,
        ];
    }
}
