<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Tampilkan halaman "Tentang Kami".
     */
    public function about()
    {
        $pageContent = [
            'title' => 'Tentang UKM Galeri Investasi',
            'body' => '<p>UKM Galeri Investasi adalah wadah bagi mahasiswa untuk belajar dan mendalami dunia pasar modal. Kami berkomitmen untuk meningkatkan literasi keuangan dan mencetak investor muda yang kompeten.</p><p>Melalui berbagai program seperti seminar, workshop, simulasi investasi, dan diskusi rutin, kami berusaha menciptakan lingkungan belajar yang interaktif dan suportif.</p><p>Bergabunglah bersama kami untuk menjelajahi peluang di pasar modal dan mengembangkan potensi Anda di bidang investasi.</p>',
        ];

        return view('info.about', compact('pageContent'));
    }
}
