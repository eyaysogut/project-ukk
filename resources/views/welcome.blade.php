<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaRasa — Jasa Pembuatan Web Kuliner UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-white text-gray-700 overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->
    <nav class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <div class="bg-emerald-600 text-white p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="text-xl font-bold text-gray-800 tracking-tight">NusaRasa</span>
            </div>
            
            <!-- Menu Navigasi -->
            <div class="hidden md:flex space-x-8 text-sm font-semibold text-gray-600">
                <a href="#beranda" class="hover:text-emerald-600 transition">Beranda</a>
                <a href="#keunggulan" class="hover:text-emerald-600 transition">Keunggulan</a>
                <a href="#cara-kerja" class="hover:text-emerald-600 transition">Cara Kerja</a>
                <a href="#template" class="hover:text-emerald-600 transition">Template</a>
            </div>
        </div>
    </nav>

    <!-- ================= HERO SECTION ================= -->
    <header id="beranda" class="relative pt-36 pb-20 px-6 min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Hiasan Background (Nuansa Hijau) -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-emerald-50 rounded-full blur-3xl opacity-60 -z-10 translate-x-1/3 -translate-y-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-teal-50 rounded-full blur-3xl opacity-60 -z-10 -translate-x-1/4 translate-y-1/4"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs md:text-sm font-semibold mb-6 shadow-sm">
                <span class="text-lg">👨‍🍳</span> Layanan Website Kuliner UMKM
            </div>

            <!-- Judul Utama -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-800 leading-tight mb-6">
                Bikin Website Kuliner <br class="hidden md:block"> 
                <span class="text-emerald-600">Tanpa Ribet</span>, Terima Beres!
            </h1>

            <!-- Deskripsi -->
            <p class="text-base md:text-lg text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                Kami bantu UMKM kuliner punya website profesional dalam hitungan hari. 
                Kamu cukup kirim data & menu — tim kami yang urus semuanya.
            </p>

            <!-- Tombol CTA -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#template" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-8 py-4 rounded-full shadow-lg shadow-emerald-600/30 transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Lihat Template
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 font-semibold px-8 py-4 rounded-full shadow-sm transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </header>

    <!-- ================= KEUNGGULAN ================= -->
    <section id="keunggulan" class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Kenapa Pilih NusaRasa?</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Kami memberikan kemudahan bagi pelaku UMKM untuk go-digital tanpa perlu pusing memikirkan teknis.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">⚡</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Proses Cepat</h3>
                    <p class="text-gray-500 text-sm">Website UMKM Anda bisa selesai dan tayang hanya dalam hitungan hari kerja.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">🎨</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Desain Modern</h3>
                    <p class="text-gray-500 text-sm">Template profesional yang sudah dioptimalkan untuk tampilan HP maupun laptop.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">🛠️</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Done-For-You</h3>
                    <p class="text-gray-500 text-sm">Anda tidak perlu belajar coding. Cukup kirim data, admin kami yang input semuanya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CARA KERJA ================= -->
    <section id="cara-kerja" class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-16">Cara Kerja Kami</h2>
            
            <div class="flex flex-col md:flex-row justify-center gap-8 relative">
                <div class="hidden md:block absolute top-8 left-1/4 right-1/4 h-0.5 bg-gray-200 -z-10"></div>
                
                <div class="flex-1">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold shadow-lg shadow-emerald-600/30">1</div>
                    <h4 class="font-bold text-gray-800 mb-2">Hubungi Kami</h4>
                    <p class="text-sm text-gray-500">Konsultasikan kebutuhan website UMKM Anda via WhatsApp.</p>
                </div>
                <div class="flex-1">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold shadow-lg shadow-emerald-600/30">2</div>
                    <h4 class="font-bold text-gray-800 mb-2">Kirim Data</h4>
                    <p class="text-sm text-gray-500">Kirim nama usaha, bio, foto, dan nomor WA yang ingin ditampilkan.</p>
                </div>
                <div class="flex-1">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold shadow-lg shadow-emerald-600/30">3</div>
                    <h4 class="font-bold text-gray-800 mb-2">Website Tayang</h4>
                    <p class="text-sm text-gray-500">Kami input datanya dan website Anda siap dibagikan ke pelanggan!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= TEMPLATE ================= -->
    <section id="template" class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Pilih Desain Website-mu</h2>
                <p class="text-gray-500">Template modern yang siap membuat usahamu terlihat lebih profesional.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Card Template 1 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="h-56 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center relative">
                        <span class="text-white font-bold text-2xl opacity-80">Theme: Kuliner Sehat</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Template Hijau (Kuliner)</h3>
                        <p class="text-gray-500 text-sm mb-4">Cocok untuk usaha katering, kue, dan makanan sehat. Nuansa segar dan natural.</p>
                        <a href="/kue-enak-bu-sri" target="_blank" class="inline-block text-emerald-600 font-semibold hover:underline">Lihat Demo &rarr;</a>
                    </div>
                </div>

                <!-- Card Template 2 -->
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="h-56 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center relative">
                        <span class="text-white font-bold text-2xl opacity-80">Theme: Kopi & Cafe</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Template Teal (Cafe)</h3>
                        <p class="text-gray-500 text-sm mb-4">Cocok untuk coffee shop, minuman, dan tempat nongkrong. Tampilan elegan.</p>
                        <a href="#" class="inline-block text-teal-600 font-semibold hover:underline">Lihat Demo &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-gray-800 text-gray-400 py-12 text-center text-sm">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-center items-center gap-2 mb-6">
                <div class="bg-gray-700 text-white p-1.5 rounded-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <span class="text-lg font-bold text-white tracking-tight">NusaRasa</span>
            </div>
            <p>&copy; {{ date('Y') }} NusaRasa. Dibuat untuk UKK Reyal 12 RPL 2.</p>
        </div>
    </footer>

</body>
</html>