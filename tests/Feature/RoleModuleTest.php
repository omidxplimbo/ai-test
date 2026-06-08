<?php

namespace Tests\Feature;

use App\Modules\Role\Models\Role;
use App\Modules\Role\Jobs\ProcessRoleCreationJob;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class RoleModuleTest extends TestCase
{
    /**
     * Test the role creation endpoint.
     *
     * @return void
     */
    public function test_role_creation_endpoint_returns_201_and_dispatches_job()
    {
        // 1. Mock the Queue to prevent actual job execution and allow assertion
        Queue::fake();

        // 2. Prepare the request payload
        $payload = [
            'name' => 'Super Admin',
        ];

        // 3. Send the POST request to the API endpoint
        $response = $this->postJson('/api/roles', $payload);

        // 4. Assert the response status is 201 (Created)
        $response->assertStatus(201);

        // 5. Assert the response JSON structure contains the role data
        $response->assertJsonFragment([
            'name' => 'Super Admin',
        ]);

        // 6. Assert the role was actually created in the database
        $this->assertDatabaseHas('roles', [
            'name' => 'Super Admin',
            'slug' => 'super-admin', // Verify auto-generated slug
        ]);

        // 7. Assert the job was dispatched exactly once
        Queue::assertDispatched(ProcessRoleCreationJob::class, function ($job) {
            return $job->role->name === 'Super Admin';
        });
    }
}
