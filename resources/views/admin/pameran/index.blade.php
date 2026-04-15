@extends('layouts.admin')
@section('title', 'Pameran')
@section('page-title', 'Pameran')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>🖼 Daftar Pameran</h3>
        <a href="{{ route('admin.pameran.create') }}" class="btn btn-green btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Nama Kelompok Pameran</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($pamerans as $i => $pameran)
                <tr>
                    <td>{{ $pamerans->firstItem() + $i }}</td>
                    <td>{{ $pameran->nama_kelompok_pameran }}</td>
                    <td>
                        <a href="{{ route('admin.pameran.edit', $pameran) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.pameran.destroy', $pameran) }}" style="display:inline" onsubmit="return confirm('Hapus pameran ini?')">
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
    <div class="pagination">{{ $pamerans->links() }}</div>
</div>
@endsection
