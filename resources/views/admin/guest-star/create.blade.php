@extends('layouts.admin')
@section('title', 'Tambah Guest Star')
@section('page-title', 'Tambah Guest Star')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>⭐ Tambah Guest Star</h3>
        <a href="{{ route('admin.guest-star.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.guest-star.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Foto (opsional)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            @error('foto')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-maroon">Simpan</button>
    </form>
</div>
@endsection
