@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="bg-primary hover:bg-primary-hover text-white px-4 py-2 rounded">Create New Task</a>
    </div>
    <div class="bg-white dark:text-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
        @foreach ($tasks as $task)
            <div class="flex justify-between items-center py-4 border-b dark:border-gray-700 last:border-b-0">
                <div>
                    <h3 class="text-lg font-semibold">{{ $task->name }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Project: {{ $task->project->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Due: {{ $task->due_date }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="px-2 py-1 text-xs rounded-full
                        @if($task->status == 'ongoing') bg-yellow-200 text-yellow-800
                        @elseif($task->status == 'completed') bg-green-200 text-green-800
                        @else bg-red-200 text-red-800 @endif">
                        {{ ucfirst($task->status) }}
                    </span>
                    @if ($task->status == 'pending')
                        <form action="{{ route('tasks.start', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-primary hover:bg-primary-hover text-white px-3 py-1 rounded text-sm">Start</button>
                        </form>
                    @elseif ($task->status == 'ongoing')
                        <form action="{{ route('tasks.complete', $task) }}" method="POST">
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