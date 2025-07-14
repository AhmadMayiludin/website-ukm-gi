<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website UKM Hebat</title> {{-- Ganti dengan nama UKM Anda --}}
    @vite('resources/css/app.css') {{-- Memuat CSS Tailwind --}}
    {{-- Opsional: Font Awesome untuk ikon sosial media jika ingin pakai --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    {{-- HEADER / NAVBAR --}}
    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-4 flex justify-between items-center max-w-7xl">
            {{-- Logo UKM --}}
            {{-- PERHATIAN: Di sini akan pakai logo gambar, bukan teks saja --}}
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/logo-ukm.png') }}" alt="Logo UKM Hebat" class="h-10 w-auto mr-2" style="height: 40px; width: auto;"> {{-- Tambahkan inline style sementara untuk logo --}}
                <span class="text-2xl font-bold text-gray-900">Galeri Investasi</span> {{-- Opsi teks jika logo belum siap --}}
            </a>

            {{-- Navigasi Utama --}}
            <nav class="space-x-6 text-lg">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Beranda</a>
                <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Berita & Kegiatan</a>
                <a href="{{ route('info.about') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Info UKM</a>
                <a href="{{ route('contact.show') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Kontak</a>
                <a href="{{ route('seminars.register.form') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Pendaftaran Seminar</a>

                {{-- Link Admin/Login (untuk admin) --}}
                @auth {{-- Hanya tampil jika user sudah login --}}
                    <a href="{{ url('/dashboard') }}" class="text-blue-500 hover:text-blue-700 ml-4">Dashboard Admin</a>
                @else {{-- Tampil jika user belum login --}}
                    <a href="{{ route('login') }}" class="text-green-500 hover:text-green-700 ml-4">Login Admin</a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- KONTEN UTAMA HALAMAN --}}
    <main>
        @yield('content') {{-- Ini akan diisi oleh konten spesifik setiap halaman --}}
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center max-w-7xl">
            <p>&copy; {{ date('Y') }} UKM HEBAT. Semua Hak Dilindungi.</p> {{-- Ganti dengan nama UKM Anda --}}
            <div class="flex justify-center space-x-6 mt-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200"><i class="fab fa-youtube"></i> YouTube</a>
            </div>
        </div>
    </footer>
</body>
</html>
