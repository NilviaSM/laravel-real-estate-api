<?php

namespace Tests\Feature;

use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['access_token', 'token_type']); // Cambiar 'token' por 'access_token' y 'token_type'
    }

    /** @test */
    public function user_can_login()
    {
        // Crea un usuario
        $user = User::factory()->create(['password' => bcrypt('password')]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure(['access_token', 'token_type']); // Cambiar 'token' por 'access_token' y 'token_type'
    }

    /** @test */
    public function authenticated_user_can_access_protected_route()
    {
        $user = User::factory()->create();

        // Cambia '/api/protected-route' por una ruta que tengas definida y que sea accesible
        $response = $this->actingAs($user)
                         ->getJson('/api/user'); // Por ejemplo, puedes usar la ruta que devuelve el usuario autenticado

        $response->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_protected_route()
    {
        // Cambia esto al endpoint que quieras probar
        $response = $this->getJson('/api/user'); // Por ejemplo, usando la misma ruta que el método anterior

        $response->assertStatus(401);
    }
}
