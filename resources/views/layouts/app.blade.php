<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Infinity Wars - SMP Waringin')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --maroon:     #6B0F1A;
            --maroon-dark:#4A0A12;
            --maroon-light:#8B1A2A;
            --green:      #1A6B2A;
            --green-dark: #0F4A1A;
            --green-light:#2A8B3A;
            --gold:       #D4AF37;
            --gold-light: #F0D060;
            --white:      #FFFFFF;
            --light:      #F8F4F0;
            --dark:       #1A0A0A;
            --gray:       #6B6B6B;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:var(--dark); color:var(--white); }
        a { text-decoration:none; color:inherit; }
        .btn {
            display:inline-block; padding:10px 24px; border-radius:6px;
            font-weight:600; cursor:pointer; border:none; transition:all .3s;
        }
        .btn-maroon { background:var(--maroon); color:var(--white); }
        .btn-maroon:hover { background:var(--maroon-light); }
        .btn-green  { background:var(--green); color:var(--white); }
        .btn-green:hover  { background:var(--green-light); }
        .btn-gold   { background:var(--gold); color:var(--dark); }
        .btn-gold:hover   { background:var(--gold-light); }
        .btn-outline-maroon { background:transparent; border:2px solid var(--maroon); color:var(--maroon); }
        .btn-outline-maroon:hover { background:var(--maroon); color:var(--white); }
        .btn-sm { padding:6px 14px; font-size:.85rem; }
        .btn-danger { background:#dc3545; color:#fff; }
        .btn-danger:hover { background:#bb2d3b; }
        .alert {
            padding:12px 18px; border-radius:6px; margin-bottom:16px; font-size:.9rem;
        }
        .alert-success { background:#d1fae5; color:#065f46; border:1px solid #6ee7b7; }
        .alert-danger  { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; }
        .form-group { margin-bottom:16px; }
        .form-group label { display:block; margin-bottom:6px; font-weight:500; font-size:.9rem; color:var(--light); }
        .form-control {
            width:100%; padding:10px 14px; border-radius:6px;
            border:1px solid #444; background:#2a1a1a; color:var(--white);
            font-family:'Poppins',sans-serif; font-size:.9rem;
        }
        .form-control:focus { outline:none; border-color:var(--gold); }
        .invalid-feedback { color:#f87171; font-size:.8rem; margin-top:4px; }
        .table-wrap { overflow-x:auto; }
        table { width:100%; border-collapse:collapse; }
        table th, table td { padding:12px 16px; text-align:left; border-bottom:1px solid #333; font-size:.9rem; }
        table th { background:var(--maroon-dark); color:var(--gold); font-weight:600; }
        table tr:hover td { background:rgba(107,15,26,.2); }
        .badge {
            display:inline-block; padding:3px 10px; border-radius:20px;
            font-size:.75rem; font-weight:600;
        }
        .badge-green { background:var(--green); color:#fff; }
        .badge-maroon { background:var(--maroon); color:#fff; }
        .pagination { display:flex; gap:6px; margin-top:20px; flex-wrap:wrap; }
        .pagination a, .pagination span {
            padding:6px 12px; border-radius:4px; font-size:.85rem;
            background:#2a1a1a; color:var(--light); border:1px solid #444;
        }
        .pagination .active span { background:var(--maroon); color:#fff; border-color:var(--maroon); }
    </style>
    @stack('styles')
</head>
<body>
@yield('content')
@stack('scripts')
</body>
</html>
