<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        $personas = [
            ['Juan Pérez', 'juan.perez@example.com', '987654321'],
            ['Ana López', 'ana.lopez@example.com', '912345678'],
            ['Carlos Rodríguez', 'carlos.rodriguez@example.com', '935432123'],
            ['María González', 'maria.gonzalez@example.com', '912345679'],
            ['Pedro Fernández', 'pedro.fernandez@example.com', '923456789'],
            ['Laura Ramírez', 'laura.ramirez@example.com', '934567890'],
            ['Luis Gómez', 'luis.gomez@example.com', '945678901'],
            ['Claudia Herrera', 'claudia.herrera@example.com', '956789012'],
            ['Jorge Soto', 'jorge.soto@example.com', '967890123'],
            ['Lucía Méndez', 'lucia.mendez@example.com', '978901234'],
            ['Pablo Navarro', 'pablo.navarro@example.com', '987654322'],
            ['Valentina Rojas', 'valentina.rojas@example.com', '912345670'],
            ['Marcela Díaz', 'marcela.diaz@example.com', '935432124'],
            ['Ricardo Flores', 'ricardo.flores@example.com', '945678902'],
            ['Sofía Márquez', 'sofia.marquez@example.com', '956789013'],
            ['Fernando Castillo', 'fernando.castillo@example.com', '978901235'],
            ['Lorena Silva', 'lorena.silva@example.com', '987654323'],
            ['Sebastián Vera', 'sebastian.vera@example.com', '912345671'],
            ['Francisco Ortega', 'francisco.ortega@example.com', '935432125'],
            ['Mónica Valenzuela', 'monica.valenzuela@example.com', '945678903'],
            ['Felipe Álvarez', 'felipe.alvarez@example.com', '956789014'],
            ['Gabriela Carrasco', 'gabriela.carrasco@example.com', '978901236'],
            ['Patricio Fuentes', 'patricio.fuentes@example.com', '987654324'],
            ['Carmen Vargas', 'carmen.vargas@example.com', '912345672'],
            ['Alberto Reyes', 'alberto.reyes@example.com', '935432126'],
            ['Jessica Bravo', 'jessica.bravo@example.com', '945678904'],
            ['Matías Pizarro', 'matias.pizarro@example.com', '956789015'],
            ['Camila Orellana', 'camila.orellana@example.com', '978901237'],
            ['Ignacio Morales', 'ignacio.morales@example.com', '987654325'],
            ['Daniela Saavedra', 'daniela.saavedra@example.com', '912345673'],
            ['Enrique Leiva', 'enrique.leiva@example.com', '935432127'],
            ['Camila Soto', 'camila.soto@example.com', '945678905'],
            ['Tomás Núñez', 'tomas.nunez@example.com', '956789016'],
            ['Camila Espinoza', 'camila.espinoza@example.com', '978901238'],
        ];

        foreach ($personas as $persona) {
            Persona::create([
                'nombre' => $persona[0],
                'email' => $persona[1],
                'telefono' => $persona[2],
            ]);
        }
    }
}
