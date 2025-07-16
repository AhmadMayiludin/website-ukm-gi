<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeminarRegistration; // Import model pendaftaran seminar
use Illuminate\Http\Request;

class SeminarRegistrationController extends Controller
{
    /**
     * Tampilkan daftar semua pendaftar seminar di halaman admin.
     */
    public function index()
    {
        $registrations = SeminarRegistration::orderBy('created_at', 'desc')->get(); // Ambil semua pendaftar
        return view('admin.registrations.index', compact('registrations'));
    }

    /**
     * Metode lainnya (create, store, show, edit, update, destroy) bisa diabaikan atau disesuaikan
     * jika Anda tidak ingin admin bisa menambah/mengedit pendaftar manual dari sini,
     * hanya melihat dan menghapus.
     */

    public function create() { /* Tidak perlu form create di admin jika hanya daftar via publik */ return redirect()->route('admin.registrations.index'); }
    public function store(Request $request) { /* Tidak perlu store di admin */ return redirect()->route('admin.registrations.index'); }
    public function show(SeminarRegistration $registration) { return redirect()->route('admin.registrations.index'); }
    public function edit(SeminarRegistration $registration) { /* Opsional: form edit pendaftar */ return redirect()->route('admin.registrations.index'); }
    public function update(Request $request, SeminarRegistration $registration) { /* Opsional: update pendaftar */ return redirect()->route('admin.registrations.index'); }

    /**
     * Hapus pendaftar dari database.
     */
    public function destroy(SeminarRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Pendaftar berhasil dihapus!');
    }
}
