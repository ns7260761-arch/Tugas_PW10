<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog CRUD') | Blog CRUD Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen text-slate-800">

    <nav class="bg-gradient-to-r from-indigo-700 to-purple-700 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('posts.index') }}" class="text-white text-xl font-bold tracking-wide">
                ✍️ Blog<span class="text-pink-300">CRUD</span>
            </a>
            <a href="{{ route('posts.create') }}"
               class="bg-white text-indigo-700 font-semibold px-4 py-2 rounded-lg hover:bg-pink-100 transition">
                + Tulis Post
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif
        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-sm text-slate-500 py-6">
        Tugas Rutin 10 · Blog CRUD Laravel
    </footer>
</body>
</html>