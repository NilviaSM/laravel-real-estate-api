<?php

namespace Tests\Feature;

use App\Models\Persona;
use App\Models\User; // Asegúrate de importar el modelo User
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonaTest extends TestCase
{
    //use RefreshDatabase;

    protected $user; // Variable para almacenar el usuario autenticado

    protected function setUp(): void
    {
        parent::setUp();

        // Crear un usuario y actuar como él
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function test_can_list_personas()
    {
        // Crear 5 personas directamente en la prueba
        Persona::factory()->count(5)->create();

        $response = $this->getJson('/api/personas');
    
        $response->assertStatus(200)
                 ->assertJsonCount(5, 'data');
    }
    public function test_can_create_persona()
    {
        $data = [
            'nombre' => 'Ana López',
            'email' => 'ana.lopez@example.com',
            'telefono' => '987654321',
        ];

        $response = $this->postJson('/api/personas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Ana López']);
    }

    public function test_can_update_persona()
    {
        $persona = Persona::factory()->create();

        $data = [
            'telefono' => '123456789',
        ];

        $response = $this->putJson("/api/personas/{$persona->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['telefono' => '123456789']);
    }

    public function test_can_delete_persona()
    {
        $persona = Persona::factory()->create();

        $response = $this->deleteJson("/api/personas/{$persona->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('personas', ['id' => $persona->id]);
    }
}
