<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- TAMBAHKAN KODE INI DI SINI ---

/** <-- PASTIKAN INI ADA
 * Get the user's admin status.
 *
 * @return bool
 */
public function getIsAdminAttribute(): bool
{
    // Untuk sekarang, kita akan asumsikan user dengan ID 1 adalah admin.
    // Anda bisa mengubah logika ini nanti, misalnya:
    // return $this->role === 'admin'; // Jika Anda punya kolom 'role' di tabel users
    // return in_array($this->email, ['admin@example.com', 'superadmin@example.com']); // Berdasarkan email

    return $this->id === 1;
}

// --- AKHIR DARI KODE YANG DITAMBAHKAN ---

}
