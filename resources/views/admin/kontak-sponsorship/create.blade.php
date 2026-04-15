@extends('layouts.admin')
@section('title', 'Tambah Kontak Sponsorship')
@section('page-title', 'Tambah Kontak Sponsorship')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>📞 Tambah Kontak Sponsorship</h3>
        <a href="{{ route('admin.kontak-sponsorship.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.kontak-sponsorship.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="cth: Pak Budi">
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Nomor WhatsApp / Telepon</label>
            <input type="text" name="nomor" class="form-control" value="{{ old('nomor') }}" required placeholder="cth: 0812-3456-7890">
            @error('nomor')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-maroon">Simpan</button>
    </form>
</div>
@endsection
