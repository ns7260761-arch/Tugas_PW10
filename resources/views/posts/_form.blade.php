<div class="mb-5">
    <label for="title" class="block font-semibold mb-1">Judul</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}"
           class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('title') border-red-500 @else border-slate-300 @enderror">
    @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
    <label for="content" class="block font-semibold mb-1">Isi Post</label>
    <textarea id="content" name="content" rows="6"
              class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('content') border-red-500 @else border-slate-300 @enderror">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="image" class="block font-semibold mb-1">Gambar (opsional)</label>
    @if (!empty($post->image))
        <img src="{{ asset('storage/' . $post->image) }}" class="h-28 rounded-lg mb-2" alt="gambar saat ini">
    @endif
    <input type="file" id="image" name="image" accept="image/*"
           class="block w-full text-sm border border-slate-300 rounded-lg p-2 bg-white">
    @error('image')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-3">
    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Simpan</button>
    <a href="{{ route('posts.index') }}" class="px-6 py-2 rounded-lg bg-slate-200 hover:bg-slate-300">Batal</a>
</div>