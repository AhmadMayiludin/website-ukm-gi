<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Untuk mengirim email
use App\Mail\ContactFormMail; // Mail class

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

        // Kirim email ke admin
        Mail::to('ahmadmayiludin26@gmail.com')->send(
            new ContactFormMail($request->all())
        );

        // Redirect dengan pesan sukses
        return redirect()->back()->with(
            'success',
            'Pesan Anda berhasil terkirim! Kami akan segera merespons.'
        );
    }
}
