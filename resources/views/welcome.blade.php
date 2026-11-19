@php
    // ============================================================
    // GANTI NOMOR WHATSAPP ADMIN DI SINI (format 628xxx, tanpa +)
    // ============================================================
    $adminWa = '6285624065047';
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaRasa - Platform Web Portofolio UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #059669 0%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="container mx-auto px-4 md:px-6 py-3 md:py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold shadow-sm">
                    <i class="fas fa-store"></i>
                </div>
                <span class="text-lg md:text-xl font-bold text-gray-900">NusaRasa</span>
            </div>

            <!-- Menu tengah (hidden di mobile) -->
            <div class="hidden lg:flex space-x-8 text-sm font-medium text-gray-600">
                <a href="#" class="hover:text-emerald-600 transition">Beranda</a>
                <a href="#keunggulan" class="hover:text-emerald-600 transition">Keunggulan</a>
                <a href="#cara-kerja" class="hover:text-emerald-600 transition">Cara Kerja</a>
                <a href="#template" class="hover:text-emerald-600 transition">Template</a>
            </div>

            <!-- Tombol Akses Admin (Hanya tampil jika sudah login, tombol login publik disembunyikan) -->
            <div>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="px-4 md:px-5 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold shadow-sm inline-flex items-center gap-2">
                        <i class="fas fa-tachometer-alt"></i> <span class="hidden sm:inline">Ke Dashboard</span><span class="sm:hidden">Dashboard</span>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-br from-emerald-50 via-teal-50 to-white py-16 md:py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-72 md:w-96 h-72 md:h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-72 md:w-96 h-72 md:h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="container mx-auto px-4 md:px-6 text-center relative z-10">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase tracking-wider mb-6">
                <i class="fas fa-sparkles"></i> Model Layanan Done-For-You
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
                Wujudkan Website UMKM<br>
                <span class="gradient-text">Tanpa Ribet, Terima Beres!</span>
            </h1>
            <p class="text-base md:text-lg text-gray-600 max-w-2xl mx-auto mb-8 leading-relaxed">
                NusaRasa membantu pelaku usaha memiliki website portofolio profesional dalam hitungan menit. 
                Cukup kirimkan data usaha melalui WhatsApp, tim kami yang akan mengelola sisanya.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#template" class="px-8 py-3.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-700 transition font-semibold shadow-lg shadow-emerald-600/20 inline-flex items-center justify-center gap-2">
                    <i class="fas fa-palette"></i> Lihat Pilihan Template
                </a>
                <a href="https://wa.me/{{ $adminWa }}?text=Halo%20Admin%20NusaRasa%2C%20saya%20mau%20buat%20website%20UMKM" target="_blank" class="px-8 py-3.5 bg-white text-emerald-600 border-2 border-emerald-200 rounded-xl hover:bg-emerald-50 transition font-semibold inline-flex items-center justify-center gap-2">
                    <i class="fab fa-whatsapp text-xl"></i> Chat Admin Sekarang
                </a>
            </div>
        </div>
    </header>

    <!-- Keunggulan Section -->
    <section id="keunggulan" class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12 md:mb-14">
                <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase tracking-wider mb-3">Keunggulan</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Mengapa Memilih NusaRasa?</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Solusi digitalisasi UMKM yang dirancang sederhana, cepat, dan profesional.</p>
                <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 max-w-5xl mx-auto">
                <div class="p-6 md:p-8 border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-5">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Pengerjaan Cepat</h3>
                    <p class="text-gray-500 leading-relaxed">Website portofolio satu halaman siap tayang dalam hitungan menit setelah data usaha diterima oleh admin.</p>
                </div>
                <div class="p-6 md:p-8 border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-5">
                        <i class="fas fa-mobile-screen"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Responsif & Modern</h3>
                    <p class="text-gray-500 leading-relaxed">Tampilan menyesuaikan semua perangkat, dari smartphone pelanggan hingga desktop.</p>
                </div>
                <div class="p-6 md:p-8 border border-gray-100 rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-2xl mb-5">
                        <i class="fas fa-link"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-3">URL Unik & Mudah Diingat</h3>
                    <p class="text-gray-500 leading-relaxed">Setiap UMKM mendapatkan alamat website khusus (slug) yang mudah dibagikan ke pelanggan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section id="cara-kerja" class="py-16 md:py-20 bg-gradient-to-br from-gray-50 to-emerald-50/30">
        <div class="container mx-auto px-4 md:px-6 max-w-4xl">
            <div class="text-center mb-12 md:mb-14">
                <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase tracking-wider mb-3">Proses</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Cara Kerja Sederhana</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Tiga langkah mudah untuk memiliki website portofolio profesional.</p>
                <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full mt-4"></div>
            </div>
            <div class="space-y-6">
                <div class="flex gap-4 md:gap-6 items-start bg-white p-5 md:p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-bold text-lg md:text-xl flex-shrink-0 shadow-lg shadow-emerald-600/20">1</div>
                    <div class="flex-1">
                        <h4 class="font-bold text-lg md:text-xl mb-2">UMKM Kirim Data via WhatsApp</h4>
                        <p class="text-gray-500 leading-relaxed mb-4">Pengusaha cukup mengirimkan foto, deskripsi usaha, daftar produk, dan kontak melalui WhatsApp ke Admin NusaRasa.</p>
                        <!-- BOX NOMOR WA ADMIN -->
                        <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-emerald-600 text-white rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Nomor WhatsApp Admin</p>
                                    <p class="text-lg font-bold text-emerald-700">+{{ $adminWa }}</p>
                                </div>
                            </div>
                            <a href="https://wa.me/{{ $adminWa }}?text=Halo%20Admin%20NusaRasa%2C%20saya%20mau%20kirim%20data%20UMKM%20untuk%20dibuatkan%20website" target="_blank" class="px-5 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold inline-flex items-center justify-center gap-2">
                                <i class="fab fa-whatsapp"></i> Chat Admin
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 md:gap-6 items-start bg-white p-5 md:p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-bold text-lg md:text-xl flex-shrink-0 shadow-lg shadow-emerald-600/20">2</div>
                    <div>
                        <h4 class="font-bold text-lg md:text-xl mb-2">Admin Input & Pilih Template</h4>
                        <p class="text-gray-500 leading-relaxed">Tim admin menginput data ke dashboard, memilih template yang sesuai, dan melakukan validasi slug sebelum menerbitkan.</p>
                    </div>
                </div>
                <div class="flex gap-4 md:gap-6 items-start bg-white p-5 md:p-6 rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-12 h-12 md:w-14 md:h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-bold text-lg md:text-xl flex-shrink-0 shadow-lg shadow-emerald-600/20">3</div>
                    <div>
                        <h4 class="font-bold text-lg md:text-xl mb-2">Website Langsung Live</h4>
                        <p class="text-gray-500 leading-relaxed">Halaman portofolio publik langsung aktif dan dapat diakses pelanggan melalui URL slug unik yang telah ditentukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Template Section -->
    <section id="template" class="py-16 md:py-20 bg-white">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12 md:mb-14">
                <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase tracking-wider mb-3">Koleksi</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Pilihan Template Eksklusif</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Desain modern yang siap menaikkan citra brand UMKM Anda.</p>
                <div class="w-16 h-1 bg-emerald-500 mx-auto rounded-full mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto">
                <!-- Template 1 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="h-48 md:h-56 bg-gradient-to-br from-red-900 to-amber-100 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition"></div>
                        <span class="text-white font-bold text-xl md:text-2xl opacity-95 z-10 drop-shadow-md">Theme: Kue & Camilan</span>
                    </div>
                    <div class="p-6 md:p-7">
                        <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Template Marun</h3>
                        <p class="text-gray-500 text-sm mb-5 leading-relaxed">Cocok untuk toko kue, minuman, dan camilan. Nuansa hangat dengan perpaduan merah marun dan krem yang elegan.</p>
                        <a href="{{ route('demo', 'template1') }}" target="_blank" class="inline-flex items-center gap-2 text-red-700 font-semibold hover:gap-3 transition-all">
                            Lihat Demo <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <!-- Template 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                    <div class="h-48 md:h-56 bg-gradient-to-br from-red-600 to-amber-400 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-black/0 transition"></div>
                        <span class="text-white font-bold text-xl md:text-2xl opacity-95 z-10 drop-shadow-md">Theme: Fast Food & Burger</span>
                    </div>
                    <div class="p-6 md:p-7">
                        <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">Template Merah Kuning</h3>
                        <p class="text-gray-500 text-sm mb-5 leading-relaxed">Cocok untuk burger, ayam goreng, dan jajanan cepat saji. Tampilan berani dan menggugah selera pelanggan.</p>
                        <a href="{{ route('demo', 'template2') }}" target="_blank" class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all">
                            Lihat Demo <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-emerald-600 to-teal-700 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-72 md:w-96 h-72 md:h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-10"></div>
        <div class="container mx-auto px-4 md:px-6 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memiliki Website UMKM?</h2>
            <p class="text-emerald-100 max-w-2xl mx-auto mb-8 text-base md:text-lg">
                Bergabunglah dengan para pelaku usaha yang telah mempercayakan digitalisasi bisnis mereka kepada NusaRasa.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="https://wa.me/{{ $adminWa }}?text=Halo%20Admin%20NusaRasa%2C%20saya%20tertarik%20membuat%20website%20UMKM" target="_blank" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-emerald-700 rounded-xl hover:bg-emerald-50 transition font-bold shadow-xl">
                    <i class="fab fa-whatsapp text-xl"></i> Hubungi Admin: +{{ $adminWa }}
                </a>
                <a href="#template" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-emerald-700 text-white rounded-xl hover:bg-emerald-800 transition font-bold border border-emerald-500">
                    <i class="fas fa-palette"></i> Lihat Template
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 md:py-12">
        <div class="container mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center text-white font-bold">
                        <i class="fas fa-store"></i>
                    </div>
                    <span class="font-bold text-lg">NusaRasa</span>
                </div>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-white transition">Beranda</a>
                    <a href="#keunggulan" class="hover:text-white transition">Keunggulan</a>
                    <a href="#cara-kerja" class="hover:text-white transition">Cara Kerja</a>
                    <a href="#template" class="hover:text-white transition">Template</a>
                </div>
                <div class="text-sm text-gray-400 flex items-center gap-2">
                    <i class="fab fa-whatsapp text-emerald-400"></i> +{{ $adminWa }}
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-gray-500 text-sm">
                <p>&copy; 2026 NusaRasa Platform. Dibuat untuk Ujian Kompetensi Keahlian Rekayasa Perangkat Lunak.</p>
            </div>
        </div>
    </footer>

</body>
</html>