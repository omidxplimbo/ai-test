<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OmidRouteTest extends TestCase
{
    /**
     * Test that the /omid route returns a successful response.
     *
     * @return void
     */
    public function test_omid_route_returns_success()
    {
        $response = $this->get('/omid');

        $response->assertStatus(200);
    }

    /**
     * Test that the /omid route contains expected content.
     *
     * @return void
     */
    public function test_omid_route_contains_expected_content()
    {
        $response = $this->get('/omid');

        $response->assertStatus(200);
        $response->assertSee('Welcome to Omid Page');
        $response->assertSee('This page is protected by omid_middleware.');
    }

    /**
     * Test that the OmidController index method works correctly.
     *
     * @return void
     */
    public function test_omid_controller_returns_correct_view()
    {
        $response = $this->get('/omid');

        $response->assertStatus(200);
        $response->assertViewIs('omid');
    }
}
