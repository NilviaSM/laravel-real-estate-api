<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropiedadFactory extends Factory
{
    protected $model = Propiedad::class;

    public function definition(): array
    {
        return [
            'direccion' => $this->faker->streetAddress,
            'comuna' => $this->faker->city,
            'ciudad' => 'Santiago',
            'precio' => $this->faker->randomFloat(2, 5000, 20000),
            'descripcion' => $this->faker->sentence,
        ];
    }
}
