@extends('Admin.layout')

@section('title', 'Profil Admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Profil Admin</h1>
        <p class="text-gray-500 text-sm mt-1">Kelola informasi akun dan keamanan dashboard Anda.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm flex items-start gap-3">
            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm flex flex-col md:flex-row">
        <!-- Sidebar Profil Kiri -->
        <div class="md:w-1/3 bg-emerald-600 p-8 text-center text-white flex flex-col items-center justify-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-teal-700 opacity-90"></div>
            <div class="relative z-10 w-24 h-24 bg-white text-emerald-600 rounded-full flex items-center justify-center text-4xl font-bold mb-4 shadow-lg border-4 border-emerald-400">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <h3 class="relative z-10 text-xl font-bold">{{ Auth::user()->name ?? 'Administrator' }}</h3>
            <p class="relative z-10 text-emerald-100 text-sm mt-1">{{ Auth::user()->email ?? 'admin@reyal.com' }}</p>
        </div>

        <!-- Form Edit Profil Kanan -->
        <div class="md:w-2/3 p-8">
            <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                </div>
                <hr class="border-gray-100 my-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Password Baru <span class="text-gray-400 font-normal">(Opsional)</span></label>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                    <p class="text-xs text-gray-500 mt-1.5"><i class="fa-solid fa-info-circle mr-1"></i> Minimal 6 karakter jika diisi.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password baru" 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition outline-none">
                </div>
                <div class="pt-4 flex gap-3">
                    <button type="submit" class="px-6 py-2.5 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition shadow-sm flex items-center gap-2">
                        <i class="fa-solid fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection