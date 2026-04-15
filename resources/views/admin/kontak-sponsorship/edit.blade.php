@extends('layouts.admin')
@section('title', 'Edit Kontak Sponsorship')
@section('page-title', 'Edit Kontak Sponsorship')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>📞 Edit Kontak Sponsorship</h3>
        <a href="{{ route('admin.kontak-sponsorship.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.kontak-sponsorship.update', $kontakSponsorship) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $kontakSponsorship->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Nomor WhatsApp / Telepon</label>
            <input type="text" name="nomor" class="form-control" value="{{ old('nomor', $kontakSponsorship->nomor) }}" required>
            @error('nomor')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-maroon">Update</button>
    </form>
</div>
@endsection
