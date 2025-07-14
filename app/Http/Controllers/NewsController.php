<?php

namespace App\Http\Controllers;

use App\Models\News; // Pastikan ini di-import
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tambahkan ini untuk Str::limit
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Tampilkan daftar semua berita/kegiatan.
     */
    public function index()
    {
        // Ambil semua berita yang sudah dipublikasi, urutkan dari yang terbaru
        $allNews = News::whereNotNull('published_at') // Pastikan sudah dipublikasi
                       ->orderBy('published_at', 'desc')
                       ->paginate(9); // Contoh: tampilkan 9 berita per halaman

        return view('news.index', compact('allNews'));
    }

    /**
     * Tampilkan detail berita/kegiatan tertentu.
     */
    public function show(News $news) // Laravel akan otomatis mencari berita berdasarkan slug
    {
        // Pastikan berita sudah dipublikasi sebelum ditampilkan
        if (is_null($news->published_at) && (!auth()->check() || !auth()->user()->is_admin)) {
            // Jika belum dipublikasi dan bukan admin, lempar 404 (opsional, bisa disesuaikan)
            abort(404);
        }
        return view('news.show', compact('news'));
    }
}
