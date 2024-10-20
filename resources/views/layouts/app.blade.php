<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProjectPro</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <div class="flex min-h-screen">
        <nav class="w-64 bg-nav-bg text-nav-text p-6">
            <h1 class="text-2xl font-semibold mb-8">ProjectPro</h1>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:text-primary {{ request()->routeIs('dashboard') ? 'text-primary' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3 w-5"></i>
                        Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('projects.index') }}" class="flex items-center hover:text-primary {{ request()->routeIs('projects.*') ? 'text-primary' : '' }}">
                        <i class="fas fa-project-diagram mr-3 w-5"></i>
                        Projects
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('tasks.index') }}" class="flex items-center hover:text-primary {{ request()->routeIs('tasks.*') ? 'text-primary' : '' }}">
                        <i class="fas fa-tasks mr-3 w-5"></i>
                        Tasks
                    </a>
                </li>
            </ul>
            <button id="theme-toggle" class="mt-8 border border-nav-text px-4 py-2 rounded hover:bg-nav-text hover:text-nav-bg transition-colors">
                <i class="fas fa-moon mr-2"></i>
                Toggle Dark Mode
            </button>
        </nav>
        <main class="flex-grow p-8">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>