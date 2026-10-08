@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <h1 class="text-3xl font-extrabold">Semua Post</h1>

        <form action="{{ route('posts.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari judul atau isi..."
                   class="border border-slate-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Cari</button>
        </form>
    </div>

    @if ($posts->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-card :post="$post">
                    <a href="{{ route('posts.show', $post) }}"
                       class="text-sm bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg hover:bg-indigo-200">Lihat</a>
                    <a href="{{ route('posts.edit', $post) }}"
                       class="text-sm bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg hover:bg-yellow-200">Edit</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded-lg hover:bg-red-200">Hapus</button>
                    </form>
                </x-card>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @else
        <div class="text-center bg-white rounded-2xl p-12 shadow">
            <p class="text-5xl mb-3">🔍</p>
            <p class="text-slate-500">Belum ada post{{ request('search') ? ' yang cocok dengan pencarian.' : '.' }}</p>
        </div>
    @endif
@endsection