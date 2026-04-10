<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased p-6 md:p-12">
    <nav class="max-w-6xl mx-auto mb-8 flex items-center justify-between">
        <div class="text-xl font-bold tracking-tight text-indigo-600">MyLab</div>
        <div class="gap-4 flex">
            <a href="{{ route('posts.index') }}" class="text-sm font-medium hover:text-indigo-600 {{ request()->routeIs('posts.*') ? 'text-indigo-600' : 'text-gray-600' }}">Posts</a>
            <a href="{{ route('users.index') }}" class="text-sm font-medium hover:text-indigo-600 {{ request()->routeIs('users.*') ? 'text-indigo-600' : 'text-gray-600' }}">Users</a>
        </div>
    </nav>
    <div class="max-w-4xl mx-auto">
        @if (session('success'))
        <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4 mb-8 shadow-sm">
            <div class="flex items-start gap-4">
                <span class="text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <div class="flex-1">
                    <strong class="block font-medium text-gray-900"> Success </strong>
                    <p class="mt-1 text-sm text-gray-700">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
