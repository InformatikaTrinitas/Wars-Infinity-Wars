@extends('layouts.admin')
@section('title', 'Tambah Sponsor')
@section('page-title', 'Tambah Sponsor')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🤝 Tambah Sponsor</h3>
        <a href="{{ route('admin.sponsor.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.sponsor.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Sponsor</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Logo/Foto (opsional)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            @error('foto')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-maroon">Simpan</button>
    </form>
</div>
@endsection
