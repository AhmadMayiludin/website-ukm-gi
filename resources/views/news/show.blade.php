@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $news->title }}</h1>
            <p class="text-gray-600 text-sm mb-6">
                <i class="far fa-calendar-alt"></i> Dipublikasikan pada {{ $news->published_at ? $news->published_at->format('d M Y') : 'N/A' }}
                @if($news->user) | Oleh <i class="fas fa-user"></i> {{ $news->user->name }} @endif
            </p>

            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-80 object-cover rounded-lg mb-8 shadow-lg">
            @else
                <img src="https://via.placeholder.com/800x450?text=No+Image" alt="No Image" class="w-full h-80 object-cover rounded-lg mb-8 shadow-lg">
            @endif

            <div class="prose max-w-none text-gray-800 leading-relaxed mb-10">
                {{-- Isi konten berita (rich text). Gunakan {!! !!} karena kontennya bisa mengandung HTML --}}
                {!! $news->content !!}
            </div>

            <a href="{{ route('news.index') }}" class="inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-md hover:bg-blue-700 transition-colors duration-200">
                &larr; Kembali ke Semua Berita
            </a>
        </div>
    </div>
@endsection
