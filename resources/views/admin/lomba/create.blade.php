@extends('layouts.admin')
@section('title', 'Tambah Lomba')
@section('page-title', 'Tambah Lomba')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🏆 Tambah Lomba</h3>
        <a href="{{ route('admin.lomba.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.lomba.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Lomba</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="cth: Lomba Matematika">
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Simpan</button>
    </form>
</div>
@endsection
