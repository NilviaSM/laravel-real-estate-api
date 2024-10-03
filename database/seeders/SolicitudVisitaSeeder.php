<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\Propiedad;
use App\Models\SolicitudVisita;
use Illuminate\Database\Seeder;

class SolicitudVisitaSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de que existen personas y propiedades antes de insertar las solicitudes de visita
        $personas = Persona::factory()->count(6)->create();
        $propiedades = Propiedad::factory()->count(6)->create();

        $solicitudes = [
            [$personas[0]->id, $propiedades[0]->id, '2024-10-10', 'Interesado en conocer el departamento'],
            [$personas[1]->id, $propiedades[1]->id, '2024-10-11', 'Visita programada por la tarde'],
            [$personas[2]->id, $propiedades[2]->id, '2024-10-12', 'Cliente muy interesado en el jardín'],
            [$personas[3]->id, $propiedades[3]->id, '2024-10-13', 'Interesado en la vista nororiente'],
            [$personas[4]->id, $propiedades[4]->id, '2024-10-14', 'Buena ubicación, cliente muy interesado'],
            [$personas[5]->id, $propiedades[5]->id, '2024-10-15', 'Cerca de parques, excelente para la familia'],
        ];

        foreach ($solicitudes as $solicitud) {
            SolicitudVisita::create([
                'persona_id' => $solicitud[0],
                'propiedad_id' => $solicitud[1],
                'fecha_visita' => $solicitud[2],
                'comentarios' => $solicitud[3],
            ]);
        }
    }
}
