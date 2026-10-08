<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(6)
            ->withQueryString(); // agar kata pencarian ikut saat pindah halaman

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages());

        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('posts', 'public');
            }
            Post::create($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan post. Silakan coba lagi.');
        }

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
    }

    // Route Model Binding: Laravel otomatis mencari Post berdasarkan {post}
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate($this->rules(), $this->messages());

        try {
            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::disk('public')->delete($post->image);
                }
                $data['image'] = $request->file('image')->store('posts', 'public');
            }
            $post->update($data);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui post.');
        }

        return redirect()->route('posts.show', $post)->with('success', 'Post berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete(); // soft delete, data masih ada di database
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus post.');
        }

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }

    private function rules(): array
    {
        return [
            'title'   => 'required|string|min:5|max:255',
            'content' => 'required|string|min:20',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    private function messages(): array
    {
        return [
            'title.required'   => 'Judul wajib diisi.',
            'title.min'        => 'Judul minimal 5 karakter.',
            'content.required' => 'Isi post wajib diisi.',
            'content.min'      => 'Isi post minimal 20 karakter.',
            'image.image'      => 'File harus berupa gambar.',
            'image.mimes'      => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'        => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}