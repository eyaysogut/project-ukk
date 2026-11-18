<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaRasa — Platform Web Portofolio UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        html { scroll-behavior: smooth; }
        .bg-brand { background-color: #059669; }
        .text-brand { color: #059669; }
        .hover-lift { transition: transform .3s ease, box-shadow .3s ease; }
        .hover-lift:hover { transform: translateY(-6px); box-shadow: 0 22px 30px -12px rgba(0,0,0,.15); }
    </style>
</head>
<body class="bg-white text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex items-center justify-between">
            <a href="#beranda" class="flex items-center gap-2">
                <span class="w-9 h-9 bg-brand rounded-lg flex items-center justify-center text-white text-lg"><i class="fa-solid fa-store"></i></span>
                <span class="text-xl font-extrabold text-slate-900">NusaRasa</span>
            </a>
            <div class="hidden md:flex gap-7 text-sm font-medium text-slate-600">
                <a href="#beranda" class="hover:text-brand transition">Beranda</a>
                <a href="#keunggulan" class="hover:text-brand transition">Keunggulan</a>
                <a href="#carakerja" class="hover:text-brand transition">Cara Kerja</a>
                <a href="#template" class="hover:text-brand transition">Template</a>
            </div>
            <span class="hidden lg:block text-xs text-slate-400 font-medium">Platform Digital UMKM</span>
        </div>
    </nav>

    <!-- HERO -->
    <header id="beranda" class="bg-gradient-to-b from-emerald-50 to-white py-16 sm:py-24 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-block bg-emerald-100 text-brand text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full mb-6">Model Layanan Done-For-You</span>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                Wujudkan Website UMKM<br>
                <span class="text-brand">Tanpa Ribet, Terima Beres!</span>
            </h1>
            <p class="text-slate-500 text-base sm:text-lg max-w-2xl mx-auto mb-9 px-2">
                NusaRasa membantu pelaku usaha memiliki website portofolio profesional dalam hitungan menit. Cukup kirimkan data usaha melalui WhatsApp, tim kami yang akan mengelola sisanya.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#template" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-emerald-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg shadow-emerald-600/30 transition">
                    <i class="fa-solid fa-table-cells"></i> Lihat Pilihan Template
                </a>
                <a href="#carakerja" class="inline-flex items-center justify-center gap-2 border-2 border-brand text-brand hover:bg-emerald-50 font-semibold px-7 py-3.5 rounded-xl transition">
                    <i class="fa-solid fa-circle-play"></i> Pelajari Cara Kerja
                </a>
            </div>
        </div>
    </header>

    <!-- KEUNGGULAN -->
    <section id="keunggulan" class="py-16 sm:py-20 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">Mengapa Memilih NusaRasa?</h2>
            <p class="text-slate-500 mb-2">Solusi digitalisasi UMKM yang dirancang sederhana, cepat, dan profesional.</p>
            <div class="w-16 h-1 bg-brand rounded-full mx-auto mb-12"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-sm hover-lift">
                    <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center text-brand text-2xl mb-5"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Pengerjaan Cepat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Website portofolio satu halaman siap tayang dalam hitungan menit setelah data usaha diterima oleh admin.</p>
                </div>
                <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-sm hover-lift">
                    <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center text-brand text-2xl mb-5"><i class="fa-solid fa-laptop-code"></i></div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Responsif &amp; Modern</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Tampilan menyesuaikan semua perangkat, dari smartphone pelanggan hingga desktop.</p>
                </div>
                <div class="bg-white border border-slate-100 rounded-2xl p-8 shadow-lg md:-translate-y-4">
                    <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center text-brand text-2xl mb-5"><i class="fa-solid fa-link"></i></div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">URL Unik &amp; Mudah Diingat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Setiap UMKM mendapatkan alamat website khusus (slug) yang mudah dibagikan ke pelanggan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA KERJA -->
    <section id="carakerja" class="bg-gradient-to-b from-emerald-50 to-white py-16 sm:py-20 px-4">
        <div class="max-w-3xl mx-auto text-center">
            <span class="inline-block bg-emerald-100 text-brand text-xs font-bold tracking-widest uppercase px-4 py-1 rounded-full mb-4">Proses</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">Cara Kerja Sederhana</h2>
            <p class="text-slate-500 mb-2">Tiga langkah mudah untuk memiliki website portofolio profesional.</p>
            <div class="w-16 h-1 bg-brand rounded-full mx-auto mb-12"></div>

            <div class="space-y-5 text-left">
                <div class="bg-white rounded-2xl p-6 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-brand text-white text-xl font-bold flex items-center justify-center">1</div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">UMKM Kirim Data via WhatsApp</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">Pengusaha cukup mengirimkan foto, deskripsi usaha, daftar produk, dan kontak melalui WhatsApp ke Admin NusaRasa.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-brand text-white text-xl font-bold flex items-center justify-center">2</div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">Admin Input &amp; Pilih Template</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">Tim admin menginput data ke dashboard, memilih template yang sesuai, dan melakukan validasi slug sebelum menerbitkan.</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm flex items-start gap-5">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-brand text-white text-xl font-bold flex items-center justify-center">3</div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">Website Langsung Live</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">Setelah di-publish, halaman portofolio langsung bisa diakses publik melalui URL/slug unik yang diberikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEMPLATE -->
    <section id="template" class="py-16 sm:py-20 px-4">
        <div class="max-w-5xl mx-auto text-center">
            <span class="inline-block bg-emerald-100 text-brand text-xs font-bold tracking-widest uppercase px-4 py-1 rounded-full mb-4">Koleksi</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">Pilihan Template Eksklusif</h2>
            <p class="text-slate-500 mb-2">Desain modern yang siap menaikkan citra brand UMKM Anda.</p>
            <div class="w-16 h-1 bg-brand rounded-full mx-auto mb-12"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                <!-- Template 1 -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover-lift">
                    <div class="h-48 bg-gradient-to-br from-red-900 via-red-800 to-amber-200 flex items-center justify-center">
                        <span class="text-white font-bold text-2xl drop-shadow">Theme: Kue &amp; Camilan</span>
                    </div>
                    <div class="p-7">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Template Marun</h3>
                        <p class="text-slate-500 text-sm mb-5 leading-relaxed">Cocok untuk toko kue, minuman, dan camilan. Nuansa hangat dengan paduan merah marun dan krem yang elegan.</p>
                        <a href="{{ url('/template1') }}" target="_blank" class="inline-flex items-center gap-2 text-red-700 font-semibold hover:gap-3 transition-all">Lihat Demo <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Template 2 -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover-lift">
                    <div class="h-48 bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 flex items-center justify-center">
                        <span class="text-white font-bold text-2xl drop-shadow">Theme: Fast Food &amp; Burger</span>
                    </div>
                    <div class="p-7">
                        <h3 class="text-xl font-bold text-slate-900 mb-2">Template Merah Kuning</h3>
                        <p class="text-slate-500 text-sm mb-5 leading-relaxed">Cocok untuk burger, ayam goreng, dan jajan cepat saji. Tampilan berani dan menggugah selera pelanggan.</p>
                        <a href="{{ url('/template2') }}" target="_blank" class="inline-flex items-center gap-2 text-red-700 font-semibold hover:gap-3 transition-all">Lihat Demo <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-gradient-to-r from-emerald-600 to-teal-700 py-16 sm:py-20 px-4">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Siap Memiliki Website UMKM?</h2>
            <p class="text-emerald-100 mb-8 max-w-xl mx-auto">Bergabunglah dengan para pelaku usaha yang telah mempercayakan digitalisasi bisnis mereka kepada NusaRasa.</p>
            <a href="#carakerja" class="inline-flex items-center gap-2 bg-white text-brand font-bold px-8 py-4 rounded-xl shadow-xl hover:bg-emerald-50 transition">
                <i class="fa-solid fa-rocket"></i> Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-300 py-12 px-4 mt-auto">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="w-9 h-9 bg-brand rounded-lg flex items-center justify-center text-white text-lg"><i class="fa-solid fa-store"></i></span>
                    <span class="text-xl font-extrabold text-white">NusaRasa</span>
                </div>
                <div class="flex gap-6 text-sm">
                    <a href="#beranda" class="hover:text-white transition">Beranda</a>
                    <a href="#keunggulan" class="hover:text-white transition">Keunggulan</a>
                    <a href="#carakerja" class="hover:text-white transition">Cara Kerja</a>
                    <a href="#template" class="hover:text-white transition">Template</a>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-8 pt-6 text-center text-sm text-slate-500">
                &copy; {{ date('Y') }} NusaRasa Platform. Dibuat untuk Ujian Kompetensi Keahlian Rekayasa Perangkat Lunak.
            </div>
        </div>
    </footer>

</body>
</html>