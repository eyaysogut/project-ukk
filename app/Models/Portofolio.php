<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolios';

    protected $fillable = [
        'nama_usaha',
        'slug',
        'bio',
        'foto',
        'no_wa',
        'produk_unggulan',
        'status',
        'template',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'portofolio_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'portofolio_id');
    }
}