@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="bg-white rounded-2xl shadow overflow-hidden max-w-3xl mx-auto">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-72 object-cover">
        @endif

        <div class="p-8">
            <h1 class="text-3xl font-extrabold mb-2">{{ $post->title }}</h1>
            <p class="text-sm text-slate-400 mb-6">
                Dibuat {{ $post->created_at->translatedFormat('d F Y, H:i') }}
            </p>
            <div class="leading-relaxed whitespace-pre-line">{{ $post->content }}</div>

            <div class="mt-8 flex gap-3">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 rounded-lg bg-slate-200 hover:bg-slate-300">← Kembali</a>
                <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 rounded-lg bg-yellow-400 hover:bg-yellow-500">Edit</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus post ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600">Hapus</button>
                </form>
            </div>
        </div>
    </article>
@endsection