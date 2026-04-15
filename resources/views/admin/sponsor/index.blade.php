@extends('layouts.admin')
@section('title', 'Sponsor')
@section('page-title', 'Sponsor')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>🤝 Daftar Sponsor</h3>
        <a href="{{ route('admin.sponsor.create') }}" class="btn btn-maroon btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Logo</th><th>Nama</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($sponsors as $i => $sponsor)
                <tr>
                    <td>{{ $sponsors->firstItem() + $i }}</td>
                    <td>
                        @if($sponsor->foto)
                            <img src="{{ asset('storage/'.$sponsor->foto) }}" alt="{{ $sponsor->nama }}">
                        @else
                            <span style="color:#555">—</span>
                        @endif
                    </td>
                    <td>{{ $sponsor->nama }}</td>
                    <td>
                        <a href="{{ route('admin.sponsor.edit', $sponsor) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.sponsor.destroy', $sponsor) }}" style="display:inline" onsubmit="return confirm('Hapus sponsor ini?')">
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
    <div class="pagination">{{ $sponsors->links() }}</div>
</div>
@endsection
