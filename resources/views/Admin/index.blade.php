@extends('Admin.layout')

@section('title', 'Data Portofolio')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <p class="text-sm text-gray-500">Kelola seluruh data website UMKM di sini.</p>
        <a href="{{ route('admin.portofolio.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4">Nama Usaha</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($portofolios as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $p->nama_usaha }}</td>
                            <td class="px-6 py-4">/{{ $p->slug }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-md {{ $p->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ strtoupper($p->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <form action="{{ route('admin.portofolio.toggle', $p->id) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="text-gray-500 hover:text-emerald-600" title="Ubah Status">
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.portofolio.edit', $p->id) }}" class="text-gray-500 hover:text-blue-600" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.portofolio.destroy', $p->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-8 text-gray-500">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $portofolios->links() }}
    </div>
@endsection