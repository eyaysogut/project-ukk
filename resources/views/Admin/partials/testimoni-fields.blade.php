<div class="testimoni-row border border-gray-200 rounded-lg p-4 mb-3 bg-yellow-50">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
            <input type="text" name="testimoni_nama[{{ $index }}]" value="{{ old("testimoni_nama.$index", $testimoni->nama_pelanggan ?? '') }}" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="cth: Budi Santoso">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan / Keterangan</label>
            <input type="text" name="testimoni_jabatan[{{ $index }}]" value="{{ old("testimoni_jabatan.$index", $testimoni->jabatan ?? '') }}" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="cth: Pelanggan Setia">
        </div>
    </div>
    <div class="mt-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
        <select name="testimoni_rating[{{ $index }}]" class="w-full border border-gray-300 rounded px-3 py-2">
            @for($r = 5; $r >= 1; $r--)
                <option value="{{ $r }}" @selected(old("testimoni_rating.$index", $testimoni->rating ?? 5) == $r)>{{ $r }} Bintang {{ str_repeat('⭐', $r) }}</option>
            @endfor
        </select>
    </div>
    <div class="mt-3">
        <label class="block text-sm font-medium text-gray-700 mb-1">Komentar</label>
        <textarea name="testimoni_komentar[{{ $index }}]" rows="2" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Tulis pengalaman pelanggan...">{{ old("testimoni_komentar.$index", $testimoni->komentar ?? '') }}</textarea>
    </div>
    <div class="mt-3 flex items-end gap-3">
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Foto Pelanggan (opsional)</label>
            <input type="file" name="testimoni_foto_{{ $index }}" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <button type="button" class="hapus-baris px-3 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm font-medium">Hapus</button>
    </div>
</div>