<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portofolio->nama_usaha }} - Kue & Camilan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #fdf8f3;
            color: #3d2817;
        }
        
        .font-display { font-family: 'Playfair Display', serif; }
        
        .gradient-text {
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(127, 29, 29, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(127, 29, 29, 0.3);
        }
        
        .divider-brush {
            height: 4px;
            background: linear-gradient(90deg, transparent 0%, #7f1d1d 50%, transparent 100%);
            border-radius: 2px;
        }
        
        .cream-card {
            background: rgba(255, 253, 245, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(127, 29, 29, 0.1);
        }
        
        .marun-card {
            background: rgba(127, 29, 29, 0.05);
            border: 1px solid rgba(127, 29, 29, 0.15);
        }
        
        .scroll-smooth { scroll-behavior: smooth; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body class="scroll-smooth">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-amber-100 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-red-900 to-amber-700 rounded-full flex items-center justify-center">
                    <i class="fas fa-birthday-cake text-white text-sm"></i>
                </div>
                <span class="font-display text-2xl font-bold text-red-900">{{ $portofolio->nama_usaha }}</span>
            </div>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-amber-900">
                <a href="#home" class="hover:text-red-900 transition">Home</a>
                <a href="#about" class="hover:text-red-900 transition">About</a>
                <a href="#menu" class="hover:text-red-900 transition">Menu</a>
                <a href="#testimonials" class="hover:text-red-900 transition">Reviews</a>
                <a href="#contact" class="hover:text-red-900 transition">Contact</a>
            </div>
            <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" class="btn-primary px-5 py-2.5 rounded-full text-white text-sm font-semibold shadow-lg">
                <i class="fab fa-whatsapp mr-1"></i> Order Now
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 bg-gradient-to-b from-amber-50 via-orange-50 to-cream"></div>
        <div class="absolute top-20 right-10 w-72 h-72 bg-amber-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-red-200/20 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-red-900/10 border border-red-900/20 text-red-900 rounded-full text-xs font-bold uppercase tracking-wider mb-6">
                        ✦ Welcome to Our Bakery
                    </span>
                    <h1 class="font-display text-5xl md:text-7xl font-bold text-red-900 mb-6 leading-tight">
                        {{ $portofolio->nama_usaha }}
                    </h1>
                    <p class="text-lg text-amber-900/80 mb-8 leading-relaxed max-w-lg">
                        {{ $portofolio->bio ?? 'Nikmati kelezatan kue dan camilan homemade dengan bahan-bahan pilihan dan resep turun temurun.' }}
                    </p>
                    <div class="flex gap-4 flex-wrap">
                        <a href="#menu" class="btn-primary px-8 py-3.5 rounded-full text-white font-semibold shadow-xl inline-flex items-center gap-2">
                            <i class="fas fa-book-open"></i> Lihat Menu
                        </a>
                        <a href="#contact" class="px-8 py-3.5 rounded-full border-2 border-red-900/30 text-red-900 font-semibold hover:bg-red-900/5 transition inline-flex items-center gap-2">
                            <i class="fas fa-phone"></i> Hubungi Kami
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="flex items-center gap-6 mt-10 pt-8 border-t border-red-900/10">
                        <div>
                            <div class="text-3xl font-bold text-red-900">{{ $portofolio->produks->count() }}+</div>
                            <div class="text-xs text-amber-800 uppercase tracking-wider">Menu Items</div>
                        </div>
                        <div class="w-px h-10 bg-red-900/20"></div>
                        <div>
                            <div class="text-3xl font-bold text-red-900">100%</div>
                            <div class="text-xs text-amber-800 uppercase tracking-wider">Homemade</div>
                        </div>
                        <div class="w-px h-10 bg-red-900/20"></div>
                        <div>
                            <div class="text-3xl font-bold text-red-900">{{ $portofolio->testimonials->count() }}</div>
                            <div class="text-xs text-amber-800 uppercase tracking-wider">Reviews</div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative z-10 animate-float">
                        @if($portofolio->foto)
                            <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="{{ $portofolio->nama_usaha }}" class="w-full max-w-md mx-auto rounded-3xl shadow-2xl shadow-red-900/20">
                        @else
                            <div class="w-full max-w-md mx-auto h-96 bg-gradient-to-br from-amber-100 to-red-100 rounded-3xl flex items-center justify-center border border-red-900/10">
                                <div class="text-center">
                                    <div class="text-8xl mb-4">🎂</div>
                                    <p class="text-amber-900/70">Foto UMKM</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="absolute -top-4 -right-4 w-72 h-72 bg-amber-200/40 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-4 -left-4 w-72 h-72 bg-red-200/30 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-900 text-sm font-bold uppercase tracking-widest">About Us</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-red-900 mt-3 mb-4">Our Story</h2>
                <div class="divider-brush w-24 mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="cream-card p-8 rounded-2xl card-hover text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-900 to-amber-700 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-red-900/20">
                        <i class="fas fa-wheat-awn text-white text-2xl"></i>
                    </div>
                    <h3 class="font-display text-xl font-bold text-red-900 mb-3">Bahan Pilihan</h3>
                    <p class="text-amber-900/70 text-sm leading-relaxed">Menggunakan bahan-bahan berkualitas tinggi untuk menghasilkan kue yang lezat dan aman dikonsumsi.</p>
                </div>
                
                <div class="cream-card p-8 rounded-2xl card-hover text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-900 to-amber-700 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-red-900/20">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="font-display text-xl font-bold text-red-900 mb-3">Dibuat dengan Cinta</h3>
                    <p class="text-amber-900/70 text-sm leading-relaxed">Setiap kue dibuat dengan penuh cinta dan perhatian untuk memberikan kebahagiaan di setiap gigitan.</p>
                </div>
                
                <div class="cream-card p-8 rounded-2xl card-hover text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-900 to-amber-700 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-red-900/20">
                        <i class="fas fa-cookie-bite text-white text-2xl"></i>
                    </div>
                    <h3 class="font-display text-xl font-bold text-red-900 mb-3">Resep Tradisional</h3>
                    <p class="text-amber-900/70 text-sm leading-relaxed">Menggunakan resep turun temurun yang telah teruji dan disukai banyak pelanggan setia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-24 bg-gradient-to-b from-amber-50 to-orange-50 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-900 text-sm font-bold uppercase tracking-widest">Our Menu</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-red-900 mt-3 mb-4">Special Dishes</h2>
                <div class="divider-brush w-24 mx-auto mb-4"></div>
                <p class="text-amber-900/70 max-w-2xl mx-auto">Pilihan kue dan camilan terbaik kami yang siap memanjakan lidah Anda</p>
            </div>

            @if($portofolio->produks->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($portofolio->produks as $produk)
                        <div class="cream-card rounded-3xl overflow-hidden card-hover group">
                            <div class="relative h-64 overflow-hidden bg-amber-100">
                                @if($produk->foto)
                                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-100 to-red-100">
                                        <span class="text-7xl">🍰</span>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-red-900 to-amber-700 text-white px-4 py-2 rounded-full font-bold shadow-lg text-sm">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <h3 class="font-display text-2xl font-bold text-red-900 mb-2">{{ $produk->nama }}</h3>
                                <p class="text-amber-900/70 text-sm mb-5 leading-relaxed min-h-[40px]">
                                    {{ $produk->deskripsi ?? 'Kue spesial dengan cita rasa yang tak terlupakan.' }}
                                </p>
                                <a href="https://wa.me/{{ $portofolio->no_wa }}?text=Halo%20{{ urlencode($portofolio->nama_usaha) }},%20saya%20mau%20pesan%20{{ urlencode($produk->nama) }}" 
                                   target="_blank"
                                   class="btn-primary w-full py-3 rounded-full text-white font-semibold text-sm inline-flex items-center justify-center gap-2">
                                    <i class="fab fa-whatsapp text-lg"></i> Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 cream-card rounded-3xl max-w-2xl mx-auto">
                    <div class="text-7xl mb-4">👨‍🍳</div>
                    <h3 class="font-display text-2xl font-bold text-red-900 mb-2">Menu Coming Soon</h3>
                    <p class="text-amber-900/70">Hubungi kami untuk informasi lebih lanjut</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Testimonials Section (WAJIB ADA) -->
    @if($portofolio->testimonials->count() > 0)
    <section id="testimonials" class="py-24 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-900 text-sm font-bold uppercase tracking-widest">Testimonials</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-red-900 mt-3 mb-4">What Our Customers Say</h2>
                <div class="divider-brush w-24 mx-auto mb-4"></div>
                <p class="text-amber-900/70 max-w-2xl mx-auto">Ulasan dari pelanggan setia kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach($portofolio->testimonials as $testimoni)
                    <div class="marun-card rounded-2xl p-8 card-hover relative">
                        <div class="absolute -top-4 left-8 w-10 h-10 bg-gradient-to-br from-red-900 to-amber-700 rounded-full flex items-center justify-center shadow-lg shadow-red-900/30">
                            <i class="fas fa-quote-left text-white text-sm"></i>
                        </div>
                        
                        <!-- Rating Bintang -->
                        <div class="mb-4 mt-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $testimoni->rating ? 'text-amber-500' : 'text-gray-300' }} text-sm"></i>
                            @endfor
                        </div>

                        <p class="text-amber-900/80 italic mb-6 leading-relaxed text-sm">"{{ $testimoni->komentar }}"</p>

                        <div class="flex items-center gap-3 pt-4 border-t border-red-900/10">
                            @if($testimoni->foto)
                                <img src="{{ asset('storage/' . $testimoni->foto) }}" alt="{{ $testimoni->nama_pelanggan }}" class="w-12 h-12 rounded-full object-cover border-2 border-red-900">
                            @else
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-900 to-amber-700 flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($testimoni->nama_pelanggan, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h5 class="font-bold text-red-900 text-sm">{{ $testimoni->nama_pelanggan }}</h5>
                                @if($testimoni->jabatan)
                                    <p class="text-xs text-amber-700">{{ $testimoni->jabatan }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <!-- Fallback jika belum ada testimoni -->
    <section id="testimonials" class="py-24 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-900 text-sm font-bold uppercase tracking-widest">Testimonials</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-red-900 mt-3 mb-4">What Our Customers Say</h2>
                <div class="divider-brush w-24 mx-auto mb-4"></div>
            </div>
            <div class="text-center py-20 marun-card rounded-3xl max-w-2xl mx-auto">
                <div class="text-7xl mb-4">💬</div>
                <h3 class="font-display text-2xl font-bold text-red-900 mb-2">Belum Ada Testimoni</h3>
                <p class="text-amber-900/70">Jadilah yang pertama memberikan ulasan!</p>
                <a href="https://wa.me/{{ $portofolio->no_wa }}" target="_blank" class="btn-primary mt-6 px-6 py-3 rounded-full text-white font-semibold inline-flex items-center gap-2">
                    <i class="fab fa-whatsapp"></i> Kirim Testimoni
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-gradient-to-b from-orange-50 to-amber-50 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-red-900 text-sm font-bold uppercase tracking-widest">Contact Us</span>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-red-900 mt-3 mb-4">Get In Touch</h2>
                <div class="divider-brush w-24 mx-auto mb-4"></div>
                <p class="text-amber-900/70 max-w-2xl mx-auto">Hubungi kami untuk pemesanan atau informasi lebih lanjut</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Contact Info -->
                <div class="cream-card rounded-3xl p-8">
                    <h3 class="font-display text-2xl font-bold text-red-900 mb-6">Contact Information</h3>
                    <div class="space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-900 to-amber-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fab fa-whatsapp text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-red-900 mb-1">WhatsApp</h4>
                                <p class="text-amber-900/70 text-sm">+{{ $portofolio->no_wa }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-900 to-amber-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-store text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-red-900 mb-1">Nama Usaha</h4>
                                <p class="text-amber-900/70 text-sm">{{ $portofolio->nama_usaha }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-900 to-amber-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-red-900 mb-1">Lokasi</h4>
                                <p class="text-amber-900/70 text-sm">Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Order -->
                <div class="cream-card rounded-3xl p-8">
                    <h3 class="font-display text-2xl font-bold text-red-900 mb-6">Quick Order</h3>
                    <p class="text-amber-900/70 text-sm mb-6">Pesan langsung via WhatsApp untuk respon tercepat</p>
                    
                    <a href="https://wa.me/{{ $portofolio->no_wa }}?text=Halo%20{{ urlencode($portofolio->nama_usaha) }},%20saya%20mau%20pesan" 
                       target="_blank"
                       class="btn-primary w-full py-4 rounded-full text-white font-bold text-base inline-flex items-center justify-center gap-3 mb-4">
                        <i class="fab fa-whatsapp text-2xl"></i> Chat WhatsApp
                    </a>
                    
                    <div class="flex items-center gap-3 text-sm text-amber-900/60">
                        <i class="fas fa-check-circle text-green-600"></i>
                        <span>Respon cepat dalam 5 menit</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-red-950 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-700 to-amber-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-birthday-cake text-white text-sm"></i>
                    </div>
                    <div>
                        <div class="font-display text-xl font-bold text-white">{{ $portofolio->nama_usaha }}</div>
                        <div class="text-xs text-amber-200/70">Kue & Camilan Homemade</div>
                    </div>
                </div>
                <div class="flex gap-6 text-sm text-amber-200/70">
                    <a href="#home" class="hover:text-white transition">Home</a>
                    <a href="#menu" class="hover:text-white transition">Menu</a>
                    <a href="#testimonials" class="hover:text-white transition">Reviews</a>
                    <a href="#contact" class="hover:text-white transition">Contact</a>
                </div>
            </div>
            <div class="border-t border-red-900/50 mt-8 pt-6 text-center text-amber-200/50 text-sm">
                <p>&copy; 2026 {{ $portofolio->nama_usaha }}. All rights reserved. | Powered by NusaRasa</p>
            </div>
        </div>
    </footer>

</body>
</html>