@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">🛠️ Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('posts._form')
        </form>
    </div>
@endsection