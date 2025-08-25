@extends('layouts.app') {{-- Menggunakan layout dasar yang sudah dibuat --}}

@section('content')
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-r from-blue-500 to-green-500 text-white py-20 px-4 overflow-hidden" style="min-height: 500px;">
        <div class="absolute inset-0">
            {{-- Placeholder untuk gambar ilustrasi --}}
            {{-- Anda bisa mengganti ini dengan gambar ilustrasi dari desain Figma Anda. --}}
            {{-- Pastikan gambar ada di public/images/hero-illustration.png --}}
            <img src="{{ asset('images/hero-illustration.png') }}" alt="UKM Illustration" class="absolute right-0 bottom-0 h-full w-auto object-cover opacity-75 hidden md:block">
        </div>
        <div class="container mx-auto relative z-10 flex flex-col md:flex-row items-center md:items-start space-y-8 md:space-y-0 md:space-x-12 max-w-7xl">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-5xl font-extrabold leading-tight mb-4">
                    Bergabunglah dengan Komunitas Kreatif Kami!
                </h1>
                <p class="text-xl font-light mb-8 max-w-lg mx-auto md:mx-0">
                    Temukan Passion Anda di Sini. Jelajahi acara, lokakarya, dan kesempatan yang menginspirasi.
                </p>
                <a href="{{ route('news.index') }}" class="inline-block bg-white text-blue-700 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-200 transition-colors duration-300">
                    Jelajahi Kegiatan Kami
                </a>
            </div>
        </div>
    </section>

    {{-- Berita & Kegiatan Terbaru Section --}}
    <section class="py-16 px-4 bg-gray-100">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Berita & Kegiatan Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Ambil 3 berita terbaru dari database untuk ditampilkan di homepage --}}
                @php
                    use App\Models\News; // Pastikan model News di-import di sini
                    use Carbon\Carbon; // Pastikan Carbon di-import di sini
                    use Illuminate\Support\Str; // Pastikan Str di-import di sini

                    $latestNews = News::whereNotNull('published_at')
                                    ->where('published_at', '<=', Carbon::now())
                                    ->orderBy('published_at', 'desc')
                                    ->limit(3) // Ambil 3 berita terbaru
                                    ->get();
                @endphp

                @forelse ($latestNews as $newsItem)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                        @if ($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-48 object-cover">
                        @else
                            <img src="https://via.placeholder.com/400x250?text=No+Image" alt="No Image" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">{{ $newsItem->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3">
                                <i class="far fa-calendar-alt"></i> {{ $newsItem->published_at ? $newsItem->published_at->format('d M Y') : 'Draft' }}
                                @if($newsItem->user) | <i class="fas fa-user"></i> {{ $newsItem->user->name }} @endif
                            </p>
                            <p class="text-gray-700 text-base mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($newsItem->content), 100) }}
                            </p>
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="text-blue-500 hover:text-blue-700 font-semibold flex items-center">
                                Baca Selengkapnya
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">Belum ada berita atau kegiatan yang dipublikasikan.</p>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('news.index') }}" class="inline-block bg-blue-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Berita & Kegiatan
                </a>
            </div>
        </div>
    </section>

    {{-- Sekilas Tentang UKM Section --}}
    <section class="py-16 px-4 bg-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center md:space-x-12 max-w-7xl">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-4xl font-bold text-gray-800 mb-6">Sekilas Tentang UKM Hebat</h2>
                <p class="text-gray-700 text-lg leading-relaxed mb-4">
                    UKM Hebat adalah wadah bagi mahasiswa untuk mengembangkan potensi diri, berkolaborasi, dan menciptakan inovasi. Kami berkomitmen untuk membentuk pemimpin dan profesional yang siap menghadapi tantangan masa depan.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed mb-6">
                    Melalui berbagai kegiatan interaktif seperti workshop, seminar, dan proyek kolaboratif, kami berupaya menciptakan lingkungan belajar yang suportif dan inspiratif.
                </p>
                <a href="{{ route('info.about') }}" class="inline-block bg-gray-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-700 transition-colors duration-300">
                    Pelajari Lebih Lanjut
                </a>
            </div>
            <div class="md:w-1/2">
                {{-- Placeholder gambar pendukung --}}
                {{-- Pastikan gambar ini ada di public/images/about-ukm.png --}}
                <img src="{{ asset('images/about-ukm.png') }}" alt="About UKM" class="rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    {{-- Bagian FAQ atau Testimoni (Jika Diperlukan, bisa dihapus jika tidak) --}}
    <section class="py-16 px-4 bg-gray-100">
        <div class="container mx-auto max-w-7xl">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">Tanya Jawab Umum</h2>
            <div class="max-w-3xl mx-auto space-y-4">
                {{-- Placeholder untuk FAQ --}}
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Apa itu UKM Hebat?</h3>
                    <p class="text-gray-700">UKM Hebat adalah unit kegiatan mahasiswa yang berfokus pada pengembangan soft skill dan hard skill mahasiswa melalui proyek dan kegiatan inovatif.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-800 mb-2">Bagaimana cara bergabung?</h3>
                    <p class="text-gray-700">Anda dapat bergabung dengan mengikuti proses pendaftaran yang kami buka setiap awal semester. Informasi lebih lanjut akan tersedia di halaman Pendaftaran Seminar.</p>
                </div>
                {{-- Tambahkan FAQ lainnya --}}
            </div>
        </div>
    </section>

@endsection
