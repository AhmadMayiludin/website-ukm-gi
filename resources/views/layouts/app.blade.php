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
    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-center max-w-7xl">
            {{-- Logo UKM --}}
            <a href="{{ url('/') }}" class="flex items-center flex-shrink-0 mb-2 sm:mb-0">
                <img src="{{ asset('images/logo-ukm.png') }}" alt="Logo UKM Hebat" class="h-10 w-auto mr-2" style="height: 40px; width: auto;">
                <span class="text-2xl font-bold text-gray-900 hidden sm:block">Galeri Investasi</span>
            </a>

            {{-- Tombol Hamburger untuk Mobile --}}
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 010 2H4a1 1 0 110-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2zm0 6h16a1 1 0 010 2H4a1 1 0 010-2z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            {{-- Navigasi Utama (Tersembunyi di Mobile, Tampil di md:, Akan di-toggle dengan JS) --}}
            <nav id="mobile-menu" class="hidden flex-col md:flex md:flex-row space-y-2 md:space-y-0 md:space-x-6 text-lg w-full md:w-auto items-center md:items-center mt-2 md:mt-0">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Beranda</a>
                <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Berita & Kegiatan</a>
                <a href="{{ route('info.about') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Info UKM</a>
                <a href="{{ route('contact.show') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Kontak</a>
                <a href="{{ route('seminars.register.form') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Pendaftaran Seminar</a>

                @auth
                    <a href="{{ url('/dashboard') }}" class="text-blue-500 hover:text-blue-700 md:ml-4">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-green-500 hover:text-green-700 md:ml-4">Login Admin</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- KONTEN UTAMA HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center max-w-7xl">
            <p>&copy; {{ date('Y') }} UKM HEBAT. Semua Hak Dilindungi.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-6 mt-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-youtube"></i> YouTube</a>
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
