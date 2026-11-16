@extends('Admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋
            </h1>
            <p class="text-gray-500 mt-1">Selamat datang di panel admin Nusarasa. Kelola data toko UMKM di sini.</p>
        </div>
        <a href="/" target="_blank" class="bg-[#10b981] hover:bg-emerald-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2 text-sm">
            <i class="fa-solid fa-up-right-from-square"></i> Lihat Landing Page
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white border border-gray-200 rounded-2xl p-8">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-store"></i></div>
            <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $totalUmkm }}</h3>
            <p class="text-gray-500 text-sm font-medium">Total UMKM</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl p-8">
            <div class="w-12 h-12 bg-gray-50 text-gray-600 rounded-xl flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-circle-check"></i></div>
            <h3 class="text-3xl font-bold text-gray-800 mb-1">Aktif</h3>
            <p class="text-gray-500 text-sm font-medium">Status Sistem</p>
        </div>
    </div>

    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Daftar Web UMKM Terdaftar</h3>
            <a href="{{ route('admin.portofolio.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition flex items-center gap-2">
                <i class="fa-solid fa-plus"></i> Buat Web UMKM Baru
            </a>
        </div>
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="bg-[#1e1b4b] text-white text-xs uppercase font-semibold">
                        <tr>
                            <th class="px-6 py-4">Nama Toko</th>
                            <th class="px-6 py-4">Pemilik</th>
                            <th class="px-6 py-4">URL Slug</th>
                            <th class="px-6 py-4">Template</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($umkmTerbaru as $umkm)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $umkm->nama_usaha }}</td>
                                <td class="px-6 py-4">Admin</td>
                                <td class="px-6 py-4 text-gray-500">/{{ $umkm->slug }}</td>
                                <td class="px-6 py-4">Warm Classic</td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 text-xs font-medium rounded-md {{ $umkm->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                        {{ ucfirst($umkm->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.portofolio.edit', $umkm->id) }}" class="text-gray-400 hover:text-blue-500 px-1"><i class="fa-solid fa-pen"></i></a>
                                    <a href="/{{ $umkm->slug }}" target="_blank" class="text-gray-400 hover:text-emerald-500 px-1"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-6 py-12 text-center text-gray-400 bg-gray-50/50">Belum ada data UMKM. Klik "Buat Web UMKM Baru" untuk memulai.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center gap-2">
            <i class="fa-regular fa-clock text-gray-400 text-lg"></i>
            <h3 class="font-bold text-gray-800 text-lg">Log Aktivitas Terbaru</h3>
        </div>
        <ul class="divide-y divide-gray-100">
            @forelse ($aktivitasTerbaru as $log)
                <li class="px-6 py-4 flex flex-col md:flex-row md:items-center justify-between gap-2">
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-800 font-medium">{{ $log->keterangan }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $log->nama_usaha }} — {{ $log->created_at?->diffForHumans() }}</p>
                        </div>
                    </div>
                </li>
            @empty
                <li class="px-6 py-8 text-center text-gray-500 text-sm">Belum ada aktivitas.</li>
            @endforelse
        </ul>
    </div>
@endsection