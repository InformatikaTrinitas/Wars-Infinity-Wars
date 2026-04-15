@extends('layouts.admin')
@section('title', 'Tambah Penampilan')
@section('page-title', 'Tambah Penampilan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🎭 Tambah Penampilan</h3>
        <a href="{{ route('admin.penampilan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.penampilan.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Penampilan</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="cth: Tari Tradisional">
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Simpan</button>
    </form>
</div>
@endsection
