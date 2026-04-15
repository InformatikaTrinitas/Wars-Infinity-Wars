<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Infinity Wars</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon:      #6B0F1A;
            --maroon-dark: #4A0A12;
            --maroon-light:#8B1A2A;
            --green:       #1A6B2A;
            --green-dark:  #0F4A1A;
            --green-light: #2A8B3A;
            --gold:        #D4AF37;
            --gold-light:  #F0D060;
            --white:       #FFFFFF;
            --light:       #F8F4F0;
            --dark:        #1A0A0A;
            --sidebar-w:   260px;
            --topbar-h:    60px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#111; color:var(--white); }

        /* ── TOPBAR ── */
        .topbar {
            position:fixed; top:0; left:0; right:0; height:var(--topbar-h);
            background:var(--maroon-dark); border-bottom:1px solid var(--maroon);
            display:flex; align-items:center; justify-content:space-between;
            padding:0 20px; z-index:200;
        }
        .topbar-left  { display:flex; align-items:center; gap:14px; }
        .topbar-right { display:flex; align-items:center; gap:12px; }
        .topbar-brand { font-family:'Cinzel',serif; font-size:1rem; color:var(--gold); letter-spacing:2px; }
        .topbar-page  { font-size:.88rem; color:#ccc; font-weight:500; }
        .topbar-user  { font-size:.82rem; color:#aaa; }

        /* Burger */
        .burger {
            display:none; flex-direction:column; gap:5px;
            background:none; border:none; cursor:pointer; padding:4px;
        }
        .burger span {
            display:block; width:22px; height:2px; background:var(--gold);
            border-radius:2px; transition:all .3s;
        }
        .burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
        .burger.open span:nth-child(2) { opacity:0; }
        .burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

        /* ── SIDEBAR ── */
        .sidebar {
            position:fixed; top:var(--topbar-h); left:0;
            width:var(--sidebar-w); height:calc(100vh - var(--topbar-h));
            background:linear-gradient(180deg,var(--maroon-dark) 0%,var(--dark) 100%);
            border-right:1px solid var(--maroon);
            display:flex; flex-direction:column;
            z-index:150; overflow-y:auto;
            transition:transform .3s ease;
        }

        /* Overlay */
        .sidebar-overlay {
            display:none; position:fixed; inset:0;
            background:rgba(0,0,0,.6); z-index:140;
        }
        .sidebar-overlay.show { display:block; }

        .sidebar-nav { padding:12px 0; flex:1; }
        .nav-section {
            padding:10px 20px 4px; font-size:.68rem; color:var(--gold);
            text-transform:uppercase; letter-spacing:1.5px; font-weight:600;
        }
        .nav-item a {
            display:flex; align-items:center; gap:10px; padding:11px 20px;
            color:#ccc; font-size:.86rem; transition:all .2s; border-left:3px solid transparent;
        }
        .nav-item a:hover,
        .nav-item a.active {
            background:rgba(107,15,26,.5); color:var(--gold);
            border-left-color:var(--gold);
        }
        .nav-item a .icon { font-size:1rem; width:20px; text-align:center; flex-shrink:0; }
        .sidebar-footer {
            padding:14px 16px; border-top:1px solid rgba(212,175,55,.2);
        }
        .sidebar-footer form button {
            width:100%; padding:10px; background:var(--maroon); color:#fff;
            border:none; border-radius:6px; cursor:pointer;
            font-family:'Poppins',sans-serif; font-size:.86rem; font-weight:600;
            transition:background .2s;
        }
        .sidebar-footer form button:hover { background:var(--maroon-light); }

        /* ── MAIN ── */
        .main {
            margin-left:var(--sidebar-w);
            margin-top:var(--topbar-h);
            min-height:calc(100vh - var(--topbar-h));
            padding:28px;
        }

        /* ── CARDS ── */
        .card {
            background:#1e1010; border:1px solid #333; border-radius:10px;
            padding:24px; margin-bottom:24px;
        }
        .card-header {
            display:flex; align-items:center; justify-content:space-between;
            margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid #333;
        }
        .card-header h3 { font-size:1rem; font-weight:600; color:var(--gold); }

        /* ── BUTTONS ── */
        .btn {
            display:inline-block; padding:9px 20px; border-radius:6px;
            font-weight:600; cursor:pointer; border:none; transition:all .3s;
            font-family:'Poppins',sans-serif; font-size:.88rem; text-decoration:none;
        }
        .btn-maroon  { background:var(--maroon); color:#fff; }
        .btn-maroon:hover  { background:var(--maroon-light); }
        .btn-green   { background:var(--green); color:#fff; }
        .btn-green:hover   { background:var(--green-light); }
        .btn-gold    { background:var(--gold); color:var(--dark); }
        .btn-gold:hover    { background:var(--gold-light); }
        .btn-sm      { padding:5px 12px; font-size:.8rem; }
        .btn-danger  { background:#dc3545; color:#fff; }
        .btn-danger:hover  { background:#bb2d3b; }
        .btn-secondary { background:#555; color:#fff; }
        .btn-secondary:hover { background:#666; }

        /* ── ALERTS ── */
        .alert { padding:12px 18px; border-radius:6px; margin-bottom:16px; font-size:.9rem; }
        .alert-success { background:#d1fae5; color:#065f46; border:1px solid #6ee7b7; }
        .alert-danger  { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; }

        /* ── FORMS ── */
        .form-group { margin-bottom:18px; }
        .form-group label { display:block; margin-bottom:6px; font-weight:500; font-size:.88rem; color:#ccc; }
        .form-control {
            width:100%; padding:10px 14px; border-radius:6px;
            border:1px solid #444; background:#2a1010; color:#fff;
            font-family:'Poppins',sans-serif; font-size:.88rem;
        }
        .form-control:focus { outline:none; border-color:var(--gold); }
        .invalid-feedback { color:#f87171; font-size:.8rem; margin-top:4px; display:block; }

        /* ── TABLE ── */
        .table-wrap { overflow-x:auto; }
        table { width:100%; border-collapse:collapse; }
        table th, table td { padding:12px 16px; text-align:left; border-bottom:1px solid #2a1a1a; font-size:.88rem; }
        table th { background:var(--maroon-dark); color:var(--gold); font-weight:600; }
        table tr:hover td { background:rgba(107,15,26,.15); }
        table td img { width:50px; height:50px; object-fit:cover; border-radius:6px; border:2px solid var(--maroon); }

        /* ── STATS ── */
        .stats-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(150px,1fr)); gap:16px; margin-bottom:28px; }
        .stat-card {
            background:linear-gradient(135deg,var(--maroon-dark),#2a0a0a);
            border:1px solid var(--maroon); border-radius:10px; padding:20px; text-align:center;
        }
        .stat-card .num   { font-size:2rem; font-weight:700; color:var(--gold); }
        .stat-card .label { font-size:.75rem; color:#aaa; margin-top:4px; }

        /* ── PAGINATION ── */
        .pagination { display:flex; gap:6px; margin-top:20px; flex-wrap:wrap; }
        .pagination a, .pagination span { padding:6px 12px; border-radius:4px; font-size:.82rem; background:#2a1010; color:#ccc; border:1px solid #444; }
        .pagination .active span { background:var(--maroon); color:#fff; border-color:var(--maroon); }

        /* ── RESPONSIVE ── */
        @media(max-width:768px) {
            .burger { display:flex; }
            .sidebar { transform:translateX(-100%); }
            .sidebar.open { transform:translateX(0); }
            .main { margin-left:0; padding:20px 16px; }
            .topbar-user { display:none; }
            .stats-grid { grid-template-columns:repeat(2,1fr); }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
    <div class="topbar-left">
        <button class="burger" id="burger" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
        <span class="topbar-brand">INFINITY WARS</span>
        <span class="topbar-page">/ @yield('page-title', 'Dashboard')</span>
    </div>
    <div class="topbar-right">
        <span class="topbar-user">👤 {{ Auth::user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn btn-maroon btn-sm">Logout</button>
        </form>
    </div>
</header>

<!-- SIDEBAR OVERLAY (mobile) -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
    <nav class="sidebar-nav">
        <div class="nav-section">Menu</div>
        <div class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="icon">🏠</span> Dashboard
            </a>
        </div>

        <div class="nav-section">Konten</div>
        <div class="nav-item">
            <a href="{{ route('admin.guest-star.index') }}" class="{{ request()->routeIs('admin.guest-star.*') ? 'active' : '' }}">
                <span class="icon">⭐</span> Guest Star
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.sponsor.index') }}" class="{{ request()->routeIs('admin.sponsor.*') ? 'active' : '' }}">
                <span class="icon">🤝</span> Sponsor
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.lomba.index') }}" class="{{ request()->routeIs('admin.lomba.*') ? 'active' : '' }}">
                <span class="icon">🏆</span> Lomba
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.penampilan.index') }}" class="{{ request()->routeIs('admin.penampilan.*') ? 'active' : '' }}">
                <span class="icon">🎭</span> Penampilan
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.pameran.index') }}" class="{{ request()->routeIs('admin.pameran.*') ? 'active' : '' }}">
                <span class="icon">🖼</span> Pameran
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.stand-makanan.index') }}" class="{{ request()->routeIs('admin.stand-makanan.*') ? 'active' : '' }}">
                <span class="icon">🍜</span> Stand Makanan
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.foto-kegiatan.index') }}" class="{{ request()->routeIs('admin.foto-kegiatan.*') ? 'active' : '' }}">
                <span class="icon">📷</span> Foto Kegiatan
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('admin.kontak-sponsorship.index') }}" class="{{ request()->routeIs('admin.kontak-sponsorship.*') ? 'active' : '' }}">
                <span class="icon">📞</span> Kontak Sponsorship
            </a>
        </div>

        <div class="nav-section">Akun</div>
        <div class="nav-item">
            <a href="{{ route('admin.password.form') }}" class="{{ request()->routeIs('admin.password.*') ? 'active' : '' }}">
                <span class="icon">🔑</span> Ganti Password
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('landing') }}" target="_blank">
                <span class="icon">🌐</span> Lihat Website
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>
</aside>

<!-- MAIN CONTENT -->
<main class="main">
    @if(session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">❌ {{ session('error') }}</div>
    @endif

    @yield('content')
</main>

<script>
    const burger  = document.getElementById('burger');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('show');
        burger.classList.add('open');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
        burger.classList.remove('open');
    }

    burger.addEventListener('click', () => {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    overlay.addEventListener('click', closeSidebar);

    // Tutup sidebar saat klik nav item di mobile
    document.querySelectorAll('.nav-item a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) closeSidebar();
        });
    });
</script>

@stack('scripts')
</body>
</html>
