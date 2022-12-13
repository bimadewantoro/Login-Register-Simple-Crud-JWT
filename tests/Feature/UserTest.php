<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    private function authorize()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $this->withHeader('Authorization', 'Bearer ' . $token);
    }

    public function testGetUser ()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/user');

        $response->assertStatus(200);
    }

    public function testGetUserbyId ()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/user/' . $user->id);

        $response->assertStatus(200);
    }

    public function testGetUserbyIdFail ()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/user/' . ($user->id + 1));

        $response->assertStatus(400);
    }
}
