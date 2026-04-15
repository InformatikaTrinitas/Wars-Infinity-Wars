@extends('layouts.admin')
@section('title', 'Penampilan')
@section('page-title', 'Penampilan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>🎭 Daftar Penampilan</h3>
        <a href="{{ route('admin.penampilan.create') }}" class="btn btn-green btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Nama Penampilan</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($penampilans as $i => $penampilan)
                <tr>
                    <td>{{ $penampilans->firstItem() + $i }}</td>
                    <td>{{ $penampilan->nama }}</td>
                    <td>
                        <a href="{{ route('admin.penampilan.edit', $penampilan) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.penampilan.destroy', $penampilan) }}" style="display:inline" onsubmit="return confirm('Hapus penampilan ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:#555;padding:30px">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination">{{ $penampilans->links() }}</div>
</div>
@endsection
