@extends('Admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6 md:space-y-8">
    
    <!-- Header dengan Gradient -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-700 p-6 md:p-10 shadow-2xl shadow-emerald-600/20">
        <!-- Decorative circles -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-cyan-300/20 rounded-full translate-y-1/2 -translate-x-1/4 blur-2xl"></div>
        <div class="absolute top-1/2 right-1/4 w-32 h-32 bg-emerald-300/20 rounded-full blur-2xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-xs font-medium mb-3 border border-white/30">
                    <span class="w-2 h-2 bg-green-300 rounded-full animate-pulse"></span>
                    System Online
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-2">
                    Halo, {{ Auth::user()->name ?? 'Admin' }}! 👋
                </h1>
                <p class="text-emerald-50 text-xs sm:text-sm md:text-base">Selamat datang di panel admin NusaRasa. Kelola data toko UMKM di sini.</p>
            </div>
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-white text-emerald-700 rounded-xl hover:bg-emerald-50 transition font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 group text-sm sm:text-base">
                <i class="fas fa-external-link-alt group-hover:rotate-12 transition-transform"></i> 
                <span>Lihat Landing Page</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 text-sm flex items-center gap-3 shadow-sm">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-check text-white text-sm"></i>
            </div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Stats Cards (Aesthetic Glassmorphism & Responsive Grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
        <!-- Total UMKM -->
        <div class="relative group overflow-hidden rounded-3xl bg-white border border-gray-100 p-5 sm:p-6 shadow-lg shadow-gray-200/50 hover:shadow-2xl hover:shadow-emerald-200/50 hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-400/20 to-teal-400/20 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center text-white text-lg sm:text-xl shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                        <i class="fas fa-store"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100">Total</span>
                </div>
                <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-1 tracking-tight">{{ $totalUmkm ?? 0 }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm font-medium">Total UMKM Terdaftar</p>
                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-2 text-xs text-emerald-600">
                    <i class="fas fa-arrow-up"></i>
                    <span class="font-semibold">Semua UMKM</span>
                </div>
            </div>
        </div>

        <!-- Status Publish -->
        <div class="relative group overflow-hidden rounded-3xl bg-white border border-gray-100 p-5 sm:p-6 shadow-lg shadow-gray-200/50 hover:shadow-2xl hover:shadow-green-200/50 hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center text-white text-lg sm:text-xl shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <span class="text-xs font-bold text-green-600 bg-green-50 px-3 py-1 rounded-full border border-green-100">Aktif</span>
                </div>
                <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-1 tracking-tight">{{ $publishCount ?? 0 }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm font-medium">Status Publish</p>
                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-2 text-xs text-green-600">
                    <i class="fas fa-globe"></i>
                    <span class="font-semibold">Sudah Live</span>
                </div>
            </div>
        </div>

        <!-- Status Draft -->
        <div class="relative group overflow-hidden rounded-3xl bg-white border border-gray-100 p-5 sm:p-6 shadow-lg shadow-gray-200/50 hover:shadow-2xl hover:shadow-amber-200/50 hover:-translate-y-1 transition-all duration-300 sm:col-span-2 lg:col-span-1">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-400/20 to-orange-400/20 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl group-hover:scale-150 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center text-white text-lg sm:text-xl shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span class="text-xs font-bold text-amber-600 bg-amber-50 px-3 py-1 rounded-full border border-amber-100">Pending</span>
                </div>
                <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-1 tracking-tight">{{ $draftCount ?? 0 }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm font-medium">Status Draft</p>
                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-2 text-xs text-amber-600">
                    <i class="fas fa-hourglass-half"></i>
                    <span class="font-semibold">Belum Diterbitkan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel UMKM (Aesthetic Modern & Responsive) -->
    <div class="relative overflow-hidden rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-200/50">
        <!-- Header Tabel dengan Gradient -->
        <div class="relative overflow-hidden bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-6 md:p-8">
            <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full -translate-y-1/2 translate-x-1/3 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-cyan-500/10 rounded-full translate-y-1/2 -translate-x-1/4 blur-2xl"></div>
            
            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-emerald-300 text-xs font-medium mb-2 border border-white/10">
                        <i class="fas fa-database"></i> Database
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-white">Daftar Web UMKM Terdaftar</h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-1">Kelola semua website UMKM yang terdaftar di platform</p>
                </div>
                <a href="{{ route('admin.portofolio.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl hover:from-red-600 hover:to-pink-700 transition font-semibold shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 hover:-translate-y-0.5 group text-sm sm:text-base">
                    <i class="fas fa-plus group-hover:rotate-90 transition-transform duration-300"></i> 
                    <span>Buat Web UMKM Baru</span>
                </a>
            </div>
        </div>
        
        <!-- Body Tabel (Bisa digeser horizontal jika di HP) -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600 min-w-[640px]">
                <thead>
                    <tr class="bg-gradient-to-r from-slate-50 to-gray-50 border-b border-gray-200">
                        <th class="px-6 py-4 font-bold text-slate-700 text-xs uppercase tracking-wider">Nama Toko</th>
                        <th class="px-6 py-4 font-bold text-slate-700 text-xs uppercase tracking-wider">URL Slug</th>
                        <th class="px-6 py-4 font-bold text-slate-700 text-xs uppercase tracking-wider">Template</th>
                        <th class="px-6 py-4 font-bold text-slate-700 text-xs uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 font-bold text-slate-700 text-xs uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($portofolios as $item)
                    <tr class="hover:bg-gradient-to-r hover:from-emerald-50/50 hover:to-teal-50/50 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-md shadow-emerald-500/20 group-hover:scale-110 transition-transform flex-shrink-0">
                                    {{ strtoupper(substr($item->nama_usaha, 0, 1)) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $item->nama_usaha }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <code class="bg-gradient-to-r from-emerald-50 to-teal-50 px-3 py-1.5 rounded-lg text-xs text-emerald-700 font-mono font-semibold border border-emerald-100">
                                /{{ $item->slug }}
                            </code>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold">
                                <i class="fas fa-palette text-slate-500"></i>
                                Template {{ $item->template ?? '1' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->status == 'publish')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-green-50 to-emerald-50 text-green-700 rounded-full text-xs font-semibold border border-green-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                    Publish
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-amber-50 to-orange-50 text-amber-700 rounded-full text-xs font-semibold border border-amber-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                    Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="p-2.5 text-blue-600 hover:bg-blue-50 rounded-xl transition group/btn" title="Edit">
                                    <i class="fas fa-pen text-sm group-hover/btn:scale-110 transition-transform"></i>
                                </a>
                                <a href="{{ url('/' . $item->slug) }}" target="_blank" class="p-2.5 text-emerald-600 hover:bg-emerald-50 rounded-xl transition group/btn" title="Lihat">
                                    <i class="fas fa-eye text-sm group-hover/btn:scale-110 transition-transform"></i>
                                </a>
                                <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus UMKM ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2.5 text-red-600 hover:bg-red-50 rounded-xl transition group/btn" title="Hapus">
                                        <i class="fas fa-trash text-sm group-hover/btn:scale-110 transition-transform"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="inline-flex flex-col items-center">
                                <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-3xl flex items-center justify-center mb-4 shadow-inner">
                                    <i class="fas fa-inbox text-4xl text-emerald-400"></i>
                                </div>
                                <p class="text-gray-500 font-medium mb-2">Belum ada data UMKM</p>
                                <p class="text-gray-400 text-sm mb-4">Mulai dengan menambahkan UMKM pertama Anda</p>
                                <a href="{{ route('admin.portofolio.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl hover:from-emerald-600 hover:to-teal-700 transition font-semibold shadow-lg shadow-emerald-500/30 text-sm">
                                    <i class="fas fa-plus"></i> Tambah UMKM Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Tabel -->
        @if($portofolios->count() > 0)
        <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-gray-50 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-sm text-gray-500">
                Menampilkan <span class="font-semibold text-gray-700">{{ $portofolios->count() }}</span> dari <span class="font-semibold text-gray-700">{{ $totalUmkm ?? 0 }}</span> UMKM
            </p>
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Data real-time
            </div>
        </div>
        @endif
    </div>

</div>
@endsection