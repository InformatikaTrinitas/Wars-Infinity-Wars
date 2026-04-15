@extends('layouts.admin')
@section('title', 'Edit Penampilan')
@section('page-title', 'Edit Penampilan')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🎭 Edit Penampilan</h3>
        <a href="{{ route('admin.penampilan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.penampilan.update', $penampilan) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Penampilan</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $penampilan->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-green">Update</button>
    </form>
</div>
@endsection
