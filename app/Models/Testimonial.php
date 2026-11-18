<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $fillable = ['portofolio_id', 'nama_pelanggan', 'jabatan', 'rating', 'komentar', 'foto'];
    public function portofolio() { return $this->belongsTo(Portofolio::class, 'portofolio_id'); }
}