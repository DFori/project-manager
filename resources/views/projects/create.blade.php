@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Create New Project</h2>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Project Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-gray-700 focus:ring-primary focus:border-primary" required>
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Due Date</label>
                <input type="date" name="due_date" id="due_date" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none text-gray-700 focus:ring-primary focus:border-primary" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-gray-700 hover:bg-primary-hover text-white px-4 py-2 rounded">Create Project</button>
            </div>
        </form>
    </div>
@endsection