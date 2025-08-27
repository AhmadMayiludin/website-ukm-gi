@extends('layouts.app')

@section('content')
<div class="relative bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 text-white py-16">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">{{ $pageContent['title'] }}</h1>
            <p class="text-lg text-gray-100 max-w-2xl mx-auto">
                Kami hadir untuk membangun literasi keuangan, mendukung mahasiswa, dan menyiapkan investor muda kompeten.
            </p>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-12">
        <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8 md:p-12 text-gray-800">
            <div class="prose max-w-none prose-indigo">
                {!! $pageContent['body'] !!}
            </div>

            <div class="mt-8 text-center">
                <a href="{{ url('/') }}"
                   class="inline-block px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold rounded-xl shadow-md hover:from-purple-700 hover:to-blue-700 transition transform hover:scale-105">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
