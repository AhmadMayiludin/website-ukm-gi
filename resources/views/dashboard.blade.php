@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Admin</h1>

        {{-- Ringkasan Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Total Berita</h3>
                {{-- Ambil jumlah berita dari database --}}
                @php
                    try {
                        $newsCount = \App\Models\News::count();
                    } catch (\Exception $e) {
                        $newsCount = 0;
                    }
                @endphp
                <p class="text-3xl font-bold text-blue-600">{{ $newsCount }}</p>
                <a href="{{ route('admin.news.index') }}" class="text-sm text-blue-500 hover:underline mt-2 inline-block">Kelola Berita</a>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Total Pengguna</h3>
                {{-- Ambil jumlah user dari database --}}
                @php
                    try {
                        $userCount = \App\Models\User::count();
                    } catch (\Exception $e) {
                        $userCount = 0;
                    }
                @endphp
                <p class="text-3xl font-bold text-green-600">{{ $userCount }}</p>
                <a href="#" class="text-sm text-green-500 hover:underline mt-2 inline-block">Kelola User</a>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Berita Terpublikasi</h3>
                {{-- Ambil jumlah berita yang sudah dipublikasi --}}
                @php
                    try {
                        $publishedNews = \App\Models\News::whereNotNull('published_at')
                                                        ->where('published_at', '<=', now())
                                                        ->count();
                    } catch (\Exception $e) {
                        $publishedNews = 0;
                    }
                @endphp
                <p class="text-3xl font-bold text-purple-600">{{ $publishedNews }}</p>
                <a href="{{ route('admin.news.index') }}" class="text-sm text-purple-500 hover:underline mt-2 inline-block">Lihat Berita</a>
            </div>
        </div>

        {{-- Section Link ke Halaman Admin Lainnya --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Akses Cepat</h2>
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <a href="{{ route('admin.news.index') }}" class="flex-1 bg-blue-500 text-white hover:bg-blue-600 transition-colors duration-200 py-4 px-6 rounded-lg text-center font-bold">
                📰 Kelola Berita
            </a>
            <a href="{{ route('admin.news.create') }}" class="flex-1 bg-green-500 text-white hover:bg-green-600 transition-colors duration-200 py-4 px-6 rounded-lg text-center font-bold">
                ➕ Tambah Berita
            </a>
            {{-- Tambahkan link admin lain di sini jika ada --}}
        </div>

        {{-- Section Berita Terbaru --}}
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Berita Terbaru</h2>
            <div class="bg-white rounded-lg shadow-md p-6">
                @php
                    try {
                        $recentNews = \App\Models\News::latest()->take(5)->get();
                    } catch (\Exception $e) {
                        $recentNews = collect();
                    }
                @endphp

                @if($recentNews->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentNews as $news)
                            <div class="border-b pb-4 last:border-b-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $news->title }}</h4>
                                        <p class="text-sm text-gray-600">
                                            {{ $news->published_at ? $news->published_at->format('d/m/Y H:i') : 'Draft' }}
                                        </p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.news.edit', $news->id) }}"
                                           class="text-blue-500 hover:text-blue-700 text-sm">Edit</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Belum ada berita. <a href="{{ route('admin.news.create') }}" class="text-blue-500 hover:underline">Tambah berita pertama</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection
