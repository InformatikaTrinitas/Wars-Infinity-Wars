@extends('layouts.admin')
@section('title', 'Ganti Password')
@section('page-title', 'Ganti Password')

@section('content')
<div class="card" style="max-width:500px;">
    <div class="card-header">
        <h3>🔑 Ganti Password</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf
        <div class="form-group">
            <label>Password Lama</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-maroon">Simpan Password</button>
    </form>
</div>
@endsection
