@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="num">{{ $totalGuestStar }}</div>
        <div class="label">⭐ Guest Star</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $totalSponsor }}</div>
        <div class="label">🤝 Sponsor</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $totalLomba }}</div>
        <div class="label">🏆 Lomba</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $totalPenampilan }}</div>
        <div class="label">🎭 Penampilan</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $totalPameran }}</div>
        <div class="label">🖼 Pameran</div>
    </div>
    <div class="stat-card">
        <div class="num">{{ $totalFotoKegiatan }}</div>
        <div class="label">📷 Foto Kegiatan</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>⚡ Akses Cepat</h3>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px;">
        <a href="{{ route('admin.guest-star.create') }}" class="btn btn-maroon">+ Guest Star</a>
        <a href="{{ route('admin.sponsor.create') }}" class="btn btn-maroon">+ Sponsor</a>
        <a href="{{ route('admin.lomba.create') }}" class="btn btn-green">+ Lomba</a>
        <a href="{{ route('admin.penampilan.create') }}" class="btn btn-green">+ Penampilan</a>
        <a href="{{ route('admin.pameran.create') }}" class="btn btn-green">+ Pameran</a>
        <a href="{{ route('admin.foto-kegiatan.create') }}" class="btn btn-gold">+ Foto Kegiatan</a>
    </div>
</div>
@endsection
