@extends('layouts.app')

@section('title', 'Tulis Post')

@section('content')
    <div class="bg-white rounded-2xl shadow p-8 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">✏️ Tulis Post Baru</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('posts._form')
        </form>
    </div>
@endsection