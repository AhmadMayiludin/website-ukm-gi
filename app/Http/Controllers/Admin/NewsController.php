<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News; // Import model News
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk upload gambar
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login
use Illuminate\Support\Str; // Untuk slug
use Illuminate\Validation\Rule; // Untuk validasi unique slug

class NewsController extends Controller
{
    /**
     * Tampilkan daftar semua berita di halaman admin.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get(); // Ambil semua berita, urutkan dari terbaru
        return view('admin.news.index', compact('news')); // Panggil view admin.news.index
    }

    /**
     * Tampilkan formulir untuk membuat berita baru.
     */
    public function create()
    {
        return view('admin.news.create'); // Panggil view admin.news.create
    }

    /**
     * Simpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar di storage/app/public/news_images
            $imagePath = $request->file('image')->store('public/news_images');
            // Simpan path yang relatif terhadap public/storage
            $imagePath = str_replace('public/', '', $imagePath);
        }

        News::create([
            'title' => $request->title,
            // Slug akan otomatis dibuat di model News (boot() method)
            'content' => $request->content,
            'image' => $imagePath,
            'user_id' => Auth::id(), // Simpan ID user yang sedang login sebagai penulis
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail berita (opsional, biasanya di sisi publik).
     * Untuk admin, biasanya langsung ke edit.
     */
    public function show(News $news)
    {
        // Ini tidak akan terlalu digunakan karena admin akan langsung ke edit
        return redirect()->route('admin.news.edit', $news->id);
    }

    /**
     * Tampilkan formulir untuk mengedit berita.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news')); // Panggil view admin.news.edit
    }

    /**
     * Perbarui berita di database.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                // Pastikan slug unik, kecuali untuk berita yang sedang diedit itu sendiri
                Rule::unique('news')->ignore($news->id),
            ],
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image; // Pertahankan gambar lama secara default
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image && Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }
            $imagePath = $request->file('image')->store('public/news_images');
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $news->update([
            'title' => $request->title,
            // Slug otomatis diupdate di model News (boot() method)
            'content' => $request->content,
            'image' => $imagePath,
            // user_id tidak diupdate di sini, karena penulisnya tetap sama
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita dari database.
     */
    public function destroy(News $news)
    {
        // Hapus gambar dari storage jika ada
        if ($news->image && Storage::exists('public/' . $news->image)) {
            Storage::delete('public/' . $news->image);
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
