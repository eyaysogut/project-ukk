@extends('Admin.layout')

@section('title', 'Akun Admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        
        @if (session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm flex flex-col md:flex-row">
            
            <!-- Sidebar Profil Kiri -->
            <div class="md:w-1/3 bg-emerald-600 p-8 text-center text-white flex flex-col items-center justify-center">
                <div class="w-24 h-24 bg-white text-emerald-600 rounded-full flex items-center justify-center text-4xl font-bold mb-4 shadow-lg border-4 border-emerald-400">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                <p class="text-emerald-100 text-sm mt-1">{{ $user->email }}</p>
                
                <!-- Tombol ke Manajemen Admin -->
                <a href="{{ route('admin.users.index') }}" class="mt-6 bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition border border-emerald-500 flex items-center gap-2">
                    <i class="fa-solid fa-users"></i> Kelola Admin Lain
                </a>
            </div>

            <!-- Form Edit Profil Kanan -->
            <div class="md:w-2/3 p-8">
                <h4 class="text-lg font-bold text-gray-800 mb-6 border-b pb-3">Pengaturan Akun</h4>
                
                <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <p class="text-xs text-gray-500 mb-4"><i class="fa-solid fa-circle-info text-blue-500"></i> Biarkan kolom password kosong jika tidak ingin mengubahnya.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                                <input type="password" name="password" placeholder="••••••••" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex justify-end">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-lg transition shadow-md flex items-center gap-2">
                            <i class="fa-regular fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection