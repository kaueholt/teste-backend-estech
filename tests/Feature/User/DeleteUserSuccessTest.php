<?php

namespace Tests\Feature\User;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class DeleteUserSuccessTest extends TestCase
{
    public function test_the_delete_user_endpoint_success(): void
    {
        $userData = User::factory()->make()->toArray();

        $userData['password'] = 'password123';
        $userData['recruiter'] = false;

        $response = $this->postJson('/api/users', $userData);

        $response->assertStatus(201);
        
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);

        unset($userData->name, $userData->email_verified_at, $userData->recruiter);

        $loginResponse = $this->post('/api/login', $userData);

        $loginResponse->assertStatus(200)
            ->assertJsonStructure([
                 'data' => [
                     'token',
                 ],
             ]);

        $token = $loginResponse->json('data.token');

        $user = User::latest()->firstOrFail();

        $protectedResponse = $this->withToken($token)->delete('/api/users', [
            'user_ids' => [$user->id]
        ]);

        $protectedResponse->assertStatus(200);
    }
}
