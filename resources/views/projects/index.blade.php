@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Projects</h2>
        <a href="{{ route('projects.create') }}" class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded">Create New Project</a>
    </div>
    <div class="bg-white dark:text-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
        @foreach ($projects as $project)
            <div class="flex justify-between items-center py-4 border-b dark:border-gray-700 last:border-b-0">
                <div>
                    <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Tasks: {{ $project->tasks()->count() }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Due: {{ $project->due_date }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="px-2 py-1 text-xs rounded-full
                        @if($project->status == 'ongoing') bg-yellow-200 text-yellow-800
                        @elseif($project->status == 'completed') bg-green-200 text-green-800
                        @else bg-red-200 text-red-800 @endif">
                        {{ ucfirst($project->status) }}
                    </span>
                    @if ($project->status == 'pending')
                        <form action="{{ route('projects.start', $project) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-primary hover:bg-primary-hover text-white px-3 py-1 rounded text-sm">Start</button>
                        </form>
                    @elseif ($project->status == 'ongoing')
                        <form action="{{ route('projects.complete', $project) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-primary hover:bg-primary-hover text-white px-3 py-1 rounded text-sm">Complete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection