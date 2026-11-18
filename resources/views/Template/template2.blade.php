<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portofolio->nama_usaha }} - Menu Favorit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-red-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold tracking-wider flex items-center gap-3">
                @if($portofolio->foto)
                    <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="Logo {{ $portofolio->nama_usaha }}" class="w-10 h-10 rounded-full object-cover bg-white border-2 border-yellow-400">
                @else
                    <i class="fas fa-utensils text-yellow-400"></i>
                @endif
                {{ $portofolio->nama_usaha }}
            </h1>
            <a href="#menu" class="bg-yellow-400 text-red-900 px-5 py-2 rounded-full font-bold hover:bg-yellow-300 transition shadow-md">Lihat Menu</a>
        </div>
    </nav>

    <!-- Hero -->
    <header class="bg-gradient-to-b from-red-600 to-red-700 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <span class="bg-yellow-400 text-red-900 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wide mb-4 inline-block">Pesan Favoritmu</span>
            <h2 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">Rasa Juara,<br>Harga Bersahabat!</h2>
            <p class="text-xl text-red-100 mb-8 max-w-2xl mx-auto">{{ $portofolio->bio ?? 'Nikmati berbagai pilihan menu terbaik kami.' }}</p>
            <a href="#menu" class="bg-yellow-400 text-red-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-yellow-300 transition shadow-xl inline-block">
                Pesan Sekarang <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </header>

    <!-- Banner -->
    <div class="bg-yellow-400 py-6 shadow-inner">
        <div class="container mx-auto px-4 flex flex-wrap justify-center gap-8 text-red-900 font-bold text-lg">
            <div class="flex items-center gap-2"><i class="fas fa-clock text-2xl"></i> Pesan dalam hitungan menit</div>
            <div class="flex items-center gap-2"><i class="fas fa-star text-2xl"></i> Bahan Pilihan Terbaik</div>
            <div class="flex items-center gap-2"><i class="fas fa-motorcycle text-2xl"></i> Bisa Delivery Order</div>
        </div>
    </div>

    <!-- Katalog Produk -->
    <section id="menu" class="py-16 container mx-auto px-4">
        <div class="text-center mb-12">
            <h3 class="text-4xl font-extrabold text-gray-800 mb-2">Menu <span class="text-red-600">Spesial</span> Kami</h3>
            <div class="w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
        </div>

        @if($portofolio->produks->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portofolio->produks as $produk)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 flex flex-col">
                        <div class="relative h-56 bg-gray-200 overflow-hidden group">
                            @if($produk->foto)
                                <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl bg-gray-100">🍔</div>
                            @endif
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-4 py-2 rounded-xl font-bold shadow-lg transform rotate-3">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h4 class="text-2xl font-bold text-gray-800 mb-2">{{ $produk->nama }}</h4>
                            <p class="text-gray-600 text-sm mb-6 flex-1">{{ $produk->deskripsi ?? 'Menu favorit dengan cita rasa yang tidak terlupakan.' }}</p>
                            <a href="https://wa.me/{{ $portofolio->no_wa }}?text=Halo%20{{ urlencode($portofolio->nama_usaha) }},%20saya%20mau%20pesan%20{{ urlencode($produk->nama) }}"
                               target="_blank"
                               class="block w-full text-center py-3 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 transition shadow-md">
                                <i class="fab fa-whatsapp mr-2 text-xl"></i> Pesan via WA
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-3xl border-2 border-dashed border-gray-300">
                <div class="text-6xl mb-4">👨‍🍳</div>
                <h3 class="text-2xl font-bold text-gray-700">Menu sedang disiapkan</h3>
            </div>
        @endif
    </section>

    <!-- Testimoni -->
    @if($portofolio->testimonials->count() > 0)
    <section class="py-16 bg-gradient-to-br from-red-50 to-yellow-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-4xl font-extrabold text-gray-800 mb-2">Apa Kata <span class="text-red-600">Pelanggan</span> Kami</h3>
                <div class="w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($portofolio->testimonials as $testimoni)
                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-100 relative">
                        <div class="absolute -top-4 left-6 w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-red-600 text-xl shadow-md">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <div class="mb-3 mt-4">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimoni->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        <p class="text-gray-600 italic mb-6 leading-relaxed">"{{ $testimoni->komentar }}"</p>
                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                            @if($testimoni->foto)
                                <img src="{{ asset('storage/' . $testimoni->foto) }}" alt="{{ $testimoni->nama_pelanggan }}" class="w-12 h-12 rounded-full object-cover border-2 border-yellow-400">
                            @else
                                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold text-lg border-2 border-yellow-400">
                                    {{ substr($testimoni->nama_pelanggan, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h5 class="font-bold text-gray-800">{{ $testimoni->nama_pelanggan }}</h5>
                                @if($testimoni->jabatan)
                                    <p class="text-xs text-gray-500">{{ $testimoni->jabatan }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 mt-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-yellow-400 mb-4">{{ $portofolio->nama_usaha }}</h2>
            <p class="text-gray-400 mb-6">Terima kasih telah berkunjung. Nikmati setiap gigitannya!</p>
            <div class="border-t border-gray-800 pt-6 text-sm text-gray-500">
                &copy; 2026 {{ $portofolio->nama_usaha }}. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
