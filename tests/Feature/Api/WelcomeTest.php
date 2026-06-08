<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /** @test */
    public function it_returns_a_success_status_and_correct_message(): void
    {
        $response = $this->getJson('/api/welcome');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'Hello from AI Pipeline!',
            ]);
    }
}
