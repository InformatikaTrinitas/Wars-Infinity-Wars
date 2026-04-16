@extends('layouts.admin')
@section('title', 'Edit Stand Makanan')
@section('page-title', 'Edit Stand Makanan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🍜 Edit Stand Makanan</h3>
        <a href="{{ route('admin.stand-makanan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.stand-makanan.update', $standMakanan) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Stand</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $standMakanan->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            @if($standMakanan->foto)
                <div style="margin-bottom:10px;">
                    <img src="{{ asset('storage/'.$standMakanan->foto) }}" style="width:100px;height:80px;object-fit:cover;border-radius:8px;border:2px solid #2E7D4F;">
                </div>
            @endif
            <input type="file" name="foto" class="form-control" accept="image/*">
            <small style="color:#888;">Kosongkan jika tidak ingin mengubah foto</small>
            @error('foto')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-maroon">Update</button>
    </form>
</div>
@endsection
