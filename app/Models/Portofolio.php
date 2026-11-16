<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    protected $fillable = [
        'nama_usaha',
        'slug',
        'bio',
        'foto',
        'no_wa',
        'produk_unggulan',
        'status',
    ];

    public function scopePublish($query)
    {
        return $query->where('status', 'publish');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function logs()
    {
        return $this->hasMany(LogActivity::class, 'portfolio_id');
    }
}