<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Produk;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::with(['produks', 'testimonials'])->latest()->get();
        $totalUmkm = Portofolio::count();
        return view('Admin.admin', compact('portofolios', 'totalUmkm'));
    }

    public function create() { return view('Admin.create_portofolio'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255', 'no_wa' => 'required|string|max:20',
            'bio' => 'nullable|string', 'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|unique:portofolios,slug', 'status' => 'required|in:publish,draft', 'template' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) $validated['foto'] = $request->file('foto')->store('portofolios', 'public');
        $portofolio = Portofolio::create($validated);

        // Simpan Produk
        if ($request->has('produk_nama')) {
            foreach ($request->produk_nama as $index => $namaProduk) {
                if (!empty($namaProduk)) {
                    $data = ['portofolio_id' => $portofolio->id, 'nama' => $namaProduk, 'harga' => $request->produk_harga[$index] ?? 0, 'deskripsi' => $request->produk_deskripsi[$index] ?? null];
                    if ($request->hasFile("produk_foto_$index")) $data['foto'] = $request->file("produk_foto_$index")->store('produk', 'public');
                    Produk::create($data);
                }
            }
        }

        // Simpan Testimoni
        if ($request->has('testimoni_nama')) {
            foreach ($request->testimoni_nama as $index => $namaPelanggan) {
                if (!empty($namaPelanggan)) {
                    $data = ['portofolio_id' => $portofolio->id, 'nama_pelanggan' => $namaPelanggan, 'jabatan' => $request->testimoni_jabatan[$index] ?? null, 'rating' => $request->testimoni_rating[$index] ?? 5, 'komentar' => $request->testimoni_komentar[$index] ?? ''];
                    if ($request->hasFile("testimoni_foto_$index")) $data['foto'] = $request->file("testimoni_foto_$index")->store('testimoni', 'public');
                    Testimonial::create($data);
                }
            }
        }
        return redirect()->route('admin.portofolio.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $portofolio = Portofolio::with(['produks', 'testimonials'])->findOrFail($id);
        return view('Admin.edit_portofolio', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255', 'no_wa' => 'required|string|max:20',
            'bio' => 'nullable|string', 'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|unique:portofolios,slug,' . $id, 'status' => 'required|in:publish,draft', 'template' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($portofolio->foto) Storage::disk('public')->delete($portofolio->foto);
            $validated['foto'] = $request->file('foto')->store('portofolios', 'public');
        } else { unset($validated['foto']); }

        $portofolio->update($validated);
        $portofolio->produks()->delete();
        $portofolio->testimonials()->delete();

        if ($request->has('produk_nama')) {
            foreach ($request->produk_nama as $index => $namaProduk) {
                if (!empty($namaProduk)) {
                    $data = ['portofolio_id' => $portofolio->id, 'nama' => $namaProduk, 'harga' => $request->produk_harga[$index] ?? 0, 'deskripsi' => $request->produk_deskripsi[$index] ?? null];
                    if ($request->hasFile("produk_foto_$index")) $data['foto'] = $request->file("produk_foto_$index")->store('produk', 'public');
                    Produk::create($data);
                }
            }
        }

        if ($request->has('testimoni_nama')) {
            foreach ($request->testimoni_nama as $index => $namaPelanggan) {
                if (!empty($namaPelanggan)) {
                    $data = ['portofolio_id' => $portofolio->id, 'nama_pelanggan' => $namaPelanggan, 'jabatan' => $request->testimoni_jabatan[$index] ?? null, 'rating' => $request->testimoni_rating[$index] ?? 5, 'komentar' => $request->testimoni_komentar[$index] ?? ''];
                    if ($request->hasFile("testimoni_foto_$index")) $data['foto'] = $request->file("testimoni_foto_$index")->store('testimoni', 'public');
                    Testimonial::create($data);
                }
            }
        }
        return redirect()->route('admin.portofolio.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::findOrFail($id);
        if ($portofolio->foto) Storage::disk('public')->delete($portofolio->foto);
        $portofolio->delete();
        return redirect()->route('admin.portofolio.index')->with('success', 'Data berhasil dihapus!');
    }
}