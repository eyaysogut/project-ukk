<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    // TAMBAHKAN 'user_id' DI SINI
    protected $fillable = [
        'nama_usaha', 'slug', 'bio', 'foto', 'no_wa', 
        'produk_unggulan', 'status', 'template', 'user_id'
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // TAMBAHKAN FUNGSI INI UNTUK RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}