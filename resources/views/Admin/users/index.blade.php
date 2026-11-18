@extends('Admin.layout')

@section('title', 'Manajemen Admin')

@section('content')
    @if(session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm"><i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}</div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <p class="text-sm text-gray-500">Kelola akun administrator yang bisa mengakses sistem.</p>
        <a href="{{ route('admin.users.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Admin
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-4">Nama Admin</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Terdaftar Pada</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($admins as $admin)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $admin->name }}</td>
                        <td class="px-6 py-4">{{ $admin->email }}</td>
                        <td class="px-6 py-4">{{ $admin->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($admin->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" title="Hapus Admin">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            @else
                                <span class="text-emerald-600 text-xs font-bold bg-emerald-50 px-3 py-1 rounded-full">Akun Anda</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection