<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website UKM Hebat</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    {{-- HEADER / NAVBAR --}}
   {{-- HEADER / NAVBAR MODERN --}}
<header class="bg-white/80 backdrop-blur-lg shadow-lg border-b border-gray-100 py-3 sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 flex flex-wrap justify-between items-center max-w-7xl">
        {{-- Logo UKM --}}
        <a href="{{ url('/') }}" class="flex items-center flex-shrink-0 mb-2 sm:mb-0 group">
            <div class="relative">
                <img src="{{ asset('images/logo-ukm.png') }}" alt="Logo UKM Hebat"
                     class="h-10 w-auto mr-3 transition-transform duration-300 group-hover:scale-110">
                <div class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            </div>
            <div class="hidden sm:block">
                <span class="text-2xl font-bold bg-gradient-to-r from-purple-600 via-blue-600 to-teal-500 bg-clip-text text-transparent">
                    Galeri Investasi
                </span>
                <div class="h-0.5 w-0 bg-gradient-to-r from-purple-600 to-blue-600 transition-all duration-300 group-hover:w-full"></div>
            </div>
        </a>

        {{-- Tombol Hamburger Mobile --}}
        <div class="md:hidden">
            <button id="mobile-menu-button" class="relative p-2 text-gray-600 hover:text-purple-600 focus:outline-none transition-colors duration-200 group">
                <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" fill="currentColor">
                    <path id="menu-icon" fill-rule="evenodd"
                          d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z"
                          clip-rule="evenodd"></path>
                    <path id="close-icon" class="hidden" fill-rule="evenodd"
                          d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        {{-- Navigasi Utama --}}
        <nav id="mobile-menu" class="hidden flex-col md:flex md:flex-row space-y-3 md:space-y-0 md:space-x-1 text-base w-full md:w-auto items-center mt-4 md:mt-0">
            <a href="{{ url('/') }}"
               class="nav-link relative px-4 py-2 text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-lg group
               {{ request()->is('/') ? 'text-purple-600 bg-gradient-to-r from-purple-100 to-blue-100' : '' }}">
                <span class="relative z-10">Beranda</span>
            </a>

            <a href="{{ route('news.index') }}"
               class="nav-link relative px-4 py-2 text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-lg group
               {{ request()->routeIs('news.index') ? 'text-purple-600 bg-gradient-to-r from-purple-100 to-blue-100' : '' }}">
                <span class="relative z-10">Berita & Kegiatan</span>
            </a>

            <a href="{{ route('info.about') }}"
               class="nav-link relative px-4 py-2 text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-lg group
               {{ request()->routeIs('info.about') ? 'text-purple-600 bg-gradient-to-r from-purple-100 to-blue-100' : '' }}">
                <span class="relative z-10">Info UKM</span>
            </a>

            <a href="{{ route('contact.show') }}"
               class="nav-link relative px-4 py-2 text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-lg group
               {{ request()->routeIs('contact.show') ? 'text-purple-600 bg-gradient-to-r from-purple-100 to-blue-100' : '' }}">
                <span class="relative z-10">Kontak</span>
            </a>

            <a href="{{ route('seminars.register.form') }}"
               class="nav-link relative px-4 py-2 text-gray-700 hover:text-purple-600 transition-all duration-300 rounded-lg group
               {{ request()->routeIs('seminars.register.form') ? 'text-purple-600 bg-gradient-to-r from-purple-100 to-blue-100' : '' }}">
                <span class="relative z-10">Pendaftaran Seminar</span>
            </a>

            {{-- Auth Buttons --}}
            <div class="md:ml-6 mt-2 md:mt-0">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-medium rounded-full hover:from-purple-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-medium rounded-full hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Login Admin
                    </a>
                @endauth
            </div>
        </nav>
    </div>
</header>

{{-- JS Mobile Menu --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const header = document.querySelector('header');

    // Toggle Mobile Menu
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Scroll Effect Header
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop;
    });
});
</script>

<style>
@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
header {
    transition: transform 0.3s ease-in-out, background-color 0.3s ease;
}
.nav-link {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>


    {{-- KONTEN UTAMA HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center max-w-7xl">
            <p>&copy; {{ date('Y') }} UKM HEBAT. Semua Hak Dilindungi.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-6 mt-4">
                <a href="" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-instagram"></i> Instagram</a>

            </div>
        </div>
    </footer>
    <footer class="bg-gray-800 text-white py-8 mt-12">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            {{-- Info --}}
            <div class="text-center md:text-left">
                <h3 class="text-xl font-semibold mb-2">Lokasi Galeri Investasi UKM</h3>
                <p class="mb-4">📍 Karawang, Jawa Barat</p>
                <a href="https://maps.app.goo.gl/yVJPBxDvGyimKJpB8"
                   target="_blank"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow-md transition">
                   Buka di Google Maps
                </a>
            </div>

            {{-- Maps Embed --}}
            <div class="w-full h-64 md:h-80 rounded-lg overflow-hidden shadow-lg">
                <iframe
                    class="w-full h-full"
                    style="border:0;"
                    loading="lazy"
                    allowfullscreen
                    src="https://www.google.com/maps?q=-6.322934,107.337877&output=embed">
                </iframe>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="text-center text-gray-400 mt-8 text-sm">
            &copy; {{ date('Y') }} UKM HEBAT. Semua Hak Dilindungi.
        </div>
    </div>
</footer>


    {{-- Script JavaScript untuk Toggle Navbar Mobile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden'); // Toggle kelas 'hidden'
                    mobileMenu.classList.toggle('flex');   // Toggle kelas 'flex'
                });

                // Opsional: Sembunyikan menu saat link diklik (untuk SPA-like behavior)
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        if (mobileMenu.classList.contains('flex')) {
                            mobileMenu.classList.remove('flex');
                            mobileMenu.classList.add('hidden');
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>
