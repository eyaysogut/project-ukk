@extends('Admin.layout')

@section('title', 'Akun Admin')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="bg-emerald-600 px-6 py-8 text-center text-white">
                <div class="w-24 h-24 bg-white text-emerald-600 rounded-full flex items-center justify-center mx-auto text-4xl font-bold mb-4 shadow-lg">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <h3 class="text-2xl font-bold">{{ $user->name }}</h3>
                <p class="text-emerald-100 mt-1">{{ $user->email }}</p>
            </div>
            
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex justify-between border-b border-gray-100 pb-3">
                        <span class="text-gray-500">Role</span>
                        <span class="font-semibold text-gray-800">Administrator</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-100 pb-3">
                        <span class="text-gray-500">Bergabung Pada</span>
                        <span class="font-semibold text-gray-800">{{ $user->created_at->format('d F Y') }}</span>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-400 mb-4">Ingin keluar dari akun ini?</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-6 py-2 rounded-lg font-semibold transition">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Logout Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection