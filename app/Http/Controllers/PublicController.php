<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Testimonial;

class PublicController extends Controller
{
    public function show($slug)
    {
        // Cari data berdasarkan slug
        $portofolio = Portofolio::where('slug', $slug)->first();

        // Jika tidak ada ATAU statusnya bukan 'publish' → 404
        if (!$portofolio || $portofolio->status !== 'publish') {
            abort(404, 'Halaman portofolio tidak ditemukan.');
        }

        // Ambil testimonials
        $testimonials = Testimonial::where('portofolio_id', $portofolio->id)->get();

        // Pilih template
        $viewName = ($portofolio->template === 'template2' || $portofolio->template === '2')
                    ? 'Template.template2'
                    : 'Template.template1';

        return view($viewName, compact('portofolio', 'testimonials'));
    }
}