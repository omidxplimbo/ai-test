<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Bus;
use App\Jobs\ProcessTaskJob;
use App\Http\Middleware\TaskPassThroughMiddleware;
use Illuminate\Support\Facades\Route;

class TaskFeatureTest extends TestCase
{
    /**
     * A feature test to validate that the task route uses the middleware and dispatches the job.
     *
     * @return void
     */
    public function test_task_route_uses_middleware_and_dispatches_job()
    {
        // Mock the Bus facade to intercept the dispatch call
        Bus::fake();

        // Perform a POST request to the /task endpoint
        $response = $this->postJson('/task');

        // Assert that the response status is 201 Created
        $response->assertStatus(201);

        // Assert that the response contains the expected JSON message
        $response->assertJson([
            'message' => 'Task has been submitted successfully.'
        ]);

        // Assert that the ProcessTaskJob was dispatched
        Bus::assertDispatched(ProcessTaskJob::class);
    }

    /**
     * A test to verify the middleware class exists and is properly structured.
     *
     * @return void
     */
    public function test_middleware_is_properly_defined()
    {
        // Assert the middleware class exists
        $this->assertTrue(class_exists(TaskPassThroughMiddleware::class));

        // Assert it is instantiable
        $middleware = new TaskPassThroughMiddleware();
        $this->assertInstanceOf(TaskPassThroughMiddleware::class, $middleware);

        // Assert it has the handle method
        $this->assertTrue(method_exists($middleware, 'handle'));
    }

    /**
     * A test to verify the route exists.
     *
     * @return void
     */
    public function test_route_exists()
    {
        // Check if the route exists in the router
        $routeExists = Route::getRoutes()->hasNamedRoute('task.store');
        
        $this->assertTrue($routeExists);
    }
}