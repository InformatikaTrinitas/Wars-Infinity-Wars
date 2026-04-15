@extends('layouts.admin')
@section('title', 'Stand Makanan')
@section('page-title', 'Stand Makanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>🍜 Daftar Stand Makanan</h3>
        <a href="{{ route('admin.stand-makanan.create') }}" class="btn btn-maroon btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Foto</th><th>Nama Stand</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($standMakanans as $i => $stand)
                <tr>
                    <td>{{ $standMakanans->firstItem() + $i }}</td>
                    <td>
                        @if($stand->foto)
                            <img src="{{ asset('storage/'.$stand->foto) }}" alt="{{ $stand->nama }}">
                        @else
                            <span style="color:#555">—</span>
                        @endif
                    </td>
                    <td>{{ $stand->nama }}</td>
                    <td>
                        <a href="{{ route('admin.stand-makanan.edit', $stand) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.stand-makanan.destroy', $stand) }}" style="display:inline" onsubmit="return confirm('Hapus stand ini?')">
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
    <div class="pagination">{{ $standMakanans->links() }}</div>
</div>
@endsection
