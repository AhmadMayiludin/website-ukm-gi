@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-indigo-50 to-blue-100 flex items-center justify-center px-4">
    <div class="bg-white shadow-2xl rounded-2xl w-full max-w-lg p-8">
        <h1 class="text-3xl font-extrabold text-center text-indigo-700 mb-6">
            Formulir Pendaftaran Seminar
        </h1>

        {{-- Success message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                <strong class="font-bold">✅ Sukses!</strong>
                <span class="block">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Error message --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                <strong class="font-bold">⚠️ Whoops!</strong> Ada beberapa masalah:<br>
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('seminars.register.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">NIM</label>
                <input type="text" name="nim" value="{{ old('nim') }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nomor Telepon/WhatsApp</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Fakultas</label>
                <input type="text" name="faculty" value="{{ old('faculty') }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Jurusan</label>
                <input type="text" name="major" value="{{ old('major') }}"
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
            </div>

            <div class="flex justify-between items-center pt-4">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-xl shadow-lg transition">
                    🚀 Daftar Sekarang
                </button>
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-800 font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
