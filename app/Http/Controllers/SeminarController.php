<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // <-- TAMBAHKAN BARIS INI
use App\Models\SeminarRegistration; // Import model pendaftaran
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Untuk validasi unique email

class SeminarController extends Controller
        {
            /**
             * Tampilkan formulir pendaftaran seminar.
             */
            public function showRegistrationForm()
            {
                return view('seminars.register'); // Panggil view seminars.register
            }

            /**
             * Simpan data pendaftaran seminar ke database.
             */
            public function storeRegistration(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'nim' => 'nullable|string|max:50',
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        // Pastikan email unik di tabel seminar_registrations
                        Rule::unique('seminar_registrations', 'email'),
                    ],
                    'phone' => 'nullable|string|max:20',
                    'faculty' => 'nullable|string|max:255',
                    'major' => 'nullable|string|max:255',
                ]);

                SeminarRegistration::create($request->all());

                return redirect()->back()->with('success', 'Pendaftaran seminar berhasil! Kami akan segera menghubungi Anda.');
            }
        }
