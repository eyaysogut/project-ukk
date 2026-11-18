<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Produk extends Model
{
    protected $table = 'produks';
    protected $fillable = ['portofolio_id', 'nama', 'harga', 'deskripsi', 'foto'];
    public function portofolio() { return $this->belongsTo(Portofolio::class, 'portofolio_id'); }
}