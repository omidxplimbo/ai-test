<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\OmidController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', [HealthCheckController::class, 'index']);

Route::get('/omid', [OmidController::class, 'index']);

Route::post('/task', [TaskController::class, 'store'])
    ->middleware('task.pass-through')
    ->name('task.store');
