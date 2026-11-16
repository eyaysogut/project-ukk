<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';

    public $timestamps = false;

    protected $fillable = [
        'aksi',
        'portfolio_id',
        'nama_usaha',
        'keterangan',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class, 'portfolio_id');
    }
}