<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;

class PublicController extends Controller
{
    public function show($slug)
    {
        // 1. Cari portofolio berdasarkan slug & status publish
        $portofolio = Portofolio::where('slug', $slug)
                                ->where('status', 'publish')
                                ->first();

        // 2. Jika tidak ketemu, Controller mengembalikan response 404
        // abort(404) akan otomatis menampilkan halaman error 404 Laravel,
        // ATAU kita arahkan ke view kustom kita (not_found.blade.php)
        if (!$portofolio) {
            // Mengembalikan view kustom dengan HTTP status code 404
            return response()->view('Template.not_found', [], 404);
            
            // CATATAN: Kalau mau pakai halaman 404 bawaan Laravel, bisa ganti jadi:
            // abort(404);
        }

        // 3. Jika ketemu, tampilkan halaman portofolio
        return view('Template.template1', compact('portofolio'));
    }
}