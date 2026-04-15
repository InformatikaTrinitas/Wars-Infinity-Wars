@extends('layouts.admin')
@section('title', 'Guest Star')
@section('page-title', 'Guest Star')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>⭐ Daftar Guest Star</h3>
        <a href="{{ route('admin.guest-star.create') }}" class="btn btn-maroon btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Foto</th><th>Nama</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($guestStars as $i => $gs)
                <tr>
                    <td>{{ $guestStars->firstItem() + $i }}</td>
                    <td>
                        @if($gs->foto)
                            <img src="{{ asset('storage/'.$gs->foto) }}" alt="{{ $gs->nama }}">
                        @else
                            <span style="color:#555">—</span>
                        @endif
                    </td>
                    <td>{{ $gs->nama }}</td>
                    <td>
                        <a href="{{ route('admin.guest-star.edit', $gs) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.guest-star.destroy', $gs) }}" style="display:inline" onsubmit="return confirm('Hapus guest star ini?')">
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
    <div class="pagination">{{ $guestStars->links() }}</div>
</div>
@endsection
