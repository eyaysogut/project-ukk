<div class="produk-row border border-gray-200 rounded-lg p-4 mb-3 bg-gray-50">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="produk_nama[{{ $index }}]" value="{{ old("produk_nama.$index", $produk->nama ?? '') }}" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="cth: Burger Spesial">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
            <input type="number" name="produk_harga[{{ $index }}]" value="{{ old("produk_harga.$index", $produk->harga ?? '') }}" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="15000">
        </div>
    </div>
    <div class="mt-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
        <textarea name="produk_deskripsi[{{ $index }}]" rows="2" class="w-full border border-gray-300 rounded px-3 py-2">{{ old("produk_deskripsi.$index", $produk->deskripsi ?? '') }}</textarea>
    </div>
    <div class="mt-3 flex items-end gap-3">
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
            <input type="file" name="produk_foto_{{ $index }}" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <button type="button" class="hapus-baris px-3 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm font-medium">Hapus</button>
    </div>
</div>