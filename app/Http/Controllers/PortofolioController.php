<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::orderByDesc('created_at')->paginate(10);
        return view('Admin.index', compact('portofolios'));
    }

    public function create()
    {
        return view('Admin.create_portofolio');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha'      => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:portofolios,slug|regex:/^[a-z0-9-]+$/',
            'bio'             => 'nullable|string',
            'foto'            => 'nullable|image|max:2048',
            'no_wa'           => 'nullable|string|max:20',
            'produk_unggulan' => 'nullable|string|max:255',
            'status'          => 'required|in:draft,publish',
        ], [
            'slug.unique' => 'Slug sudah dipakai. Pilih slug lain.',
            'slug.regex'  => 'Slug hanya boleh huruf kecil, angka, dan tanda hubung (-).',
            'slug.required' => 'Slug wajib diisi.',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('umkm', 'public');
            $validated['foto'] = $path;
        }

        Portofolio::create($validated);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portofolio $portofolio)
    {
        return view('Admin.edit_portofolio', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $validated = $request->validate([
            'nama_usaha'      => 'required|string|max:255',
            'slug'            => [
                'required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/',
                Rule::unique('portofolios', 'slug')->ignore($portofolio->id),
            ],
            'bio'             => 'nullable|string',
            'foto'            => 'nullable|image|max:2048',
            'no_wa'           => 'nullable|string|max:20',
            'produk_unggulan' => 'nullable|string|max:255',
            'status'          => 'required|in:draft,publish',
        ], [
            'slug.unique' => 'Slug sudah dipakai portofolio lain.',
            'slug.regex'  => 'Slug hanya boleh huruf kecil, angka, dan tanda hubung (-).',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('foto')) {
            if ($portofolio->foto && Storage::disk('public')->exists($portofolio->foto)) {
                Storage::disk('public')->delete($portofolio->foto);
            }
            $path = $request->file('foto')->store('umkm', 'public');
            $validated['foto'] = $path;
        }

        $portofolio->update($validated);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->foto && Storage::disk('public')->exists($portofolio->foto)) {
            Storage::disk('public')->delete($portofolio->foto);
        }

        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    public function toggleStatus(Portofolio $portofolio)
    {
        $portofolio->update([
            'status' => $portofolio->status === 'publish' ? 'draft' : 'publish',
        ]);

        return redirect()->back()->with('success', 'Status berhasil diubah menjadi ' . strtoupper($portofolio->status));
    }
}