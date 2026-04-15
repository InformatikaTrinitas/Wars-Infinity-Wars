@extends('layouts.admin')
@section('title', 'Kontak Sponsorship')
@section('page-title', 'Kontak Sponsorship')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>📞 Kontak Sponsorship</h3>
        <a href="{{ route('admin.kontak-sponsorship.create') }}" class="btn btn-maroon btn-sm">+ Tambah</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>#</th><th>Nama</th><th>Nomor</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                @forelse($kontaks as $i => $kontak)
                <tr>
                    <td>{{ $kontaks->firstItem() + $i }}</td>
                    <td>{{ $kontak->nama }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/\D/','',$kontak->nomor) }}" target="_blank"
                           style="color:#25D366;font-weight:600;">
                            {{ $kontak->nomor }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.kontak-sponsorship.edit', $kontak) }}" class="btn btn-gold btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.kontak-sponsorship.destroy', $kontak) }}" style="display:inline" onsubmit="return confirm('Hapus kontak ini?')">
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
    <div class="pagination">{{ $kontaks->links() }}</div>
</div>
@endsection
