@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 max-w-2xl">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 tracking-tight">
        ✉️ Hubungi Kami
    </h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6 shadow-md">
            <strong class="font-semibold">✅ Terima Kasih!</strong>
            <span class="block">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6 shadow-md">
            <strong class="font-semibold">⚠️ Whoops!</strong> Ada masalah dengan form Anda.
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST"
          class="bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-100">
        @csrf
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-1">Subjek</label>
            <input type="text" name="subject" id="subject"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                value="{{ old('subject') }}" required>
        </div>

        <div>
            <label for="message" class="block text-sm font-semibold text-gray-700 mb-1">Pesan Anda</label>
            <textarea name="message" id="message" rows="5"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                required>{{ old('message') }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg shadow-md transition-transform transform hover:scale-105">
                🚀 Kirim Pesan
            </button>
            <a href="{{ url('/') }}"
                class="text-gray-500 hover:text-gray-800 transition-colors duration-200">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
