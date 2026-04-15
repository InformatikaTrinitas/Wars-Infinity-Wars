@extends('layouts.admin')
@section('title', 'Foto Kegiatan')
@section('page-title', 'Foto Kegiatan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>📷 Daftar Foto Kegiatan</h3>
        <a href="{{ route('admin.foto-kegiatan.create') }}" class="btn btn-gold btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Foto</th><th>Tahun</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($fotoKegiatans as $i => $foto)
                <tr>
                    <td>{{ $fotoKegiatans->firstItem() + $i }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$foto->foto) }}" alt="Foto {{ $foto->tahun }}" style="width:70px;height:50px;object-fit:cover;border-radius:6px;">
                    </td>
                    <td>{{ $foto->tahun }}</td>
                    <td>
                        <a href="{{ route('admin.foto-kegiatan.edit', $foto) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.foto-kegiatan.destroy', $foto) }}" style="display:inline" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;color:#555;padding:30px">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination">{{ $fotoKegiatans->links() }}</div>
</div>
@endsection
