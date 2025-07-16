            @extends('layouts.app')

            @section('content')
                <div class="container mx-auto px-4 py-8 max-w-4xl">
                    <div class="bg-white rounded-lg shadow-md p-8">
                        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">{{ $pageContent['title'] }}</h1>
                        <div class="prose max-w-none text-gray-700 leading-relaxed">
                            {!! $pageContent['body'] !!} {{-- Menggunakan {!! !!} karena konten bisa mengandung HTML --}}
                        </div>
                        <div class="mt-8 text-center">
                            <a href="{{ url('/') }}" class="inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-md hover:bg-blue-700 transition-colors duration-200">
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            @endsection
