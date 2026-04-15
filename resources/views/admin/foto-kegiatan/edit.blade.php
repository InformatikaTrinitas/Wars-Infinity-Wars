@extends('layouts.admin')
@section('title', 'Edit Foto Kegiatan')
@section('page-title', 'Edit Foto Kegiatan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>📷 Edit Foto Kegiatan</h3>
        <a href="{{ route('admin.foto-kegiatan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.foto-kegiatan.update', $fotoKegiatan) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Tahun</label>
            <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $fotoKegiatan->tahun) }}" min="2000" max="2099" required>
            @error('tahun')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            <div style="margin-bottom:10px;">
                <img src="{{ asset('storage/'.$fotoKegiatan->foto) }}" style="width:120px;height:80px;object-fit:cover;border-radius:8px;border:2px solid #6B0F1A;">
            </div>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <small style="color:#888;">Kosongkan jika tidak ingin mengubah foto</small>
            @error('foto')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-gold">Update</button>
    </form>
</div>
@endsection
