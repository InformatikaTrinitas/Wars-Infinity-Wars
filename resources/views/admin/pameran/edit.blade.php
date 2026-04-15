@extends('layouts.admin')
@section('title', 'Edit Pameran')
@section('page-title', 'Edit Pameran')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🖼 Edit Pameran</h3>
        <a href="{{ route('admin.pameran.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.pameran.update', $pameran) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Kelompok Pameran</label>
            <input type="text" name="nama_kelompok_pameran" class="form-control" value="{{ old('nama_kelompok_pameran', $pameran->nama_kelompok_pameran) }}" required>
            @error('nama_kelompok_pameran')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Update</button>
    </form>
</div>
@endsection
