<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - NusaRasa</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #64748b; }
        
        /* Sidebar transition */
        .sidebar-transition {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Overlay animation */
        .overlay-fade {
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="flex min-h-screen">
        
        <!-- Overlay untuk Mobile (muncul saat sidebar terbuka) -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden overlay-fade" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40 w-64 bg-emerald-900 text-white transform -translate-x-full lg:translate-x-0 sidebar-transition flex flex-col shadow-xl lg:shadow-none">
            
            <!-- Logo Area -->
            <div class="p-6 border-b border-emerald-800 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm">
                        <i class="fas fa-store text-emerald-900 text-lg"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight">NusaRasa</span>
                </div>
                <!-- Tombol Close (hanya di mobile) -->
                <button onclick="toggleSidebar()" class="lg:hidden text-emerald-200 hover:text-white transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Menu Navigasi -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <p class="text-xs font-semibold text-emerald-300 uppercase tracking-wider mb-3 px-3">Menu Utama</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-700 text-white shadow-sm' : 'text-emerald-100 hover:bg-emerald-800' }} transition">
                    <i class="fas fa-th-large w-5 text-center"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                
                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 hover:bg-emerald-800 transition">
                    <i class="fas fa-globe w-5 text-center"></i>
                    <span class="font-medium">Lihat Website</span>
                </a>

                <p class="text-xs font-semibold text-emerald-300 uppercase tracking-wider mt-6 mb-3 px-3">Kelola Data</p>
                
                <a href="{{ route('admin.portofolio.create') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 hover:bg-emerald-800 transition">
                    <i class="fas fa-plus-circle w-5 text-center"></i>
                    <span class="font-medium">Tambah UMKM</span>
                </a>

                <p class="text-xs font-semibold text-emerald-300 uppercase tracking-wider mt-6 mb-3 px-3">Pengaturan</p>

                <a href="{{ route('admin.profil') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.profil') ? 'bg-emerald-700 text-white shadow-sm' : 'text-emerald-100 hover:bg-emerald-800' }} transition">
                    <i class="fas fa-user w-5 text-center"></i>
                    <span class="font-medium">Akun Admin</span>
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('admin.users.*') ? 'bg-emerald-700 text-white shadow-sm' : 'text-emerald-100 hover:bg-emerald-800' }} transition">
                    <i class="fas fa-users-cog w-5 text-center"></i>
                    <span class="font-medium">Manajemen Admin</span>
                </a>
            </nav>

            <!-- Logout (di bawah) -->
            <div class="p-4 border-t border-emerald-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-emerald-100 hover:bg-red-600 hover:text-white transition group">
                        <i class="fas fa-sign-out-alt w-5 text-center group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Top Navbar (Mobile Only - untuk hamburger menu) -->
            <header class="lg:hidden bg-white border-b border-gray-200 sticky top-0 z-20 shadow-sm">
                <div class="px-4 py-3 flex items-center justify-between">
                    <button onclick="toggleSidebar()" class="text-gray-700 hover:text-emerald-700 transition p-1">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-store text-emerald-700 text-sm"></i>
                        </div>
                        <span class="font-bold text-gray-800">NusaRasa</span>
                    </div>
                    <div class="w-8"></div> <!-- Spacer untuk centering -->
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 p-4 md:p-6 lg:p-8 overflow-x-hidden">
                @yield('content')
            </main>
            
            <!-- Footer Kecil -->
            <footer class="p-4 text-center text-xs text-gray-400 border-t border-gray-200 bg-white">
                &copy; 2026 NusaRasa Platform. Ujian Kompetensi Keahlian RPL.
            </footer>
        </div>
    </div>

    <!-- Script untuk Toggle Sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Buka sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10); // Fade in
                document.body.style.overflow = 'hidden'; // Cegah scroll body
            } else {
                // Tutup sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300); // Tunggu animasi selesai
                document.body.style.overflow = '';
            }
        }

        // Tutup sidebar otomatis saat resize ke desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                overlay.classList.add('opacity-0');
                document.body.style.overflow = '';
            }
        });
    </script>

    @stack('scripts')
</body>
</html>