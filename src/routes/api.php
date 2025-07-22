<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::prefix('projects')->middleware('apikey')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'store']);
    Route::get('{id}', [ProjectController::class, 'show']);
    Route::put('{id}', [ProjectController::class, 'update']);
    Route::delete('{id}', [ProjectController::class, 'destroy']);
});

Route::prefix('tasks')->middleware('apikey')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    Route::post('/', [TaskController::class, 'store']);
    Route::get('{id}', [TaskController::class, 'show']);
    Route::put('{id}', [TaskController::class, 'update']);
    Route::delete('{id}', [TaskController::class, 'destroy']);
});
