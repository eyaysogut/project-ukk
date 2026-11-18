@extends('Admin.layout')

@section('title', 'Tambah UMKM')

@section('content')
<div class="max-w-3xl mx-auto py-4">
    <h1 class="text-2xl font-bold text-emerald-800 mb-6">Tambah UMKM Baru</h1>

    @if($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm flex items-start gap-3">
            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Data UMKM -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Informasi UMKM</h3>
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug (URL) *</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" required placeholder="nama-usaha" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status *</label>
                    <select name="status" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="publish" @selected(old('status')=='publish')>Publish</option>
                        <option value="draft" @selected(old('status')=='draft')>Draft</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Template *</label>
                    <select name="template" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="1" @selected(old('template')=='1')>Template 1</option>
                        <option value="2" @selected(old('template')=='2')>Template 2 (Merah-Kuning)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto UMKM</label>
                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Bio / Deskripsi</label>
                <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('bio') }}</textarea>
            </div>
        </div>

        <!-- Produk -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-1 border-b pb-2">Produk / Menu</h3>
            <p class="text-sm text-gray-500 mb-4 mt-2">Tambahkan menu yang dijual UMKM ini.</p>
            <div id="produk-container">
                @include('Admin.partials.produk-fields', ['index' => 0])
            </div>
            <button type="button" id="add-produk" class="mt-2 px-4 py-2 bg-emerald-600 text-white text-sm font-medium rounded hover:bg-emerald-700">
                <i class="fa-solid fa-plus mr-1"></i> Tambah Produk Lagi
            </button>
        </div>

        <!-- Testimoni -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-1 border-b pb-2">Testimoni Pelanggan</h3>
            <p class="text-sm text-gray-500 mb-4 mt-2">Tambahkan ulasan pelanggan untuk membangun kepercayaan.</p>
            <div id="testimoni-container">
                @include('Admin.partials.testimoni-fields', ['index' => 0])
            </div>
            <button type="button" id="add-testimoni" class="mt-2 px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded hover:bg-yellow-600">
                <i class="fa-solid fa-plus mr-1"></i> Tambah Testimoni Lagi
            </button>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-emerald-600 text-white font-medium rounded hover:bg-emerald-700">
                <i class="fa-solid fa-save mr-1"></i> Simpan UMKM
            </button>
            <a href="{{ route('admin.portofolio.index') }}" class="px-6 py-2.5 bg-gray-200 text-gray-700 font-medium rounded hover:bg-gray-300">Batal</a>
        </div>
    </form>
</div>

<script>
    let idxProduk = 1;
    let idxTesti = 1;

    function produkRowHtml(i) {
        return `
        <div class="produk-row border border-gray-200 rounded-lg p-4 mb-3 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label><input type="text" name="produk_nama[${i}]" class="w-full border border-gray-300 rounded px-3 py-2"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label><input type="number" name="produk_harga[${i}]" class="w-full border border-gray-300 rounded px-3 py-2"></div>
            </div>
            <div class="mt-3"><label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label><textarea name="produk_deskripsi[${i}]" rows="2" class="w-full border border-gray-300 rounded px-3 py-2"></textarea></div>
            <div class="mt-3 flex items-end gap-3">
                <div class="flex-1"><label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label><input type="file" name="produk_foto_${i}" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 text-sm"></div>
                <button type="button" class="hapus-baris px-3 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm font-medium">Hapus</button>
            </div>
        </div>`;
    }

    function testimoniRowHtml(i) {
        return `
        <div class="testimoni-row border border-gray-200 rounded-lg p-4 mb-3 bg-yellow-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label><input type="text" name="testimoni_nama[${i}]" class="w-full border border-gray-300 rounded px-3 py-2"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label><input type="text" name="testimoni_jabatan[${i}]" class="w-full border border-gray-300 rounded px-3 py-2"></div>
            </div>
            <div class="mt-3"><label class="block text-sm font-medium text-gray-700 mb-1">Rating</label><select name="testimoni_rating[${i}]" class="w-full border border-gray-300 rounded px-3 py-2"><option value="5">5 Bintang ⭐⭐⭐⭐⭐</option><option value="4">4 Bintang ⭐⭐⭐⭐</option><option value="3">3 Bintang ⭐⭐⭐</option><option value="2">2 Bintang ⭐⭐</option><option value="1">1 Bintang ⭐</option></select></div>
            <div class="mt-3"><label class="block text-sm font-medium text-gray-700 mb-1">Komentar</label><textarea name="testimoni_komentar[${i}]" rows="2" class="w-full border border-gray-300 rounded px-3 py-2"></textarea></div>
            <div class="mt-3 flex items-end gap-3">
                <div class="flex-1"><label class="block text-sm font-medium text-gray-700 mb-1">Foto Pelanggan</label><input type="file" name="testimoni_foto_${i}" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 text-sm"></div>
                <button type="button" class="hapus-baris px-3 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm font-medium">Hapus</button>
            </div>
        </div>`;
    }

    document.getElementById('add-produk').addEventListener('click', () => {
        document.getElementById('produk-container').insertAdjacentHTML('beforeend', produkRowHtml(idxProduk++));
    });
    document.getElementById('add-testimoni').addEventListener('click', () => {
        document.getElementById('testimoni-container').insertAdjacentHTML('beforeend', testimoniRowHtml(idxTesti++));
    });
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('hapus-baris')) {
            e.target.closest('.produk-row, .testimoni-row').remove();
        }
    });
</script>
@endsection