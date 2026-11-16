<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portofolio->nama_usaha }} — Portofolio UMKM Nusarasa</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm py-4 relative z-50">
        <div class="max-w-5xl mx-auto px-4 flex justify-between items-center">
            <!-- Nama Usaha -->
            <h1 class="font-bold text-xl text-emerald-600">{{ $portofolio->nama_usaha }}</h1>
            
            <div class="flex items-center gap-3 md:gap-5">
                <!-- TOMBOL KEMBALI KE ADMIN (Hanya muncul jika sedang login) -->
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-emerald-600 text-sm font-semibold transition flex items-center gap-2">
                        <i class="fa-solid fa-arrow-left"></i> <span class="hidden md:inline">Kembali ke Admin</span>
                    </a>
                @endauth

                <!-- Tombol WhatsApp Navbar -->
                @if($portofolio->no_wa)
                <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" 
                   class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2 shadow-sm">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span class="hidden md:inline">Hubungi Kami</span>
                </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="relative bg-emerald-600 text-white py-20 overflow-hidden">
        <!-- Hiasan background -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase">UMKM Unggulan</span>
            <h1 class="text-4xl md:text-5xl font-bold mt-4 mb-4">{{ $portofolio->nama_usaha }}</h1>
            <p class="text-lg md:text-xl text-emerald-100 max-w-2xl mx-auto leading-relaxed">
                {{ $portofolio->bio ?? 'Kami menyajikan produk terbaik dengan kualitas unggulan untuk Anda.' }}
            </p>
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="max-w-4xl mx-auto px-4 py-16 -mt-8 relative z-20 flex-1 w-full">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
            
            <!-- FOTO (Menggunakan Storage::url) -->
            <div class="md:w-1/2 bg-gray-200 min-h-[300px] flex items-center justify-center overflow-hidden relative">
                @if($portofolio->foto)
                    <img src="{{ Storage::url($portofolio->foto) }}" alt="{{ $portofolio->nama_usaha }}" class="w-full h-full object-cover absolute inset-0">
                @else
                    <div class="text-gray-400 flex flex-col items-center">
                        <i class="fa-regular fa-image text-5xl mb-3"></i>
                        <span class="text-sm font-medium">Foto belum tersedia</span>
                    </div>
                @endif
            </div>

            <!-- DETAIL -->
            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Tentang Kami</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $portofolio->bio ?? 'Deskripsi usaha belum ditambahkan.' }}
                </p>

                @if($portofolio->produk_unggulan)
                <div class="bg-emerald-50 rounded-xl p-4 mb-6 border border-emerald-100">
                    <p class="text-xs text-emerald-800 font-bold uppercase tracking-wider mb-1">Kategori / Produk Unggulan</p>
                    <p class="text-lg font-bold text-emerald-700">{{ $portofolio->produk_unggulan }}</p>
                </div>
                @endif

                @if($portofolio->no_wa)
                <a href="https://wa.me/{{ $portofolio->no_wa }}?text=Halo%20{{ urlencode($portofolio->nama_usaha) }},%20saya%20tertarik%20dengan%20produk%20Anda." 
                   target="_blank"
                   class="w-full bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold py-3.5 px-6 rounded-xl text-center transition flex items-center justify-center gap-2 shadow-lg shadow-green-500/30">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    Pesan via WhatsApp
                </a>
                @endif
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-8 text-center text-gray-500 text-sm mt-auto">
        <p>&copy; {{ date('Y') }} {{ $portofolio->nama_usaha }}. Dibuat dengan <i class="fa-solid fa-heart text-red-500"></i> oleh Nusarasa.</p>
    </footer>

</body>
</html>