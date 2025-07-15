@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Berita: {{ $news->title }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT') {{-- Penting untuk metode PUT/PATCH di Laravel --}}

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita:</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $news->title) }}" required>
                @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Berita:</label>
                <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror">{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Utama (Biarkan kosong jika tidak ingin mengubah):</label>
                @if ($news->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita Saat Ini" class="w-32 h-24 object-cover rounded">
                        <p class="text-gray-600 text-xs mt-1">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="published_at" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Publikasi (Kosongkan untuk Draft):</label>
                <input type="date" name="published_at" id="published_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('published_at') border-red-500 @enderror" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : '') }}">
                @error('published_at')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline transition-colors duration-200">
                    Update Berita
                </button>
                <a href="{{ route('admin.news.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
