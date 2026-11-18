<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ==========================================
    // TAMBAHAN UNTUK MENCATAT LOGIN & LOGOUT
    // ==========================================
    protected static function booted(): void
    {
        // Mencatat saat Admin Login
        Event::listen(Login::class, function (Login $event) {
            static::catatAuth('LOGIN', 'Admin masuk ke sistem', $event->user);
        });

        // Mencatat saat Admin Logout
        Event::listen(Logout::class, function (Logout $event) {
            static::catatAuth('LOGOUT', 'Admin keluar dari sistem', $event->user);
        });
    }

    protected static function catatAuth(string $aksi, string $keterangan, $user): void
    {
        if (!$user) return;

        $nama = $user->name ?? $user->email ?? 'Admin';
        
        try {
            LogActivity::unguarded(function () use ($aksi, $keterangan, $nama) {
                LogActivity::create([
                    'aksi' => $aksi,
                    'keterangan' => $keterangan,
                    'nama_usaha' => $nama,
                    'created_at' => now(),
                ]);
            });
        } catch (\Throwable $e) {
            report($e); // Biarkan login tetap jalan meskipun log gagal
        }
    }
}