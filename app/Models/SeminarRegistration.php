<?php
namespace App\Models;

        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;

        class SeminarRegistration extends Model
        {
            use HasFactory;

            // Nama tabel jika berbeda dari konvensi Laravel (plural dari nama model)
            protected $table = 'seminar_registrations';

            // Kolom-kolom yang boleh diisi secara massal (mass assignable)
            protected $fillable = [
                'name',
                'nim',
                'email',
                'phone',
                'faculty',
                'major',
            ];

            // Kolom yang harus di-cast ke tipe data tertentu (opsional)
            // protected $casts = [
            //     'created_at' => 'datetime',
            //     'updated_at' => 'datetime',
            // ];
        }
