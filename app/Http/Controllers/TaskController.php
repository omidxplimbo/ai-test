<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessTaskJob;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Handle the incoming task request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Dispatch the job to the queue
        ProcessTaskJob::dispatch();

        return response()->json([
            'message' => 'Task has been submitted successfully.'
        ], 201);
    }
}