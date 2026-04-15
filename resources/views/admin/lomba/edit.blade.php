@extends('layouts.admin')
@section('title', 'Edit Lomba')
@section('page-title', 'Edit Lomba')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🏆 Edit Lomba</h3>
        <a href="{{ route('admin.lomba.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.lomba.update', $lomba) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Lomba</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $lomba->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Update</button>
    </form>
</div>
@endsection
