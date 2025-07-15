<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tambahkan ini untuk Str::limit
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk Auth::check()
use Carbon\Carbon; // Pastikan ini ada

class NewsController extends Controller
{
    /**
     * Tampilkan daftar semua berita/kegiatan.
     */
    public function index()
    {
        // --- KODE DEBUGGING: Sederhanakan query ke level paling dasar ---
        // Ambil SEMUA berita dari database, TANPA FILTER APAPUN
        $query = News::orderBy('created_at', 'desc'); // Hanya urutkan dari yang terbaru

        $allNews = $query->paginate(9); // Apply pagination di akhir query

        // --- BARIS DEBUGGING: AKAN MENAMPILKAN DATA DAN MENGHENTIKAN EKSEKUSI ---
        // Setelah debugging selesai, HAPUS atau KOMENTARI BARIS dd() ini.
        // dd([
        //     'current_time_server' => Carbon::now()->toDateTimeString(), // Waktu server saat ini
        //     'allNews_variable_raw_object' => $allNews, // Dump objek Paginator secara mentah
        //     'allNews_variable_type' => get_class($allNews), // Tipe objek $allNews
        //     'allNews_is_empty' => $allNews->isEmpty(), // Cek apakah $allNews kosong
        //     'allNews_total_items' => $allNews->total(), // Total item di $allNews
        //     'allNews_items_data' => $allNews->items()->toArray(), // Data item di $allNews (jika tidak kosong)
        //     'news_from_db_raw_all' => News::all()->toArray(), // Semua berita di DB tanpa filter (untuk perbandingan)
        //     'full_sql_query' => $query->toSql(), // Query SQL yang sebenarnya dijalankan
        //     'query_bindings' => $query->getBindings() // Nilai-nilai binding pada query
        // ]);
        // --- AKHIR BARIS DEBUGGING ---

        return view('news.index', compact('allNews'));
    }

    /**
     * Tampilkan detail berita/kegiatan tertentu.
     */
    public function show(News $news) // Laravel akan otomatis mencari berita berdasarkan slug
    {
        // Pastikan berita sudah dipublikasi sebelum ditampilkan
        if (is_null($news->published_at) || $news->published_at > Carbon::now()) {
            abort(404); // Jika belum dipublikasi atau tanggal di masa depan, lempar 404
        }
        return view('news.show', compact('news'));
    }
}
