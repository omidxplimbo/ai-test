<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * Test the /health route returns a successful response.
     *
     * @return void
     */
    public function testHealthRoute()
    {
        $response = $this->get('/health');

        $response->assertStatus(200);
        $response->assertSee('Application is Running');
    }
}
