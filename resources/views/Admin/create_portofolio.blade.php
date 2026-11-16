@extends('Admin.layout')

@section('title', 'Tambah UMKM Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <a href="{{ route('admin.portofolio.index') }}" class="text-emerald-700 hover:text-emerald-800 font-semibold flex items-center gap-2 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Buat Web UMKM Baru</h2>
            <span class="bg-emerald-50 text-emerald-600 px-4 py-1.5 rounded-full text-sm font-semibold border border-emerald-100">
                Formulir Pendaftaran UMKM
            </span>
        </div>

        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-emerald-600 px-6 py-4 flex items-center gap-3">
                    <i class="fa-regular fa-id-badge text-white text-xl"></i>
                    <h3 class="text-white font-bold">Bagian 1: Profil UMKM</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Usaha <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="no_wa" value="{{ old('no_wa') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <input type="text" name="produk_unggulan" value="{{ old('produk_unggulan') }}" placeholder="Contoh: Kuliner Tradisional" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Logo UMKM</label>
                        <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi UMKM <span class="text-red-500">*</span></label>
                        <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none" required>{{ old('bio') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-[#1e1b4b] px-6 py-4 flex items-center gap-3">
                    <i class="fa-solid fa-layer-group text-white text-xl"></i>
                    <h3 class="text-white font-bold">Bagian 2: Template & Slug (URL)</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Template <span class="text-red-500">*</span></label>
                        <select name="template" class="w-full border border-gray-300 rounded-lg px-4 py-2 outline-none">
                            <option value="template1">Template 1 (Warm Classic)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Custom Slug URL <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" value="{{ old('slug') }}" placeholder="contoh: kue-enak-bu-sri" class="w-full border border-gray-300 rounded-lg px-4 py-2 outline-none" required>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status Publikasi <span class="text-red-500">*</span></label>
                        <select name="status" class="w-full md:w-1/2 border border-gray-300 rounded-lg px-4 py-2 outline-none">
                            <option value="draft">Draft (Belum Tampil)</option>
                            <option value="publish">Publish (Tampil)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.portofolio.index') }}" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50">Batal</a>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2.5 rounded-lg flex items-center gap-2"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection