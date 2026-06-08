<?php

namespace App\Modules\Role\Http\Controllers;

use App\Modules\Role\Jobs\ProcessRoleCreationJob;
use App\Modules\Role\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        // Dispatch job to queue
        ProcessRoleCreationJob::dispatch($role);

        return response()->json([
            'data' => $role,
        ], 201);
    }
}
