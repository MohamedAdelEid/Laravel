<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="min-h-screen">
        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-5xl px-4 py-4">
                <a href="{{ route('posts.index') }}" class="text-xl font-semibold text-slate-900">Posts CRUD</a>
            </div>
        </header>
        <main class="mx-auto max-w-5xl px-4 py-8">
            @if (session('success'))
                <div class="mb-6 rounded-md bg-emerald-100 px-4 py-3 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
