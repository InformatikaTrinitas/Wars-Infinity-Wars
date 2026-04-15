@extends('layouts.admin')
@section('title', 'Lomba')
@section('page-title', 'Lomba')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>🏆 Daftar Lomba</h3>
        <a href="{{ route('admin.lomba.create') }}" class="btn btn-green btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Nama Lomba</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($lombas as $i => $lomba)
                <tr>
                    <td>{{ $lombas->firstItem() + $i }}</td>
                    <td>{{ $lomba->nama }}</td>
                    <td>
                        <a href="{{ route('admin.lomba.edit', $lomba) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.lomba.destroy', $lomba) }}" style="display:inline" onsubmit="return confirm('Hapus lomba ini?')">
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
    <div class="pagination">{{ $lombas->links() }}</div>
</div>
@endsection
