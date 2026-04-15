@extends('layouts.admin')
@section('title', 'Edit Guest Star')
@section('page-title', 'Edit Guest Star')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>⭐ Edit Guest Star</h3>
        <a href="{{ route('admin.guest-star.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>
    <form method="POST" action="{{ route('admin.guest-star.update', $guestStar) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $guestStar->nama) }}" required>
            @error('nama')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Foto</label>
            @if($guestStar->foto)
                <div style="margin-bottom:10px;">
                    <img src="{{ asset('storage/'.$guestStar->foto) }}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:2px solid #6B0F1A;">
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
