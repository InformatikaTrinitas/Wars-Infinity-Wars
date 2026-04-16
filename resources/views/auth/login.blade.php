<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Infinity Wars Admin</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="shortcut icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root { --maroon:#2E7D4F; --maroon-dark:#1B5E38; --green:#1A6B2A; --gold:#D4AF37; }
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Poppins',sans-serif; min-height:100vh;
            background:linear-gradient(135deg,var(--maroon-dark) 0%,#050F08 50%,#0A1A0F 100%);
            display:flex; align-items:center; justify-content:center;
        }
        .login-box {
            background:rgba(255,255,255,.04); border:1px solid rgba(212,175,55,.2);
            border-radius:16px; padding:48px 40px; width:100%; max-width:420px;
            backdrop-filter:blur(10px);
        }
        .login-brand { text-align:center; margin-bottom:36px; }
        .login-brand h1 { font-family:'Cinzel',serif; font-size:1.8rem; color:var(--gold); letter-spacing:3px; }
        .login-brand p { color:#888; font-size:.82rem; margin-top:6px; }
        .form-group { margin-bottom:18px; }
        .form-group label { display:block; margin-bottom:6px; font-size:.85rem; color:#ccc; font-weight:500; }
        .form-control {
            width:100%; padding:12px 16px; border-radius:8px;
            border:1px solid #444; background:rgba(255,255,255,.05); color:#fff;
            font-family:'Poppins',sans-serif; font-size:.9rem; transition:border .2s;
        }
        .form-control:focus { outline:none; border-color:var(--gold); }
        .btn-login {
            width:100%; padding:13px; background:linear-gradient(135deg,var(--maroon),#3DA066);
            color:#fff; border:none; border-radius:8px; font-family:'Poppins',sans-serif;
            font-size:.95rem; font-weight:700; cursor:pointer; letter-spacing:1px;
            transition:all .3s; margin-top:8px;
        }
        .btn-login:hover { opacity:.9; transform:translateY(-1px); }
        .alert-danger { background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; padding:10px 14px; border-radius:6px; font-size:.85rem; margin-bottom:16px; }
        .invalid-feedback { color:#f87171; font-size:.78rem; margin-top:4px; display:block; }
        .back-link { text-align:center; margin-top:20px; }
        .back-link a { color:#888; font-size:.82rem; transition:color .2s; }
        .back-link a:hover { color:var(--gold); }
        .remember { display:flex; align-items:center; gap:8px; font-size:.85rem; color:#aaa; }
        .remember input { accent-color:var(--maroon); }
    </style>
</head>
<body>
<div class="login-box">
    <div class="login-brand">
        <h1>INFINITY WARS</h1>
        <p>Panel Admin — SMP Waringin Bandung</p>
    </div>

    @if($errors->any())
        <div class="alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@smpwaringinbdg.sch.id" required autofocus>
            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <div class="form-group">
            <label class="remember">
                <input type="checkbox" name="remember"> Ingat saya
            </label>
        </div>
        <button type="submit" class="btn-login">MASUK</button>
    </form>

    <div class="back-link">
        <a href="{{ route('landing') }}">← Kembali ke Website</a>
    </div>
</div>
</body>
</html>
