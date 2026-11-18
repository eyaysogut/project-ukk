<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portofolio->nama_usaha }} — Portofolio UMKM Nusarasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-brand-red { background-color: #991b1b; }
        .text-brand-red { color: #991b1b; }
        .bg-cream { background-color: #fdf8f5; }
        .bg-circle { position: absolute; border-radius: 50%; background: rgba(255,255,255,0.1); }
    </style>
</head>
<body class="bg-cream text-gray-800 overflow-x-hidden flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-brand-red text-2xl font-bold tracking-tighter italic">
                {{ $portofolio->nama_usaha }}
            </div>
            <div class="hidden md:flex gap-6 text-sm font-semibold text-gray-600">
                <a href="#" class="hover:text-brand-red transition">Home</a>
                <a href="#menu" class="hover:text-brand-red transition">Menu</a>
                <a href="#ulasan" class="hover:text-brand-red transition">Ulasan</a>
            </div>
            <div class="flex items-center gap-4">
                @auth
                <a href="{{ route('admin.dashboard') }}" class="hidden md:flex text-gray-500 hover:text-brand-red text-sm font-semibold transition items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Admin
                </a>
                @endauth
                @if($portofolio->no_wa)
                <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" class="bg-brand-red hover:bg-red-800 text-white px-6 py-2 rounded-full text-sm font-bold transition shadow-lg shadow-red-900/30">
                    ORDER NOW
                </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="relative bg-brand-red pt-16 pb-32 overflow-hidden">
        <div class="bg-circle w-96 h-96 -top-20 -left-20"></div>
        <div class="bg-circle w-64 h-64 bottom-10 right-10"></div>
        <div class="max-w-6xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight mb-4 uppercase">
                    Nikmati Kelezatan <br> <span class="text-yellow-300 italic">Spesial</span> dari Kami
                </h1>
                <p class="text-red-100 text-lg mb-8 max-w-lg mx-auto md:mx-0">
                    {{ $portofolio->bio ?? 'Kami menyajikan produk terbaik dengan bahan berkualitas untuk momen spesial Anda.' }}
                </p>
                @if($portofolio->no_wa)
                <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" class="inline-flex items-center gap-2 bg-white text-brand-red font-bold px-8 py-3 rounded-full hover:bg-gray-100 transition shadow-xl">
                    <i class="fa-brands fa-whatsapp text-xl"></i> Pesan via WhatsApp
                </a>
                @endif
            </div>
            <!-- HERO: PAKAI LOGO USAHA -->
            <div class="md:w-1/2 flex justify-center relative">
                <div class="w-72 h-72 md:w-96 md:h-96 rounded-full border-8 border-white/20 overflow-hidden shadow-2xl relative z-10 bg-red-800">
                    @if($portofolio->logo)
                        <img src="{{ Storage::url($portofolio->logo) }}" alt="{{ $portofolio->nama_usaha }}" class="w-full h-full object-cover">
                    @elseif($portofolio->foto)
                        <img src="{{ Storage::url($portofolio->foto) }}" alt="{{ $portofolio->nama_usaha }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-white/50">
                            <i class="fa-solid fa-store text-7xl"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto px-4 -mt-20 relative z-20 flex-1 w-full mb-12" id="menu">
        <div class="bg-white rounded-[2.5rem] shadow-xl p-8 md:p-12 border border-gray-100">
            
            <!-- SEKSI PRODUK -->
            <div class="mb-16">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-brand-red mb-2">Menu Spesial</h2>
                    <p class="text-gray-500 text-sm">Pilihan produk terbaik yang wajib Anda coba.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">
                    <!-- KARTU PRODUK 1: PAKAI FOTO PRODUK -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-4 relative group hover:shadow-lg transition duration-300 flex flex-col h-full">
                        <div class="h-48 w-full bg-gray-100 rounded-xl mb-4 overflow-hidden relative">
                            @if($portofolio->foto)
                                <img src="{{ Storage::url($portofolio->foto) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300"><i class="fa-solid fa-box-open text-4xl"></i></div>
                            @endif
                        </div>
                        <div class="flex-1 flex flex-col">
                            <h4 class="font-bold text-gray-800 text-xl leading-tight mb-2">{{ $portofolio->produk_unggulan ?? 'Produk Spesial' }}</h4>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">{{ $portofolio->bio }}</p>
                            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
                                <span class="text-brand-red font-bold text-lg">Rp 15.000</span>
                                @if($portofolio->no_wa)
                                <a href="https://wa.me/{{ $portofolio->no_wa }}?text=Halo%20{{ urlencode($portofolio->nama_usaha) }}%2C%20saya%20mau%20pesan" target="_blank" class="bg-brand-red text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-red-800 transition flex items-center gap-1">
                                    <i class="fa-brands fa-whatsapp"></i> Pesan
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- KARTU PRODUK 2 (Hiasan) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-4 relative opacity-80 flex flex-col h-full">
                        <div class="h-48 w-full bg-gray-100 rounded-xl mb-4 flex items-center justify-center">
                            <i class="fa-regular fa-image text-gray-300 text-4xl"></i>
                        </div>
                        <div class="flex-1 flex flex-col">
                            <h4 class="font-bold text-gray-400 text-xl mb-2">Segera Hadir</h4>
                            <p class="text-sm text-gray-400 mb-4">Produk baru akan segera ditambahkan.</p>
                            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
                                <span class="text-gray-300 font-bold text-lg">Rp -</span>
                            </div>
                        </div>
                    </div>

                    <!-- KARTU PRODUK 3 (Hiasan) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-4 relative opacity-80 flex flex-col h-full">
                        <div class="h-48 w-full bg-gray-100 rounded-xl mb-4 flex items-center justify-center">
                            <i class="fa-regular fa-image text-gray-300 text-4xl"></i>
                        </div>
                        <div class="flex-1 flex flex-col">
                            <h4 class="font-bold text-gray-400 text-xl mb-2">Segera Hadir</h4>
                            <p class="text-sm text-gray-400 mb-4">Produk baru akan segera ditambahkan.</p>
                            <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-100">
                                <span class="text-gray-300 font-bold text-lg">Rp -</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEKSI ULASAN (BARU DITAMBAHKAN) -->
            <div id="ulasan">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-brand-red mb-2">Ulasan Pelanggan</h2>
                    <p class="text-gray-500 text-sm">Apa kata mereka yang sudah mencoba produk kami.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Ulasan 1 -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-red-100 text-brand-red rounded-full flex items-center justify-center font-bold">A</div>
                            <div>
                                <h5 class="font-bold text-gray-800 text-sm">Andi Pratama</h5>
                                <div class="text-yellow-400 text-xs">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">"Dimsumnya enak banget! Kulitnya tipis tapi isinya full. Pasti bakal order lagi."</p>
                    </div>
                    <!-- Ulasan 2 -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-red-100 text-brand-red rounded-full flex items-center justify-center font-bold">S</div>
                            <div>
                                <h5 class="font-bold text-gray-800 text-sm">Siti Aminah</h5>
                                <div class="text-yellow-400 text-xs">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">"Pengiriman cepat dan packagingnya rapi. Rasanya juara, recommended!"</p>
                    </div>
                    <!-- Ulasan 3 -->
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-red-100 text-brand-red rounded-full flex items-center justify-center font-bold">B</div>
                            <div>
                                <h5 class="font-bold text-gray-800 text-sm">Budi Santoso</h5>
                                <div class="text-yellow-400 text-xs">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed">"Cocok banget buat cemilan sore hari. Harganya juga sangat terjangkau."</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER (HANYA WHATSAPP) -->
    <footer class="bg-brand-red text-white py-10 mt-auto rounded-t-[3rem] mx-4">
        <div class="max-w-6xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left">
            <div>
                <h2 class="text-3xl font-bold italic tracking-tighter mb-2">{{ $portofolio->nama_usaha }}</h2>
                <p class="text-red-200 text-sm">Membuat hari Anda lebih manis dengan produk berkualitas.</p>
            </div>
            @if($portofolio->no_wa)
            <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center hover:bg-white hover:text-brand-red transition text-xl">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            @endif
        </div>
        <div class="text-center text-red-300 text-xs mt-8 border-t border-red-800 pt-6">
            &copy; {{ date('Y') }} {{ $portofolio->nama_usaha }}. Powered by Nusarasa.
        </div>
    </footer>

</body>
</html>