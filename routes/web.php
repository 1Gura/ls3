<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TasksController;

Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/create', [TasksController::class, 'create']);
Route::get('/tasks/{task}', [TasksController::class, 'show']);
Route::post('/tasks', [TasksController::class, 'store']);
Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
   return view('welcome');
});

