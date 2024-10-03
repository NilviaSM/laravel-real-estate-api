<?php

namespace Database\Seeders;

use App\Models\SolicitudVisita;
use Illuminate\Database\Seeder;

class SolicitudVisitaSeeder extends Seeder
{
    public function run(): void
    {
        $solicitudes = [
            [1, 1, '2024-10-10', 'Interesado en conocer el departamento'],
            [2, 2, '2024-10-11', 'Visita programada por la tarde'],
            [3, 3, '2024-10-12', 'Cliente muy interesado en el jardín'],
            [4, 4, '2024-10-13', 'Interesado en la vista nororiente'],
            [5, 5, '2024-10-14', 'Buena ubicación, cliente muy interesado'],
            [6, 6, '2024-10-15', 'Cerca de parques, excelente para la familia'],
           
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
