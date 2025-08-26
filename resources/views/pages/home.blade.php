@extends('layouts.app')

@section('content')
    {{-- Hero Section with Modern Design --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 text-white" style="min-height: 100vh;">
        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-72 h-72 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-0 right-4 w-72 h-72 bg-gradient-to-r from-yellow-400 to-pink-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        {{-- Floating Particles --}}
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-4 h-4 bg-white rounded-full opacity-70 animate-bounce animation-delay-1000"></div>
            <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-yellow-300 rounded-full opacity-60 animate-bounce animation-delay-3000"></div>
            <div class="absolute bottom-1/4 left-1/3 w-3 h-3 bg-pink-300 rounded-full opacity-50 animate-bounce animation-delay-2000"></div>
        </div>

        {{-- Main Content --}}
        <div class="container mx-auto relative z-10 px-6 py-20 flex flex-col justify-center items-center text-center min-h-screen">
            <div class="max-w-4xl mx-auto">
                {{-- Animated Badge --}}
                <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 text-sm font-medium mb-8 transform hover:scale-105 transition-all duration-300">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    Bergabung dengan 500+ Mahasiswa Aktif
                </div>

                {{-- Main Heading with Gradient Text --}}
                <h1 class="text-6xl md:text-8xl font-black leading-tight mb-6 transform hover:scale-105 transition-all duration-500">
                    <span class="bg-gradient-to-r from-white via-blue-200 to-purple-200 bg-clip-text text-transparent">
                        Komunitas
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-yellow-400 via-pink-400 to-purple-400 bg-clip-text text-transparent animate-pulse">
                        Kreatif
                    </span>
                    <br>
                    <span class="bg-gradient-to-r from-green-400 via-blue-400 to-purple-400 bg-clip-text text-transparent">
                        Masa Depan
                    </span>
                </h1>

                {{-- Subtitle with Typewriter Effect --}}
                <p class="text-xl md:text-2xl font-light mb-10 max-w-3xl mx-auto leading-relaxed text-gray-200">
                    Wujudkan potensi terbaikmu melalui inovasi, kolaborasi, dan pembelajaran yang tak terbatas.
                    <span class="text-yellow-300 font-semibold">Mari berkarya bersama!</span>
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                    <a href="{{ route('news.index') }}"
                       class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full font-bold text-lg shadow-2xl hover:shadow-purple-500/25 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                        <span class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="relative flex items-center">
                            Jelajahi Kegiatan
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>

                    <a href="{{ route('info.about') }}"
                       class="group px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/30 rounded-full font-bold text-lg hover:bg-white/20 transform hover:scale-105 transition-all duration-300">
                        <span class="flex items-center">
                            Tentang Kami
                            <svg class="ml-2 w-5 h-5 group-hover:rotate-45 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </span>
                    </a>
                </div>

                {{-- Stats Counter --}}
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-2xl mx-auto">
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold text-yellow-400 group-hover:scale-110 transition-transform">500+</div>
                        <div class="text-sm text-gray-300">Anggota Aktif</div>
                    </div>
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold text-green-400 group-hover:scale-110 transition-transform">50+</div>
                        <div class="text-sm text-gray-300">Event Tahunan</div>
                    </div>
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold text-blue-400 group-hover:scale-110 transition-transform">100+</div>
                        <div class="text-sm text-gray-300">Proyek Selesai</div>
                    </div>
                    <div class="text-center group cursor-pointer">
                        <div class="text-3xl font-bold text-pink-400 group-hover:scale-110 transition-transform">5+</div>
                        <div class="text-sm text-gray-300">Tahun Berdiri</div>
                    </div>
                </div>
            </div>

            {{-- Scroll Indicator --}}
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- News Section with Glass Morphism --}}
    <section class="py-20 px-6 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-5">
            <div style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><defs><pattern id=%22grain%22 width=%22100%22 height=%22100%22 patternUnits=%22userSpaceOnUse%22><circle cx=%2250%22 cy=%2250%22 r=%221%22 fill=%22%23000%22/></pattern></defs><rect width=%22100%25%22 height=%22100%25%22 fill=%22url(%23grain)%22/></svg>'); background-size: 50px 50px;"></div>
        </div>

        <div class="container mx-auto max-w-7xl relative z-10">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <div class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-4">
                    ✨ Update Terbaru
                </div>
                <h2 class="text-5xl font-black text-gray-800 mb-6 bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Berita & Kegiatan Terbaru
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Ikuti perkembangan terkini dan jangan lewatkan kesempatan emas untuk berkembang bersama kami
                </p>
            </div>

            {{-- News Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @php
                    use App\Models\News;
                    use Carbon\Carbon;
                    use Illuminate\Support\Str;

                    $latestNews = News::whereNotNull('published_at')
                                    ->where('published_at', '<=', Carbon::now())
                                    ->orderBy('published_at', 'desc')
                                    ->limit(3)
                                    ->get();
                @endphp

                @forelse ($latestNews as $index => $newsItem)
                    <div class="group relative bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl hover:shadow-2xl border border-white/50 overflow-hidden transform hover:scale-105 hover:-translate-y-2 transition-all duration-500"
                         style="animation-delay: {{ $index * 0.2 }}s;">

                        {{-- Card Image --}}
                        <div class="relative overflow-hidden">
                            @if ($newsItem->image)
                                <img src="{{ asset('storage/' . $newsItem->image) }}"
                                     alt="{{ $newsItem->title }}"
                                     class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-56 bg-gradient-to-br from-purple-400 via-pink-400 to-blue-400 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif

                            {{-- Overlay Gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            {{-- Featured Badge --}}
                            @if($index === 0)
                                <div class="absolute top-4 left-4 px-3 py-1 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold rounded-full shadow-lg">
                                    🔥 TRENDING
                                </div>
                            @endif
                        </div>

                        {{-- Card Content --}}
                        <div class="p-6">
                            {{-- Meta Info --}}
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $newsItem->published_at ? $newsItem->published_at->format('d M Y') : 'Draft' }}
                                </span>
                                @if($newsItem->user)
                                    <span class="text-xs text-gray-500">
                                        by {{ $newsItem->user->name }}
                                    </span>
                                @endif
                            </div>

                            {{-- Title --}}
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                                {{ $newsItem->title }}
                            </h3>

                            {{-- Content Preview --}}
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($newsItem->content), 120) }}
                            </p>

                            {{-- Read More Button --}}
                            <a href="{{ route('news.show', $newsItem->slug) }}"
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold text-sm group-hover:translate-x-1 transition-all duration-300">
                                Baca Selengkapnya
                                <svg class="ml-1 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-13-1V6a2 2 0 012-2h2.5"></path>
                            </svg>
                        </div>
                        <p class="text-xl text-gray-500 font-medium">Belum ada berita atau kegiatan yang dipublikasikan</p>
                        <p class="text-gray-400">Nantikan update menarik dari kami!</p>
                    </div>
                @endforelse
            </div>

            {{-- View All Button --}}
            <div class="text-center">
                <a href="{{ route('news.index') }}"
                   class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-full shadow-xl hover:shadow-2xl hover:shadow-blue-500/25 transform hover:scale-105 transition-all duration-300">
                    <span>Lihat Semua Berita & Kegiatan</span>
                    <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- About Section with Interactive Elements --}}
    <section class="py-20 px-6 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 text-white relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-96 h-96 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-r from-pink-500 to-yellow-500 rounded-full mix-blend-multiply filter blur-3xl animate-pulse animation-delay-2000"></div>
        </div>

        <div class="container mx-auto max-w-7xl relative z-10 flex flex-col lg:flex-row items-center gap-16">
            {{-- Content --}}
            <div class="lg:w-1/2 space-y-8">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 text-sm font-medium">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2 animate-pulse"></span>
                        Tentang Kami
                    </div>

                    <h2 class="text-5xl font-black leading-tight">
                        <span class="bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                            Membangun
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-yellow-400 to-pink-400 bg-clip-text text-transparent">
                            Masa Depan
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">
                            Bersama
                        </span>
                    </h2>
                </div>

                <div class="space-y-6 text-lg leading-relaxed text-gray-200">
                    <p>
                        UKM Hebat adalah <span class="text-yellow-300 font-semibold">wadah transformasi</span> bagi mahasiswa untuk mengembangkan potensi diri, berkolaborasi dalam proyek-proyek inovatif, dan menciptakan solusi untuk tantangan masa depan.
                    </p>
                    <p>
                        Melalui <span class="text-pink-300 font-semibold">berbagai kegiatan interaktif</span> seperti workshop teknologi, seminar inspiratif, dan proyek kolaboratif lintas disiplin, kami menciptakan ekosistem pembelajaran yang mendorong inovasi dan kreativitas.
                    </p>
                </div>

                {{-- Feature List --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Inovasi Teknologi</span>
                    </div>

                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Komunitas Solid</span>
                    </div>

                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-pink-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Pengembangan Skill</span>
                    </div>

                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Networking Luas</span>
                    </div>
                </div>

                <a href="{{ route('info.about') }}"
                   class="inline-flex items-center px-8 py-4 bg-white text-gray-800 font-bold rounded-full shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 group">
                    <span>Pelajari Lebih Lanjut</span>
                    <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>

            {{-- Visual Element --}}
            <div class="lg:w-1/2 relative">
                <div class="relative w-full h-96 lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl group">
                    {{-- Placeholder for image with modern gradient --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-24 h-24 text-white/80 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                <p class="text-white/90 text-lg font-semibold">Tim UKM Hebat</p>
                                <p class="text-white/70">Bersama Menuju Kesuksesan</p>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Elements --}}
                    <div class="absolute top-4 right-4 w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full border border-white/30 flex items-center justify-center animate-bounce animation-delay-1000">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>

                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-yellow-400/80 backdrop-blur-sm rounded-full border border-yellow-300/50 flex items-center justify-center animate-pulse">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom CSS for animations --}}
    <style>
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-3000 {
            animation-delay: 3s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Line clamp utilities */
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        .line-clamp-3 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }

        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom gradients */
        .bg-gradient-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Hover effects */
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>

    {{-- Call to Action Section --}}
    <section class="py-20 px-6 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white text-center relative overflow-hidden">
        {{-- Background Animation --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute w-full h-full">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white/10 to-transparent animate-pulse"></div>
                <div class="absolute top-1/4 right-1/4 w-64 h-64 bg-white/10 rounded-full filter blur-xl animate-bounce animation-delay-2000"></div>
                <div class="absolute bottom-1/4 left-1/4 w-48 h-48 bg-white/10 rounded-full filter blur-xl animate-bounce animation-delay-1000"></div>
            </div>
        </div>

        <div class="container mx-auto max-w-4xl relative z-10">
            <div class="space-y-8">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full border border-white/30 text-sm font-medium mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    Siap Bergabung?
                </div>

                <h2 class="text-4xl md:text-6xl font-black leading-tight">
                    <span class="block mb-2">Mulai Perjalanan</span>
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        Luar Biasa
                    </span>
                    <span class="block">Bersama Kami!</span>
                </h2>

                <p class="text-xl md:text-2xl font-light max-w-3xl mx-auto leading-relaxed opacity-90">
                    Jangan biarkan kesempatan ini berlalu. Bergabunglah dengan komunitas yang akan mengubah cara pandang Anda tentang inovasi dan kreativitas.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center pt-8">
                    <a href="{{ route('contact.show') }}"
                       class="group px-8 py-4 bg-white text-purple-600 font-bold text-lg rounded-full shadow-2xl hover:shadow-white/25 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
                        <span class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-full"></span>
                        <span class="relative flex items-center group-hover:text-white transition-colors">
                            Hubungi Kami
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </span>
                    </a>

                    <a href="{{ route('seminars.register.form') }}"
                       class="group px-8 py-4 bg-transparent border-2 border-white text-white font-bold text-lg rounded-full hover:bg-white hover:text-purple-600 transform hover:scale-105 transition-all duration-300">
                        <span class="flex items-center">
                            Daftar Seminar
                            <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
