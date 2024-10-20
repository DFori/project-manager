<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'due_date' => 'required|date',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function start(Project $project)
    {
        $project->update(['status' => 'ongoing']);
        return redirect()->route('projects.index')->with('success', 'Project started.');
    }

    public function complete(Project $project)
    {
        $project->update(['status' => 'completed']);
        $project->tasks()->update(['status' => 'completed']);
        return redirect()->route('projects.index')->with('success', 'Project completed.');
    }
}