@extends('Admin.layout')

@section('title', 'Manajemen Admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Admin</h1>
            <p class="text-gray-500 text-sm mt-1">Kelola akun administrator yang dapat mengakses dashboard.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition text-sm font-semibold shadow-sm">
            <i class="fa-solid fa-user-plus"></i> Tambah Admin Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
        </div>
    @endif

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600 min-w-[600px]">
                <thead class="bg-slate-900 text-white">
                    <tr>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-semibold">Nama</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-semibold">Email</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-semibold">Dibuat</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $u)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 md:px-6 py-3 md:py-4 font-medium text-gray-800">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-bold text-sm">
                                    {{ strtoupper(substr($u->name, 0, 1)) }}
                                </div>
                                <span>{{ $u->name }}</span>
                                @if($u->id == Auth::id())
                                    <span class="text-xs bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full font-medium">Anda</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">{{ $u->email }}</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-xs text-gray-500">{{ $u->created_at?->format('d/m/Y H:i') }}</td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <div class="flex items-center justify-end gap-1">
                                <a href="{{ route('admin.users.edit', $u->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen text-sm"></i>
                                </a>
                                @if($u->id != Auth::id())
                                <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus admin {{ $u->name }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </button>
                                </form>
                                @else
                                <button disabled class="p-2 text-gray-300 cursor-not-allowed" title="Tidak bisa menghapus diri sendiri">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-6 py-12 text-center text-gray-400">Belum ada admin.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection