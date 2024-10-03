<?php

namespace Tests\Feature;

use App\Models\Persona;
use App\Models\Propiedad;
use App\Models\SolicitudVisita;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class SolicitudVisitaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crea un usuario y actúa como él
        $this->actingAs(User::factory()->create());
    }

    public function test_can_list_solicitudes_visita()
    {
        SolicitudVisita::factory()->count(5)->create();

        $response = $this->getJson('/api/solicitudes-visita');

        $response->assertStatus(200)
                 ->assertJsonCount(5,'data');
    }

    public function test_can_create_solicitud_visita()
    {
        // Crear una persona y una propiedad antes de intentar crear la solicitud
        $persona = Persona::factory()->create();
        $propiedad = Propiedad::factory()->create();
    
        // Datos para la solicitud de visita
        $data = [
            'persona_id' => $persona->id,
            'propiedad_id' => $propiedad->id,
            'fecha_visita' => '2024-10-20',
            'comentarios' => 'Interesada en la propiedad',
        ];
    
        // Hacer la solicitud POST para crear la solicitud de visita
        $response = $this->postJson('/api/solicitudes-visita', $data);
    
        // Verificar que la respuesta sea 201 y que los datos se hayan creado correctamente
        $response->assertStatus(201)
                 ->assertJsonFragment(['fecha_visita' => '2024-10-20']);
    }

    public function test_can_update_solicitud_visita()
    {
        $solicitud = SolicitudVisita::factory()->create();

        $data = [
            'comentarios' => 'Nuevo comentario actualizado',
        ];

        $response = $this->putJson("/api/solicitudes-visita/{$solicitud->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['comentarios' => 'Nuevo comentario actualizado']);
    }

    public function test_can_delete_solicitud_visita()
    {
        $solicitud = SolicitudVisita::factory()->create();

        $response = $this->deleteJson("/api/solicitudes-visita/{$solicitud->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('solicitud_visitas', ['id' => $solicitud->id]);
    }
}
