@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900">
        <!-- Header Section -->
        <div class="container mx-auto px-6 py-12">
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4">
                    Semua
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Berita</span>
                    <span class="bg-gradient-to-r from-green-400 to-blue-500 bg-clip-text text-transparent">& Kegiatan</span>
                </h1>
                <p class="text-blue-200 text-xl max-w-3xl mx-auto">
                    Jelajahi berbagai kegiatan menarik dan berita terkini dari
                    <span class="font-semibold text-yellow-300">UKM Hebat</span>
                </p>
                <div class="mt-8 w-24 h-1 bg-gradient-to-r from-yellow-400 to-orange-500 mx-auto rounded-full"></div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($news as $newsItem)
                    <article class="group relative bg-white/10 backdrop-blur-lg rounded-3xl overflow-hidden shadow-2xl hover:shadow-purple-500/20 transition-all duration-500 transform hover:scale-105 hover:rotate-1">
                        <!-- Animated Border -->
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 rounded-3xl opacity-0 group-hover:opacity-75 transition-all duration-500 blur-sm -z-10"></div>

                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            @if ($newsItem->image)
                                <img src="{{ asset('storage/' . $newsItem->image) }}"
                                     alt="{{ $newsItem->title }}"
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center relative overflow-hidden">
                                    <!-- Animated Background Pattern -->
                                    <div class="absolute inset-0 opacity-20">
                                        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-yellow-400/30 to-pink-500/30 transform rotate-12 scale-150"></div>
                                    </div>
                                    <div class="relative z-10 text-center">
                                        <svg class="w-20 h-20 text-white/80 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                                        </svg>
                                        <p class="text-white/80 font-semibold">Berita & Kegiatan</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Floating Date Badge -->
                            <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-sm text-white px-4 py-2 rounded-2xl shadow-lg">
                                <div class="text-center">
                                    <div class="text-lg font-bold">{{ $newsItem->created_at->format('d') }}</div>
                                    <div class="text-xs uppercase">{{ $newsItem->created_at->format('M Y') }}</div>
                                </div>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-6 relative z-10">
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-yellow-300 transition-colors duration-300 leading-tight">
                                    {{ $newsItem->title }}
                                </h3>

                                @if($newsItem->excerpt)
                                    <p class="text-blue-200 text-sm line-clamp-3 leading-relaxed">
                                        {{ $newsItem->excerpt }}
                                    </p>
                                @endif
                            </div>

                            <!-- Meta Information -->
                            <div class="flex items-center justify-between mb-6 text-sm text-blue-300">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $newsItem->created_at->diffForHumans() }}
                                    </div>
                                    @if($newsItem->author)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            {{ $newsItem->author }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <a href="{{ route('news.show', $newsItem->slug) }}"
                               class="group/btn relative inline-flex items-center justify-center w-full px-6 py-3 text-white font-semibold rounded-2xl overflow-hidden transition-all duration-300 hover:scale-105">
                                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover/btn:from-purple-600 group-hover/btn:to-pink-600"></span>
                                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-purple-500 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
                                <span class="relative flex items-center">
                                    Baca Selengkapnya
                                    <svg class="w-5 h-5 ml-2 transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </article>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full flex flex-col items-center justify-center py-20">
                        <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-12 text-center max-w-lg mx-auto shadow-2xl">
                            <div class="relative mb-8">
                                <svg class="w-32 h-32 text-blue-300 mx-auto opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <!-- Floating Elements -->
                                <div class="absolute top-0 left-0 w-4 h-4 bg-yellow-400 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
                                <div class="absolute top-4 right-0 w-3 h-3 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
                                <div class="absolute bottom-4 left-4 w-2 h-2 bg-green-400 rounded-full animate-bounce" style="animation-delay: 1s;"></div>
                            </div>
                            <h3 class="text-3xl font-bold text-white mb-4">Belum Ada Berita</h3>
                            <p class="text-blue-200 text-lg leading-relaxed">
                                Saat ini belum ada berita atau kegiatan yang tersedia.
                                <br>Silakan kembali lagi nanti untuk update terbaru!
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Load More or Pagination (if needed) -->
            @if(method_exists($news, 'links') && $news->hasPages())
                <div class="mt-16 flex justify-center">
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4">
                        {{ $news->links() }}
                    </div>
                </div>
            @endif
        </div>

        <!-- Background Animation Elements -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-10 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-3/4 right-10 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s;"></div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
@endsection
