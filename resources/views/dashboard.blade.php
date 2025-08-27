@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100">
        <div class="container mx-auto px-6 py-12">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/80 backdrop-blur-lg rounded-2xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-3">
                    📈 Dashboard Admin
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kelola konten website UKM dengan mudah dan efisien
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Total Berita Card -->
                <div class="group relative bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 border border-white/50">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-purple-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-16 h-16 bg-indigo-500/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">TOTAL BERITA</h3>
                        @php
                            try {
                                $newsCount = \App\Models\News::count();
                            } catch (\Exception $e) {
                                $newsCount = 0;
                            }
                        @endphp
                        <p class="text-4xl font-bold text-gray-800 mb-4">{{ $newsCount }}</p>
                        <a href="{{ route('admin.news.index') }}"
                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-medium group-hover:translate-x-1 transition-all duration-300">
                            Kelola Berita
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Total Pengguna Card -->
                <div class="group relative bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 border border-white/50">
                    <div class="absolute inset-0 bg-gradient-to-r from-pink-500/5 to-rose-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-16 h-16 bg-pink-500/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">TOTAL PENGGUNA</h3>
                        @php
                            try {
                                $userCount = \App\Models\User::count();
                            } catch (\Exception $e) {
                                $userCount = 0;
                            }
                        @endphp
                        <p class="text-4xl font-bold text-gray-800 mb-4">{{ $userCount }}</p>
                        <a href="#"
                           class="inline-flex items-center text-pink-600 hover:text-pink-800 text-sm font-medium group-hover:translate-x-1 transition-all duration-300">
                            Kelola User
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Berita Terpublikasi Card -->
                <div class="group relative bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 hover:-translate-y-1 border border-white/50">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-16 h-16 bg-cyan-500/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">BERITA TERPUBLIKASI</h3>
                        @php
                            try {
                                $publishedNews = \App\Models\News::whereNotNull('published_at')
                                                                ->where('published_at', '<=', now())
                                                                ->count();
                            } catch (\Exception $e) {
                                $publishedNews = 0;
                            }
                        @endphp
                        <p class="text-4xl font-bold text-gray-800 mb-4">{{ $publishedNews }}</p>
                        <a href="{{ route('admin.news.index') }}"
                           class="inline-flex items-center text-cyan-600 hover:text-cyan-800 text-sm font-medium group-hover:translate-x-1 transition-all duration-300">
                            Lihat Berita
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Akses Cepat Section -->
            <div class="mb-12">
                <div class="flex items-center justify-center mb-8">
                    <div class="inline-flex items-center bg-white/70 backdrop-blur-lg rounded-full px-6 py-3 shadow-lg border border-white/50">
                        <span class="text-2xl mr-2">🚀</span>
                        <h2 class="text-2xl font-bold text-gray-800">Akses Cepat</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kelola Berita -->
                    <a href="{{ route('admin.news.index') }}"
                       class="group relative bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-white/50">
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-purple-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <div class="relative z-10 text-center">
                            <div class="w-20 h-20 bg-indigo-500/10 backdrop-blur-sm rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Kelola Berita</h3>
                            <p class="text-gray-600 text-sm">Tambah, edit, atau hapus berita dan artikel</p>
                        </div>
                    </a>

                    <!-- Tambah Berita -->
                    <a href="{{ route('admin.news.create') }}"
                       class="group relative bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-105 border border-white/50">
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-green-500/5 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <div class="relative z-10 text-center">
                            <div class="w-20 h-20 bg-emerald-500/10 backdrop-blur-sm rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Tambah Berita</h3>
                            <p class="text-gray-600 text-sm">Buat konten berita atau artikel baru</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Berita Terbaru Section -->
            <div class="bg-white/70 backdrop-blur-lg rounded-3xl p-8 shadow-xl border border-white/50">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <span class="text-2xl mr-3">📰</span>
                    Berita Terbaru
                </h2>

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
                            <div class="group bg-white/50 backdrop-blur-sm rounded-2xl p-6 hover:bg-white/80 transition-all duration-300 border border-white/30">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 text-lg mb-2 group-hover:text-indigo-700 transition-colors duration-300">
                                            {{ Str::limit($news->title, 50) }}
                                        </h4>
                                        <div class="flex items-center text-gray-500 text-sm">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $news->published_at ? $news->published_at->format('d/m/Y H:i') : 'Draft' }}
                                        </div>
                                    </div>
                                    <div class="flex space-x-3 ml-4">
                                        <a href="{{ route('admin.news.edit', $news->id) }}"
                                           class="bg-indigo-500/10 hover:bg-indigo-500/20 text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-600 text-lg">
                            Belum ada berita.
                            <a href="{{ route('admin.news.create') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold hover:underline transition-colors duration-300">
                                Tambah berita pertama
                            </a>
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Background Animation Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-10 w-72 h-72 bg-indigo-200/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-purple-200/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
@endsection
