<?php

use App\Modules\Role\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::post('/roles', [RoleController::class, 'store']);
