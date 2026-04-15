@extends('layouts.admin')
@section('title', 'Tambah Stand Makanan')
@section('page-title', 'Tambah Stand Makanan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🍜 Tambah Stand Makanan</h3>
        <a href="{{ route('admin.stand-makanan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.stand-makanan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Stand</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="cth: Stand Bakso Pak Joko">
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
