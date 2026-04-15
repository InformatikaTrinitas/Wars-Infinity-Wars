@extends('layouts.admin')
@section('title', 'Tambah Pameran')
@section('page-title', 'Tambah Pameran')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🖼 Tambah Pameran</h3>
        <a href="{{ route('admin.pameran.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.pameran.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Kelompok Pameran</label>
            <input type="text" name="nama_kelompok_pameran" class="form-control" value="{{ old('nama_kelompok_pameran') }}" required placeholder="cth: Kelompok Seni Rupa 7A">
            @error('nama_kelompok_pameran')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Simpan</button>
    </form>
</div>
@endsection
