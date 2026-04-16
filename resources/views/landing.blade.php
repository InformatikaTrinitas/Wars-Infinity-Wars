<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity Wars — SMP Waringin Bandung</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon:      #2E7D4F;
            --maroon-dark: #1B5E38;
            --maroon-light:#3DA066;
            --green:       #1A6B2A;
            --green-dark:  #0F4A1A;
            --green-light: #2A8B3A;
            --gold:        #D4AF37;
            --gold-light:  #F0D060;
            --white:       #FFFFFF;
            --light:       #F0F8F4;
            --dark:        #050F08;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior:smooth; }
        body { font-family:'Poppins',sans-serif; background:var(--dark); color:var(--white); overflow-x:hidden; }
        a { text-decoration:none; color:inherit; }

        /* ── NAVBAR ── */
        nav {
            position:fixed; top:0; width:100%; z-index:999;
            background:rgba(13,5,5,.92); backdrop-filter:blur(10px);
            border-bottom:1px solid rgba(212,175,55,.2);
            padding:14px 40px; display:flex; align-items:center; justify-content:space-between;
        }
        .nav-brand { font-family:'Cinzel',serif; font-size:1.4rem; color:var(--gold); letter-spacing:3px; }
        .nav-links { display:flex; gap:28px; list-style:none; }
        .nav-links a { font-size:.88rem; color:#ccc; font-weight:500; transition:color .2s; }
        .nav-links a:hover { color:var(--gold); }
        .nav-admin { background:var(--maroon); color:#fff; padding:7px 18px; border-radius:6px; font-size:.85rem; font-weight:600; transition:background .2s; }
        .nav-admin:hover { background:var(--maroon-light); }

        /* ── HERO ── */
        .hero {
            min-height:100vh; display:flex; align-items:center; justify-content:center;
            text-align:center; position:relative; overflow:hidden;
            background:linear-gradient(135deg, var(--maroon-dark) 0%, var(--dark) 40%, var(--green-dark) 100%);
        }
        .hero::before {
            content:''; position:absolute; inset:0;
            background:radial-gradient(ellipse at center, rgba(212,175,55,.08) 0%, transparent 70%);
        }
        .hero-particles { position:absolute; inset:0; overflow:hidden; }
        .particle {
            position:absolute; width:2px; height:2px; background:var(--gold);
            border-radius:50%; animation:float linear infinite; opacity:.4;
        }
        @keyframes float {
            0%   { transform:translateY(100vh) rotate(0deg); opacity:0; }
            10%  { opacity:.4; }
            90%  { opacity:.4; }
            100% { transform:translateY(-100px) rotate(720deg); opacity:0; }
        }
        .hero-content { position:relative; z-index:2; padding:20px; }
        .hero-badge {
            display:inline-block; background:rgba(212,175,55,.15); border:1px solid var(--gold);
            color:var(--gold); padding:6px 20px; border-radius:30px; font-size:.8rem;
            letter-spacing:2px; text-transform:uppercase; margin-bottom:24px;
        }
        .hero h1 {
            font-family:'Cinzel',serif; font-size:clamp(3rem,8vw,7rem);
            font-weight:900; line-height:1; letter-spacing:4px;
            background:linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 50%, var(--gold) 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
            text-shadow:none; margin-bottom:16px;
        }
        .hero-sub {
            font-size:clamp(1rem,2.5vw,1.4rem); color:#ccc; font-weight:300;
            letter-spacing:4px; text-transform:uppercase; margin-bottom:12px;
        }
        .hero-desc { font-size:1rem; color:#aaa; max-width:560px; margin:0 auto 36px; line-height:1.7; }
        .hero-btns { display:flex; gap:16px; justify-content:center; flex-wrap:wrap; }
        .btn-hero-primary {
            background:linear-gradient(135deg,var(--maroon),var(--maroon-light));
            color:#fff; padding:14px 36px; border-radius:8px; font-weight:700;
            font-size:1rem; letter-spacing:1px; transition:all .3s;
            box-shadow:0 4px 20px rgba(26,107,42,.5);
        }
        .btn-hero-primary:hover { transform:translateY(-2px); box-shadow:0 8px 30px rgba(26,107,42,.7); }
        .btn-hero-secondary {
            background:linear-gradient(135deg,var(--green-dark),var(--green));
            color:#fff; padding:14px 36px; border-radius:8px; font-weight:700;
            font-size:1rem; letter-spacing:1px; transition:all .3s;
            box-shadow:0 4px 20px rgba(26,107,42,.5);
        }
        .btn-hero-secondary:hover { transform:translateY(-2px); box-shadow:0 8px 30px rgba(26,107,42,.7); }
        .scroll-indicator {
            position:absolute; bottom:30px; left:50%; transform:translateX(-50%);
            display:flex; flex-direction:column; align-items:center; gap:8px; color:#666;
            font-size:.75rem; letter-spacing:2px; animation:bounce 2s infinite;
        }
        @keyframes bounce { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(8px)} }

        /* ── SECTIONS ── */
        section { padding:90px 40px; }
        .section-header { text-align:center; margin-bottom:60px; }
        .section-tag {
            display:inline-block; padding:4px 16px; border-radius:20px; font-size:.75rem;
            font-weight:600; letter-spacing:2px; text-transform:uppercase; margin-bottom:12px;
        }
        .tag-maroon { background:rgba(26,107,42,.3); border:1px solid var(--maroon); color:var(--maroon-light); }
        .tag-green  { background:rgba(26,107,42,.3); border:1px solid var(--green); color:var(--green-light); }
        .tag-gold   { background:rgba(212,175,55,.15); border:1px solid var(--gold); color:var(--gold); }
        .section-header h2 {
            font-family:'Cinzel',serif; font-size:clamp(1.8rem,4vw,2.8rem);
            color:var(--gold); letter-spacing:2px; margin-bottom:12px;
        }
        .section-header p { color:#aaa; font-size:.95rem; max-width:500px; margin:0 auto; }
        .divider {
            width:80px; height:3px; margin:16px auto 0;
            background:linear-gradient(90deg,var(--maroon),var(--gold),var(--green));
            border-radius:2px;
        }

        /* ── ABOUT ── */
        .about { background:linear-gradient(135deg,rgba(26,107,42,.1),rgba(26,107,42,.1)); }
        .about-grid { display:grid; grid-template-columns:1fr 1fr; gap:40px; max-width:1000px; margin:0 auto; align-items:center; }
        .about-text h3 { font-family:'Cinzel',serif; font-size:1.6rem; color:var(--gold); margin-bottom:16px; }
        .about-text p { color:#bbb; line-height:1.8; margin-bottom:14px; font-size:.95rem; }
        .about-stats { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
        .about-stat {
            background:rgba(26,107,42,.2); border:1px solid rgba(212,175,55,.2);
            border-radius:10px; padding:20px; text-align:center;
        }
        .about-stat .num { font-family:'Cinzel',serif; font-size:2rem; color:var(--gold); font-weight:700; }
        .about-stat .lbl { font-size:.78rem; color:#aaa; margin-top:4px; }

        /* ── GUEST STAR ── */
        .guest-star { background:var(--dark); }
        .gs-grid { display:flex; flex-direction:column; gap:16px; max-width:1100px; margin:0 auto; }
        .gs-card {
            display:flex; align-items:center; gap:0;
            background:linear-gradient(135deg,rgba(26,107,42,.25),rgba(26,107,42,.1));
            border:1px solid rgba(212,175,55,.2); border-radius:12px;
            overflow:hidden; transition:all .3s;
        }
        .gs-card:hover { border-color:var(--gold); box-shadow:0 8px 32px rgba(212,175,55,.15); transform:translateX(4px); }
        .gs-photo {
            width:140px; height:160px; object-fit:cover; flex-shrink:0;
            border-right:2px solid var(--gold);
        }
        .gs-placeholder {
            width:140px; height:160px; background:var(--maroon-dark);
            display:flex; align-items:center; justify-content:center;
            font-size:3.5rem; flex-shrink:0; border-right:2px solid var(--gold);
        }
        .gs-info { flex:1; padding:24px 32px; }
        .gs-info span { font-size:.75rem; color:var(--gold); letter-spacing:2px; text-transform:uppercase; display:block; margin-bottom:8px; }
        .gs-info h4 { font-size:1.4rem; font-weight:700; color:var(--light); }
        @media(max-width:600px){
            .gs-photo, .gs-placeholder { width:100px; height:120px; }
            .gs-info h4 { font-size:1.1rem; }
            .gs-info { padding:16px 20px; }
        }

        /* ── LOMBA & PENAMPILAN ── */
        .lomba-penampilan { background:linear-gradient(135deg,rgba(26,107,42,.08),rgba(26,107,42,.08)); }
        .two-col { display:grid; grid-template-columns:1fr 1fr; gap:40px; max-width:1000px; margin:0 auto; }
        .list-box { background:rgba(255,255,255,.03); border:1px solid #333; border-radius:12px; padding:28px; }
        .list-box h3 { font-family:'Cinzel',serif; font-size:1.2rem; color:var(--gold); margin-bottom:20px; display:flex; align-items:center; gap:10px; }
        .list-item {
            display:flex; align-items:center; gap:12px; padding:12px 0;
            border-bottom:1px solid rgba(255,255,255,.06); font-size:.9rem; color:#ccc;
        }
        .list-item:last-child { border-bottom:none; }
        .list-item .dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
        .dot-maroon { background:var(--maroon-light); }
        .dot-green  { background:var(--green-light); }
        .empty-state { color:#555; font-size:.88rem; text-align:center; padding:20px 0; }

        /* ── PAMERAN ── */
        .pameran { background:var(--dark); }
        .pameran-grid {
            display:flex; flex-wrap:wrap; gap:20px;
            justify-content:center; max-width:1100px; margin:0 auto;
        }
        .pameran-card {
            background:linear-gradient(135deg,rgba(26,107,42,.15),rgba(26,107,42,.1));
            border:1px solid rgba(26,107,42,.3); border-radius:10px; padding:24px;
            text-align:center; transition:all .3s;
            width:220px; flex-shrink:0;
        }
        .pameran-card:hover { transform:translateY(-4px); border-color:var(--green-light); }
        .pameran-card .icon { font-size:2.5rem; margin-bottom:12px; }
        .pameran-card h4 { font-size:.9rem; font-weight:600; color:var(--light); }
        /* ── FOTO KEGIATAN ── */
        .foto-kegiatan { background:linear-gradient(135deg,rgba(26,107,42,.1),rgba(26,107,42,.1)); }
        .tahun-section { margin-bottom:48px; }
        .tahun-label {
            font-family:'Cinzel',serif; font-size:1.4rem; color:var(--gold);
            margin-bottom:20px; display:flex; align-items:center; gap:12px;
        }
        .tahun-label::after { content:''; flex:1; height:1px; background:rgba(212,175,55,.2); }
        .foto-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:12px; }
        .foto-item { border-radius:8px; overflow:hidden; aspect-ratio:4/3; cursor:pointer; }
        .foto-item img { width:100%; height:100%; object-fit:cover; transition:transform .3s; }
        .foto-item:hover img { transform:scale(1.05); }

        /* ── SPONSOR ── */
        .sponsor { background:var(--dark); }
        .sponsor-grid { display:flex; flex-wrap:wrap; gap:24px; justify-content:center; max-width:1000px; margin:0 auto; }
        .sponsor-card {
            background:rgba(255,255,255,.04); border:1px solid #333; border-radius:10px;
            padding:20px 32px; display:flex; align-items:center; gap:16px;
            transition:all .3s; min-width:180px;
        }
        .sponsor-card:hover { border-color:var(--gold); background:rgba(212,175,55,.05); }
        .sponsor-card img { width:60px; height:60px; object-fit:contain; border-radius:6px; }
        .sponsor-card .sp-placeholder { width:60px; height:60px; background:var(--maroon); border-radius:6px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; }
        .sponsor-card span { font-weight:600; font-size:.9rem; color:var(--light); }

        /* ── STAND MAKANAN ── */
        .stand-makanan { background:linear-gradient(135deg,rgba(26,107,42,.08),rgba(26,107,42,.08)); }
        .stand-grid {
            display:flex; flex-wrap:wrap; gap:20px;
            justify-content:center; max-width:1100px; margin:0 auto;
        }
        .stand-card {
            background:rgba(255,255,255,.04); border:1px solid rgba(26,107,42,.3);
            border-radius:12px; overflow:hidden; transition:all .3s;
            width:220px; flex-shrink:0;
        }
        .stand-card:hover { transform:translateY(-5px); border-color:var(--green-light); box-shadow:0 10px 32px rgba(26,107,42,.2); }
        .stand-card .stand-img {
            width:100%; height:160px; object-fit:cover;
        }
        .stand-card .stand-placeholder {
            width:100%; height:160px; background:var(--green-dark);
            display:flex; align-items:center; justify-content:center; font-size:3.5rem;
        }
        .stand-card .stand-name {
            padding:14px 16px; font-weight:600; font-size:.95rem;
            color:var(--light); text-align:center;
        }

        /* ── KONTAK SPONSORSHIP ── */
        .kontak-section {
            background:linear-gradient(135deg, var(--maroon-dark) 0%, #050F08 50%, var(--green-dark) 100%);
            position:relative; overflow:hidden;
        }
        .kontak-section::before {
            content:''; position:absolute; inset:0;
            background:radial-gradient(ellipse at center, rgba(212,175,55,.06) 0%, transparent 70%);
        }
        .kontak-inner { position:relative; z-index:1; max-width:800px; margin:0 auto; text-align:center; }
        .kontak-inner p.lead {
            font-size:1.05rem; color:#ccc; line-height:1.8; margin-bottom:40px;
        }
        .kontak-cards { display:flex; flex-wrap:wrap; gap:20px; justify-content:center; }
        .kontak-card {
            background:rgba(255,255,255,.05); border:1px solid rgba(212,175,55,.25);
            border-radius:12px; padding:24px 32px; min-width:220px;
            display:flex; flex-direction:column; align-items:center; gap:10px;
            transition:all .3s;
        }
        .kontak-card:hover { border-color:var(--gold); background:rgba(212,175,55,.07); transform:translateY(-4px); }
        .kontak-card .k-icon { font-size:2rem; }
        .kontak-card .k-nama { font-weight:700; font-size:1rem; color:var(--light); }
        .kontak-card .k-nomor {
            font-size:.95rem; color:var(--gold); font-weight:600; letter-spacing:.5px;
        }
        .kontak-card .k-wa {
            display:inline-flex; align-items:center; gap:6px;
            background:#25D366; color:#fff; padding:7px 18px; border-radius:20px;
            font-size:.82rem; font-weight:600; margin-top:4px; transition:opacity .2s;
        }
        .kontak-card .k-wa:hover { opacity:.85; }

        /* ── FOOTER ── */
        footer {
            background:var(--maroon-dark); border-top:1px solid rgba(212,175,55,.2);
            padding:48px 40px 32px; text-align:center;
        }
        footer h3 { font-family:'Cinzel',serif; font-size:1.5rem; color:var(--gold); margin-bottom:8px; }
        footer p { color:#aaa; font-size:.85rem; margin-bottom:4px; }
        .footer-links { display:flex; justify-content:center; gap:20px; margin:20px 0; flex-wrap:wrap; }
        .footer-link {
            display:inline-flex; align-items:center; gap:8px;
            padding:9px 22px; border-radius:8px; font-size:.85rem; font-weight:600;
            transition:all .25s; border:1px solid transparent;
        }
        .footer-link-web {
            background:rgba(212,175,55,.12); border-color:rgba(212,175,55,.3); color:var(--gold);
        }
        .footer-link-web:hover { background:rgba(212,175,55,.22); border-color:var(--gold); }
        .footer-link-ig {
            background:linear-gradient(135deg,rgba(131,58,180,.25),rgba(253,29,29,.2),rgba(252,176,69,.2));
            border-color:rgba(253,29,29,.3); color:#f9a8d4;
        }
        .footer-link-ig:hover { border-color:#f472b6; background:linear-gradient(135deg,rgba(131,58,180,.4),rgba(253,29,29,.3),rgba(252,176,69,.3)); }
        footer .copy { margin-top:20px; color:#555; font-size:.78rem; border-top:1px solid #333; padding-top:16px; }

        /* ── LAZY LOAD ── */
        img.lazy {
            opacity:0;
            transition:opacity .5s ease, transform .5s ease;
            transform:translateY(10px);
        }
        img.lazy.loaded {
            opacity:1;
            transform:translateY(0);
        }

        /* ── LIGHTBOX ── */
        .lightbox { display:none; position:fixed; inset:0; background:rgba(0,0,0,.92); z-index:9999; align-items:center; justify-content:center; }
        .lightbox.active { display:flex; }
        .lightbox img { max-width:90vw; max-height:90vh; border-radius:8px; }
        .lightbox-close { position:absolute; top:20px; right:28px; font-size:2rem; color:#fff; cursor:pointer; }

        /* ── BURGER ── */
        .burger {
            display:none; flex-direction:column; gap:5px; cursor:pointer;
            padding:4px; background:none; border:none;
        }
        .burger span {
            display:block; width:24px; height:2px; background:var(--gold);
            border-radius:2px; transition:all .3s;
        }
        .burger.open span:nth-child(1) { transform:translateY(7px) rotate(45deg); }
        .burger.open span:nth-child(2) { opacity:0; }
        .burger.open span:nth-child(3) { transform:translateY(-7px) rotate(-45deg); }

        .mobile-menu {
            display:none; position:fixed; top:60px; left:0; right:0;
            background:rgba(13,5,5,.97); backdrop-filter:blur(12px);
            border-bottom:1px solid rgba(212,175,55,.2);
            flex-direction:column; z-index:998; padding:12px 0;
        }
        .mobile-menu.open { display:flex; }
        .mobile-menu a {
            padding:14px 28px; color:#ccc; font-size:.95rem; font-weight:500;
            border-bottom:1px solid rgba(255,255,255,.05); transition:all .2s;
        }
        .mobile-menu a:hover { color:var(--gold); background:rgba(212,175,55,.05); }
        .mobile-menu .nav-admin {
            margin:12px 20px 4px; text-align:center; border-radius:6px;
            border-bottom:none; background:var(--maroon); color:#fff;
        }

        /* ── RESPONSIVE ── */
        @media(max-width:768px){
            nav { padding:12px 20px; }
            .nav-links { display:none; }
            .burger { display:flex; }
            section { padding:60px 20px; }
            .about-grid, .two-col { grid-template-columns:1fr; }
            .hero h1 { font-size:3rem; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <div class="nav-brand">INFINITY WARS</div>
    <ul class="nav-links">
        <li><a href="#about">Tentang</a></li>
        <li><a href="#guest-star">Guest Star</a></li>
        <li><a href="#lomba">Lomba & Penampilan</a></li>
        <li><a href="#pameran">Pameran</a></li>
        <li><a href="#foto">Galeri</a></li>
        <li><a href="#sponsor">Sponsor</a></li>
        <li><a href="#stand-makanan">Kuliner</a></li>
        <li><a href="#kontak-sponsor">Sponsorship</a></li>
    </ul>
    <a href="{{ route('login') }}" class="nav-admin" id="nav-admin-desktop">Admin</a>
    <button class="burger" id="burger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- MOBILE MENU -->
<div class="mobile-menu" id="mobile-menu">
    <a href="#about"      onclick="closeMenu()">Tentang</a>
    <a href="#guest-star" onclick="closeMenu()">Guest Star</a>
    <a href="#lomba"      onclick="closeMenu()">Lomba & Penampilan</a>
    <a href="#pameran"    onclick="closeMenu()">Pameran</a>
    <a href="#foto"       onclick="closeMenu()">Galeri</a>
    <a href="#sponsor"        onclick="closeMenu()">Sponsor</a>
    <a href="#stand-makanan"  onclick="closeMenu()">Kuliner</a>
    <a href="#kontak-sponsor" onclick="closeMenu()">Sponsorship</a>
    <a href="{{ route('login') }}" class="nav-admin">Admin</a>
</div>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-particles" id="particles"></div>
    <div class="hero-content">
        <div class="hero-badge">SMP Waringin Bandung</div>
        <h1>INFINITY WARS</h1>
        <p class="hero-sub">Karya & Bakat Tanpa Batas</p>
        <p class="hero-desc">
            Sebuah ajang bergengsi untuk menampilkan karya, bakat, dan kreativitas
            para siswa SMP Waringin Bandung kepada dunia.
        </p>
        <div class="hero-btns">
            <a href="#lomba" class="btn-hero-primary">🏆 Lihat Lomba</a>
            <a href="#foto" class="btn-hero-secondary">📷 Galeri Kegiatan</a>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>SCROLL</span>
        <span>↓</span>
    </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="section-header">
        <span class="section-tag tag-gold">Tentang Acara</span>
        <h2>APA ITU INFINITY WARS?</h2>
        <div class="divider"></div>
    </div>
    <div class="about-grid">
        <div class="about-text">
            <h3>Menampilkan Karya Terbaik</h3>
            <p>
                Infinity Wars adalah kegiatan tahunan SMP Waringin Bandung yang dirancang
                untuk memberikan panggung kepada para siswa dalam menunjukkan bakat,
                kreativitas, dan karya terbaik mereka.
            </p>
            <p>
                Dari lomba akademik hingga penampilan seni, dari pameran karya hingga
                pertunjukan budaya — semua hadir dalam satu perayaan yang luar biasa.
            </p>
        </div>
        <div class="about-stats">
            <div class="about-stat">
                <div class="num">{{ $lombas->count() }}</div>
                <div class="lbl">Kategori Lomba</div>
            </div>
            <div class="about-stat">
                <div class="num">{{ $penampilans->count() }}</div>
                <div class="lbl">Penampilan</div>
            </div>
            <div class="about-stat">
                <div class="num">{{ $pamerans->count() }}</div>
                <div class="lbl">Kelompok Pameran</div>
            </div>
            <div class="about-stat">
                <div class="num">{{ $guestStars->count() }}</div>
                <div class="lbl">Guest Star</div>
            </div>
        </div>
    </div>
</section>

<!-- GUEST STAR -->
@if($guestStars->count())
<section class="guest-star" id="guest-star">
    <div class="section-header">
        <span class="section-tag tag-gold">Bintang Tamu</span>
        <h2>GUEST STAR</h2>
        <p>Bintang tamu istimewa yang hadir memeriahkan Infinity Wars</p>
        <div class="divider"></div>
    </div>
    <div class="gs-grid">
        @foreach($guestStars as $gs)
        <div class="gs-card">
            @if($gs->foto)
                <img class="gs-photo lazy" data-src="{{ asset('storage/'.$gs->foto) }}" src="" alt="{{ $gs->nama }}" loading="lazy">
            @else
                <div class="gs-placeholder">⭐</div>
            @endif
            <div class="gs-info">
                <span>Guest Star</span>
                <h4>{{ $gs->nama }}</h4>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- LOMBA & PENAMPILAN -->
<section class="lomba-penampilan" id="lomba">
    <div class="section-header">
        <span class="section-tag tag-maroon">Kompetisi & Seni</span>
        <h2>LOMBA & PENAMPILAN</h2>
        <p>Unjuk kemampuan dan kreativitas terbaik para siswa</p>
        <div class="divider"></div>
    </div>
    <div class="two-col">
        <div class="list-box">
            <h3>🏆 Kategori Lomba</h3>
            @forelse($lombas as $lomba)
            <div class="list-item">
                <span class="dot dot-maroon"></span>
                {{ $lomba->nama }}
            </div>
            @empty
            <p class="empty-state">Belum ada data lomba</p>
            @endforelse
        </div>
        <div class="list-box">
            <h3>🎭 Penampilan</h3>
            @forelse($penampilans as $penampilan)
            <div class="list-item">
                <span class="dot dot-green"></span>
                {{ $penampilan->nama }}
            </div>
            @empty
            <p class="empty-state">Belum ada data penampilan</p>
            @endforelse
        </div>
    </div>
</section>

<!-- PAMERAN -->
@if($pamerans->count())
<section class="pameran" id="pameran">
    <div class="section-header">
        <span class="section-tag tag-green">Karya Siswa</span>
        <h2>PAMERAN</h2>
        <p>Kelompok pameran yang menampilkan karya terbaik</p>
        <div class="divider"></div>
    </div>
    <div class="pameran-grid">
        @foreach($pamerans as $pameran)
        <div class="pameran-card">
            <h4>{{ $pameran->nama_kelompok_pameran }}</h4>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- FOTO KEGIATAN -->
@if($fotoKegiatans->count())
<section class="foto-kegiatan" id="foto">
    <div class="section-header">
        <span class="section-tag tag-gold">Galeri</span>
        <h2>FOTO KEGIATAN</h2>
        <p>Momen-momen berharga dari setiap penyelenggaraan Infinity Wars</p>
        <div class="divider"></div>
    </div>
    <div style="max-width:1100px;margin:0 auto;">
        @foreach($fotoKegiatans as $tahun => $fotos)
        <div class="tahun-section">
            <div class="tahun-label">📅 {{ $tahun }}</div>
            <div class="foto-grid">
                @foreach($fotos as $foto)
                <div class="foto-item" onclick="openLightbox('{{ asset('storage/'.$foto->foto) }}')">
                    <img class="lazy" data-src="{{ asset('storage/'.$foto->foto) }}" src="" alt="Foto {{ $tahun }}" loading="lazy">
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- SPONSOR -->
@if($sponsors->count())
<section class="sponsor" id="sponsor">
    <div class="section-header">
        <span class="section-tag tag-maroon">Didukung Oleh</span>
        <h2>SPONSOR</h2>
        <p>Terima kasih kepada para sponsor yang mendukung Infinity Wars</p>
        <div class="divider"></div>
    </div>
    <div class="sponsor-grid">
        @foreach($sponsors as $sponsor)
        <div class="sponsor-card">
            @if($sponsor->foto)
                <img class="lazy" data-src="{{ asset('storage/'.$sponsor->foto) }}" src="" alt="{{ $sponsor->nama }}" loading="lazy">
            @else
                <div class="sp-placeholder">🤝</div>
            @endif
            <span>{{ $sponsor->nama }}</span>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- STAND MAKANAN -->
@if($standMakanans->count())
<section class="stand-makanan" id="stand-makanan">
    <div class="section-header">
        <span class="section-tag tag-green">Kuliner</span>
        <h2>STAND MAKANAN</h2>
        <p>Nikmati berbagai pilihan kuliner lezat di Infinity Wars</p>
        <div class="divider"></div>
    </div>
    <div class="stand-grid">
        @foreach($standMakanans as $stand)
        <div class="stand-card">
            @if($stand->foto)
                <img class="stand-img lazy" data-src="{{ asset('storage/'.$stand->foto) }}" src="" alt="{{ $stand->nama }}" loading="lazy">
            @else
                <div class="stand-placeholder">🍜</div>
            @endif
            <div class="stand-name">{{ $stand->nama }}</div>
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- KONTAK SPONSORSHIP -->
@if($kontakSponsorships->count())
<section class="kontak-section" id="kontak-sponsor">
    <div class="kontak-inner">
        <div class="section-header">
            <span class="section-tag tag-gold">Bergabung Bersama Kami</span>
            <h2>INGIN MENJADI SPONSOR?</h2>
            <p>Dukung generasi muda SMP Waringin Bandung dalam menampilkan karya dan bakat terbaik mereka. Hubungi kami untuk informasi sponsorship.</p>
            <div class="divider"></div>
        </div>
        <div class="kontak-cards">
            @foreach($kontakSponsorships as $kontak)
            <div class="kontak-card">
                <div class="k-icon">📞</div>
                <div class="k-nama">{{ $kontak->nama }}</div>
                <div class="k-nomor">{{ $kontak->nomor }}</div>
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $kontak->nomor) }}" target="_blank" class="k-wa">
                    <span>💬</span> WhatsApp
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- FOOTER -->
<footer>
    <h3>⚔ INFINITY WARS</h3>
    <p>SMP Waringin Bandung</p>
    <p>Menampilkan Karya & Bakat Para Siswa</p>

    <div class="footer-links">
        <a href="https://smpwaringinbdg.sch.id" target="_blank" rel="noopener" class="footer-link footer-link-web">
            🌐 smpwaringinbdg.sch.id
        </a>
        <a href="https://www.instagram.com/smpwaringinbandung/" target="_blank" rel="noopener" class="footer-link footer-link-ig">
            📸 @smpwaringinbandung
        </a>
    </div>

    <div class="copy">
        &copy; {{ date('Y') }} SMP Waringin Bandung. All rights reserved.
    </div>
</footer>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">✕</span>
    <img id="lightbox-img" src="" alt="Foto">
</div>

<script>
    // Burger menu
    const burger = document.getElementById('burger');
    const mobileMenu = document.getElementById('mobile-menu');

    burger.addEventListener('click', () => {
        burger.classList.toggle('open');
        mobileMenu.classList.toggle('open');
    });

    function closeMenu() {
        burger.classList.remove('open');
        mobileMenu.classList.remove('open');
    }

    // Tutup menu saat klik di luar
    document.addEventListener('click', (e) => {
        if (!burger.contains(e.target) && !mobileMenu.contains(e.target)) {
            closeMenu();
        }
    });

    // Lazy load dengan Intersection Observer
    const lazyImages = document.querySelectorAll('img.lazy');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.onload = () => img.classList.add('loaded');
                img.onerror = () => img.classList.add('loaded'); // tetap tampil walau error
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '100px 0px', // mulai load 100px sebelum masuk viewport
        threshold: 0.01
    });

    lazyImages.forEach(img => imageObserver.observe(img));

    // Particles
    const container = document.getElementById('particles');
    for (let i = 0; i < 40; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.left = Math.random() * 100 + '%';
        p.style.animationDuration = (Math.random() * 15 + 8) + 's';
        p.style.animationDelay = (Math.random() * 10) + 's';
        p.style.width = p.style.height = (Math.random() * 3 + 1) + 'px';
        container.appendChild(p);
    }

    // Lightbox
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.add('active');
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
    }
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });
</script>
</body>
</html>
