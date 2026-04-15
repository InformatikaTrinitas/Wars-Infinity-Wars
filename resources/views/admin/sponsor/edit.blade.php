@extends('layouts.admin')
@section('title', 'Edit Sponsor')
@section('page-title', 'Edit Sponsor')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🤝 Edit Sponsor</h3>
        <a href="{{ route('admin.sponsor.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.sponsor.update', $sponsor) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama Sponsor</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $sponsor->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Logo/Foto</label>
            @if($sponsor->foto)
                <div style="margin-bottom:10px;">
                    <img src="{{ asset('storage/'.$sponsor->foto) }}" style="width:80px;height:80px;object-fit:contain;border-radius:8px;border:2px solid #6B0F1A;background:#fff;padding:4px;">
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
