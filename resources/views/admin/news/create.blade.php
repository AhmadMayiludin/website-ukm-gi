@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 max-w-3xl">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 flex items-center">
            <svg class="w-7 h-7 text-purple-600 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 20h9M12 4h9M4 8h16M4 16h16" />
            </svg>
            Tambah Berita Baru
        </h1>

        {{-- Error Handling --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                <div class="text-red-700 font-semibold mb-2">⚠️ Ada masalah dengan input Anda:</div>
                <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                <input type="text" name="title" id="title"
                    class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 text-gray-700 shadow-sm"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi Berita --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                <textarea name="content" id="content" rows="8"
                    class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 text-gray-700 shadow-sm">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama (Opsional)</label>
                <input type="file" name="image" id="image"
                    class="block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-purple-400">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal --}}
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                <input type="date" name="published_at" id="published_at"
                    class="w-full rounded-xl border-gray-300 focus:border-purple-500 focus:ring-purple-500 text-gray-700 shadow-sm"
                    value="{{ old('published_at') }}">
                <p class="text-xs text-gray-500 mt-1">Kosongkan untuk menyimpan sebagai Draft</p>
                @error('published_at')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('admin.news.index') }}"
                   class="text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-xl shadow-md hover:from-purple-700 hover:to-blue-700 focus:ring-2 focus:ring-purple-400 transition transform hover:scale-105">
                    Simpan Berita
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
