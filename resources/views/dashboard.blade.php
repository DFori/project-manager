@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Total Projects</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalProjects }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Completed Projects</h3>
            <p class="text-3xl font-bold text-primary">{{ $completedProjects }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Total Tasks</h3>
            <p class="text-3xl font-bold text-primary">{{ $totalTasks }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Completed Tasks</h3>
            <p class="text-3xl font-bold text-primary">{{ $completedTasks }}</p>
        </div>
    </div>
@endsection