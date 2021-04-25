<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    private $password = "mypassword";

    /**
     * Basic user creation test
     *
     */
    public function testUserCreation()
    {

        $name = $this->faker->name();
        $email = $this->faker->email();

        $response = $this->postJson('/api/register', [
            'name' => $name,
            'email' => $email,
            'password' => $this->password,
            'password_confirmation' => $this->password
        ]);

        $response
            ->assertStatus(201)
            ->assertExactJson([
                'message' => "Successfully created user!",
            ]);
    }

    /**
     * Basic user login test
     *
     */
    public function testSuccessfulLogin()
    {
        $email = $this->faker->email();
        User::factory()->create([
            'email' => $email,
            'password' => bcrypt('sample123'),
        ]);

        $loginData = ['email' => $email, 'password' => 'sample123'];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);

        $this->assertAuthenticated();
    }
}
