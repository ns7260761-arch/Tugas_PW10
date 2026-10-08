@props(['post'])

<div class="bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden flex flex-col">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-44 w-full object-cover">
    @else
        <div class="h-44 bg-gradient-to-br from-indigo-400 to-pink-400 flex items-center justify-center text-5xl">📝</div>
    @endif

    <div class="p-5 flex-1 flex flex-col">
        <h3 class="text-lg font-bold mb-2">{{ $post->title }}</h3>
        <p class="text-slate-600 text-sm flex-1">{{ Str::limit($post->content, 100) }}</p>
        <p class="text-xs text-slate-400 mt-3">{{ $post->created_at->diffForHumans() }}</p>

        <div class="mt-4 flex gap-2">
            {{ $slot }}
        </div>
    </div>
</div>