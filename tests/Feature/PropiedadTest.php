<?php

namespace Tests\Feature;

use App\Models\Propiedad;
use App\Models\User; // Importar el modelo User para la autenticación
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropiedadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear un usuario y actuar como él
        $this->user = User::factory()->create();
        $this->actingAs($this->user); // Autenticar al usuario
    }

    public function test_can_list_propiedades()
    {
        Propiedad::factory()->count(5)->create();

        $response = $this->getJson('/api/propiedades');

        $response->assertStatus(200)
                 ->assertJsonCount(5,'data');
    }

    public function test_can_create_propiedad()
    {
        $data = [
            'direccion' => 'Nueva Dirección',
            'comuna' => 'Providencia',
            'ciudad' => 'Santiago',
            'precio' => 7500,
            'descripcion' => 'Propiedad con excelente ubicación.',
        ];

        $response = $this->postJson('/api/propiedades', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['direccion' => 'Nueva Dirección']);
    }

    public function test_can_update_propiedad()
    {
        $propiedad = Propiedad::factory()->create();

        $data = [
            'precio' => 9000,
        ];

        $response = $this->putJson("/api/propiedades/{$propiedad->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['precio' => 9000]);
    }

    public function test_can_delete_propiedad()
    {
        $propiedad = Propiedad::factory()->create();

        $response = $this->deleteJson("/api/propiedades/{$propiedad->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('propiedades', ['id' => $propiedad->id]);
    }
}
