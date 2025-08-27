<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Tampilkan daftar semua berita/kegiatan.
     */
    public function index()
    {
        // Ambil semua berita dari database, urutkan dari yang terbaru
        $news = News::orderBy('created_at', 'desc')->paginate(9);

        return view('news.index', compact('news'));
    }

    /**
     * Tampilkan detail berita/kegiatan tertentu.
     */
    public function show(News $news)
    {
        // Pastikan berita sudah dipublikasi sebelum ditampilkan
        if (is_null($news->published_at) || $news->published_at > Carbon::now()) {
            abort(404);
        }

        return view('news.show', compact('news'));
    }

    /**
     * Tampilkan form untuk membuat berita baru (jika diperlukan untuk admin).
     */
    public function create()
    {
        // Pastikan hanya admin yang bisa akses
        if (!Auth::check()) {
            abort(403);
        }

        return view('news.create');
    }

    /**
     * Simpan berita baru ke database (jika diperlukan untuk admin).
     */
    public function store(Request $request)
    {
        // Pastikan hanya admin yang bisa akses
        if (!Auth::check()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
        ]);

        // Generate slug dari title
        $validated['slug'] = Str::slug($validated['title']);

        // Handle upload gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Set default published_at jika tidak diisi
        if (empty($validated['published_at'])) {
            $validated['published_at'] = Carbon::now();
        }

        // Buat excerpt otomatis jika tidak diisi
        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);
        }

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Berita berhasil dibuat!');
    }

    /**
     * Tampilkan form edit berita (jika diperlukan untuk admin).
     */
    public function edit(News $news)
    {
        // Pastikan hanya admin yang bisa akses
        if (!Auth::check()) {
            abort(403);
        }

        return view('news.edit', compact('news'));
    }

    /**
     * Update berita di database (jika diperlukan untuk admin).
     */
    public function update(Request $request, News $news)
    {
        // Pastikan hanya admin yang bisa akses
        if (!Auth::check()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author' => 'nullable|string|max:100',
            'published_at' => 'nullable|date',
        ]);

        // Update slug jika title berubah
        if ($validated['title'] !== $news->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image) {
                \Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        // Buat excerpt otomatis jika tidak diisi
        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Berita berhasil diupdate!');
    }

    /**
     * Hapus berita dari database (jika diperlukan untuk admin).
     */
    public function destroy(News $news)
    {
        // Pastikan hanya admin yang bisa akses
        if (!Auth::check()) {
            abort(403);
        }

        // Hapus gambar jika ada
        if ($news->image) {
            \Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}
