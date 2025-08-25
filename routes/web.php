<?php

use Illuminate\Support\Facades\Route;
// Gunakan alias jika nama controller sama tapi di namespace berbeda
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SeminarRegistrationController as AdminSeminarRegistrationController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Halaman Beranda (Homepage)
Route::get('/', function () {
    return view('pages.home');
})->name('home');


// --- RUTE PUBLIK LAINNYA ---

// Rute Berita & Kegiatan
Route::get('/berita-kegiatan', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita-kegiatan/{news:slug}', [NewsController::class, 'show'])->name('news.show');

// Rute Halaman Info UKM
Route::get('/info/tentang-kami', [InfoController::class, 'about'])->name('info.about');

// Rute Kontak
Route::get('/kontak', [ContactController::class, 'showContactForm'])->name('contact.show');
Route::post('/kontak', [ContactController::class, 'submitContactForm'])->name('contact.submit');

// Rute Pendaftaran Seminar
Route::get('/seminar/daftar', [SeminarController::class, 'showRegistrationForm'])->name('seminars.register.form');
Route::post('/seminar/daftar', [SeminarController::class, 'storeRegistration'])->name('seminars.register.store');


// Rute Autentikasi Laravel Breeze (Login/Register/Dashboard)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute Admin untuk Berita
    Route::resource('admin/news', AdminNewsController::class)->names('admin.news');

    // Rute Admin untuk Pendaftar Seminar
    Route::resource('admin/registrations', AdminSeminarRegistrationController::class)->only(['index', 'destroy'])->names('admin.registrations');
});

// Ini adalah baris yang menyertakan semua rute login/register/reset password dari Laravel Breeze
require __DIR__.'/auth.php';
