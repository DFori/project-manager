<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'due_date' => 'required|date',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function start(Task $task)
    {
        $task->update(['status' => 'ongoing']);
        return redirect()->route('tasks.index')->with('success', 'Task started.');
    }

    public function complete(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->route('tasks.index')->with('success', 'Task completed.');
    }
}