<?php
namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Mail; // Untuk mengirim email
        use App\Mail\ContactFormMail; // Akan kita buat Mail class ini

        class ContactController extends Controller
        {
            /**
             * Tampilkan formulir kontak.
             */
            public function showContactForm()
            {
                return view('contact.form');
            }

            /**
             * Kirim pesan dari formulir kontak.
             */
            public function submitContactForm(Request $request)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'subject' => 'required|string|max:255',
                    'message' => 'required|string',
                ]);

                // Kirim email
                // Mail::to('admin@ukmhebat.com')->send(new ContactFormMail($request->all()));
                // ^ Baris di atas ini akan diaktifkan setelah setup email SMTP

                // Untuk sekarang, kita hanya akan menampilkan pesan sukses
                return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim! Kami akan segera merespons.');
            }
        }
