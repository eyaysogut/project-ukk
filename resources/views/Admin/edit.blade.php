@extends('Admin.layout')

@section('title', 'Edit Data UMKM')

@section('content')
    <div class="max-w-3xl bg-white border border-gray-200 rounded-xl overflow-hidden">
        
        <div class="p-6 border-b border-gray-200">
            <h3 class="font-semibold text-gray-800">Edit Data Portofolio</h3>
            <p class="text-sm text-gray-500 mt-1">Perbarui informasi data UMKM di bawah ini.</p>
        </div>

        <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" class="p-6 space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Usaha</label>
                <input type="text" name="nama_usaha" value="{{ old('nama_usaha', $portofolio->nama_usaha) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                @error('nama_usaha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Slug URL</label>
                <div class="flex items-center">
                    <span class="bg-gray-100 border border-r-0 border-gray-300 px-4 py-2 rounded-l-lg text-gray-500 text-sm">reyal_12rpl2.test/</span>
                    <input type="text" name="slug" value="{{ old('slug', $portofolio->slug) }}" class="w-full border border-gray-300 rounded-r-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                </div>
                @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio / Deskripsi Singkat</label>
                <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('bio', $portofolio->bio) }}</textarea>
                @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No WhatsApp</label>
                    <input type="text" name="no_wa" value="{{ old('no_wa', $portofolio->no_wa) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">
                    @error('no_wa') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link Foto (Opsional)</label>
                    <input type="url" name="foto" value="{{ old('foto', $portofolio->foto) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">
                    @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Produk Unggulan</label>
                    <input type="text" name="produk_unggulan" value="{{ old('produk_unggulan', $portofolio->produk_unggulan) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">
                    @error('produk_unggulan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="draft" {{ old('status', $portofolio->status) == 'draft' ? 'selected' : '' }}>Draft (Belum Tayang)</option>
                        <option value="publish" {{ old('status', $portofolio->status) == 'publish' ? 'selected' : '' }}>Publish (Tayang)</option>
                    </select>
                    @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4 border-t border-gray-200 flex justify-end gap-3">
                <a href="{{ route('admin.portofolio.index') }}" class="px-4 py-2 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium transition">Batal</a>
                <button type="submit" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition">Update Data</button>
            </div>
        </form>
    </div>
@endsection