@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Semua Berita & Kegiatan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($allNews as $newsItem)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    @if ($newsItem->image)
                        {{-- Pastikan gambar berita ada di storage/app/public/news_images --}}
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-48 object-cover">
                    @else
                        {{-- Placeholder jika tidak ada gambar --}}
                        <img src="https://via.placeholder.com/400x250?text=No+Image" alt="No Image" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">{{ $newsItem->title }}</h2>
                        <p class="text-gray-600 text-sm mb-3">
                            <i class="far fa-calendar-alt"></i> {{ $newsItem->published_at ? $newsItem->published_at->format('d M Y') : 'Draft' }}
                            @if($newsItem->user) | <i class="fas fa-user"></i> {{ $newsItem->user->name }} @endif
                        </p>
                        <p class="text-gray-700 text-base mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($newsItem->content), 100) }} {{-- Menampilkan ringkasan singkat, menghilangkan tag HTML --}}
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

        {{-- Pagination Links --}}
        <div class="mt-8 flex justify-center">
            {{ $allNews->links() }}
        </div>
    </div>
@endsection
