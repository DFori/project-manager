<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    $totalProjects = \App\Models\Project::count();
    $completedProjects = \App\Models\Project::where('status', 'completed')->count();
    $totalTasks = \App\Models\Task::count();
    $completedTasks = \App\Models\Task::where('status', 'completed')->count();

    return view('dashboard', compact('totalProjects', 'completedProjects', 'totalTasks', 'completedTasks'));
})->name('dashboard');

Route::resource('projects', ProjectController::class)->only(['index', 'create', 'store']);
Route::patch('projects/{project}/start', [ProjectController::class, 'start'])->name('projects.start');
Route::patch('projects/{project}/complete', [ProjectController::class, 'complete'])->name('projects.complete');

Route::resource('tasks', TaskController::class)->only(['index', 'create', 'store']);
Route::patch('tasks/{task}/start', [TaskController::class, 'start'])->name('tasks.start');
Route::patch('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');