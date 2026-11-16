<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin') — Nusarasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; } </style>
</head>
<body class="min-h-screen flex text-gray-800">

    <aside class="w-64 bg-[#1b4332] text-emerald-50 flex flex-col fixed h-full z-20">
        <div class="h-20 flex items-center px-6 gap-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center overflow-hidden">
                <i class="fa-solid fa-store text-emerald-800 text-xl"></i>
            </div>
            <span class="text-xl font-bold text-white tracking-wide">Nusarasa</span>
        </div>

        <nav class="flex-1 px-4 py-4 space-y-6 overflow-y-auto">
            <div>
                <p class="px-4 text-xs font-bold text-emerald-400/70 uppercase tracking-wider mb-2">Menu Utama</p>
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-700/50 text-white' : 'hover:bg-emerald-800/40 hover:text-white' }}">
                        <i class="fa-solid fa-border-all w-5 text-center"></i> Dashboard
                    </a>
                    <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors hover:bg-emerald-800/40 hover:text-white">
                        <i class="fa-solid fa-globe w-5 text-center"></i> Lihat Website
                    </a>
                </div>
            </div>

            <div>
                <p class="px-4 text-xs font-bold text-emerald-400/70 uppercase tracking-wider mb-2">Kelola</p>
                <div class="space-y-1">
                    <a href="{{ route('admin.portofolio.create') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.portofolio.create') ? 'bg-emerald-700/50 text-white' : 'hover:bg-emerald-800/40 hover:text-white' }}">
                        <i class="fa-solid fa-plus-square w-5 text-center"></i> Tambah UMKM
                    </a>
                    <a href="{{ route('admin.profil') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.profil') ? 'bg-emerald-700/50 text-white' : 'hover:bg-emerald-800/40 hover:text-white' }}">
                        <i class="fa-regular fa-user w-5 text-center"></i> Akun Admin
                    </a>
                </div>
            </div>
        </nav>

        <div class="px-4 py-6 border-t border-emerald-800/50">
            <p class="px-4 text-xs font-bold text-emerald-400/70 uppercase tracking-wider mb-2">Akun</p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-emerald-200 hover:bg-red-500/20 hover:text-red-300 transition">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5 text-center"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 ml-64 flex flex-col min-h-screen">
        <main class="p-8 flex-1">
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-3">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>

</body>
</html>