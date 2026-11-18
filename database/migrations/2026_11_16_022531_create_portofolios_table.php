@extends('Admin.layout')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-emerald-700 mb-6">Tambah UMKM Baru</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Data UMKM -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi UMKM</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Usaha *</label>
                    <input type="text" name="nama_usaha" value="{{ old('nama_usaha') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp *</label>
                    <input type="text" name="no_wa" value="{{ old('no_wa') }}" required placeholder="628123456789" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" required class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                    <select name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="publish" @selected(old('status')=='publish')>Publish</option>
                        <option value="draft" @selected(old('status')=='draft')>Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Template</label>
                    <select name="template" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="1">Template 1</option>
                        <option value="2">Template 2 (Merah-Kuning)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto UMKM</label>
                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio / Deskripsi</label>
                <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('bio') }}</textarea>
            </div>
        </div>

        <!-- Produk -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Produk</h3>
            <p class="text-sm text-gray-500 mb-4">Tambahkan menu/produk UMKM ini.</p>

            <div id="produk-container">
                @include('Admin.partials.produk-fields', ['index' => 0])
            </div>

            <button type="button" id="add-produk" class="mt-2 px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah Produk Lagi</button>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">Simpan UMKM</button>
            <a href="{{ route('admin.portofolio.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
        </div>
    </form>
</div>

<script>
    let idx = 1;
    function rowHtml(i) {
        return `
        <div class="produk-row border border-gray-200 rounded-lg p-4 mb-3 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="produk_nama[${i}]" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="cth: Burger Spesial">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="produk_harga[${i}]" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="15000">
                </div>
            </div>
            <div class="mt-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="produk_deskripsi[${i}]" rows="2" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <div class="mt-3 flex items-end gap-3">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                    <input type="file" name="produk_foto_${i}" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <button type="button" class="hapus-row px-3 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200">Hapus</button>
            </div>
        </div>`;
    }
    document.getElementById('add-produk').addEventListener('click', function () {
        document.getElementById('produk-container').insertAdjacentHTML('beforeend', rowHtml(idx++));
    });
    document.getElementById('produk-container').addEventListener('click', function (e) {
        if (e.target.classList.contains('hapus-row')) {
            e.target.closest('.produk-row').remove();
        }
    });
</script>
@endsection