@extends('layouts.admin')
@section('title', 'Tambah Foto Kegiatan')
@section('page-title', 'Tambah Foto Kegiatan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>📷 Tambah Foto Kegiatan</h3>
        <a href="{{ route('admin.foto-kegiatan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.foto-kegiatan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun', date('Y')) }}" min="2000" max="2099" required>
            @error('tahun')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" accept="image/*" required>
            @error('foto')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-gold">Simpan</button>
    </form>
</div>
@endsection
