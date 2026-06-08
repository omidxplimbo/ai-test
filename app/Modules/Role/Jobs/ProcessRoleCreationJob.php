<?php

namespace App\Modules\Role\Jobs;

use App\Modules\Role\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessRoleCreationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Role $role
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Implement business logic for role creation processing here
        // For example: clearing caches, sending notifications, etc.
    }
}
