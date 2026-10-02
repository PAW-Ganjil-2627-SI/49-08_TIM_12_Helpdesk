<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - IT Helpdesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #12202b; --muted: #566672; --paper: #f6f8f7; --white: #fff; --line: #dbe3e0;
            --brand: #1abc9c; --brand-deep: #0b7a69; --brand-tint: #e3f5f1; --red: #b53a26; --red-tint: #fbe4df;
            --display: 'Bricolage Grotesque', 'Segoe UI', sans-serif;
            --body: 'Public Sans', 'Segoe UI', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        [hidden] { display: none !important; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: var(--body); font-size: 16px; line-height: 1.6; }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 3px solid var(--brand-deep); outline-offset: 3px; border-radius: 4px; }

        .split { display: grid; grid-template-columns: 1fr 1.1fr; min-height: 100vh; }

        /* Sisi kiri */
        .side { background: var(--ink); color: #fff; padding: 48px 56px; display: flex; flex-direction: column; justify-content: space-between; gap: 40px; }
        .brand { display: inline-flex; align-items: center; gap: 10px; font-family: var(--display); font-weight: 700; font-size: 20px; }
        .side h1 { font-family: var(--display); font-weight: 700; font-size: clamp(30px, 3.4vw, 44px); line-height: 1.1; letter-spacing: -0.02em; margin: 0 0 28px; max-width: 14em; }
        .side ul { list-style: none; margin: 0; padding: 0; display: grid; gap: 16px; max-width: 26em; }
        .side li { padding-left: 16px; border-left: 3px solid var(--brand); color: #c3d0d8; font-size: 15px; }
        .side li b { display: block; color: #fff; font-weight: 600; }
        .side .back { color: #b9c7d0; font-size: 14px; border-bottom: 1px solid #3a4b57; justify-self: start; }
        .side .back:hover { color: #fff; }

        /* Sisi kanan */
        .main { display: flex; align-items: center; justify-content: center; padding: 48px 28px; }
        .box { width: 100%; max-width: 420px; }
        .tabs { display: grid; grid-template-columns: 1fr 1fr; background: var(--white); border: 1.5px solid #c3cfcb; border-radius: 10px; padding: 4px; gap: 4px; margin-bottom: 28px; }
        .tabs button { font: inherit; font-weight: 600; font-size: 15px; padding: 10px; border: 0; border-radius: 7px; background: transparent; color: var(--muted); cursor: pointer; }
        .tabs button[aria-selected=true] { background: var(--brand-deep); color: #fff; }
        h2 { font-family: var(--display); font-size: 30px; line-height: 1.1; margin: 0 0 6px; letter-spacing: -0.015em; }
        .lead { color: var(--muted); margin: 0 0 24px; }
        form { display: grid; gap: 18px; }
        .field { display: grid; gap: 6px; }
        label { font-weight: 600; font-size: 15px; }
        .hint { font-weight: 400; color: var(--muted); font-size: 13.5px; }
        input[type=text], input[type=email], input[type=password] { width: 100%; height: 48px; font: inherit; color: var(--ink); background: var(--white); border: 1.5px solid #c3cfcb; border-radius: 8px; padding: 0 14px; }
        input:hover { border-color: #93a5a0; }
        input:focus { outline: none; border-color: var(--brand-deep); box-shadow: 0 0 0 3px var(--brand-tint); }
        .invalid { border-color: var(--red) !important; }
        .error { color: var(--red); font-size: 13.5px; font-weight: 500; }
        .check { display: flex; align-items: center; gap: 10px; font-weight: 500; font-size: 15px; }
        .check input { width: 18px; height: 18px; accent-color: var(--brand-deep); }
        .btn { display: inline-flex; align-items: center; justify-content: center; width: 100%; height: 50px; font: inherit; font-weight: 600; border: 0; border-radius: 8px; background: var(--brand-deep); color: #fff; cursor: pointer; }
        .btn:hover { background: #09665a; }
        .switch { margin: 22px 0 0; text-align: center; color: var(--muted); font-size: 15px; }
        .switch button { font: inherit; font-weight: 600; color: var(--brand-deep); background: none; border: 0; border-bottom: 1.5px solid var(--brand); padding: 0; cursor: pointer; }

        @media (max-width: 880px) {
            .split { grid-template-columns: 1fr; }
            .side { padding: 28px 24px; gap: 20px; }
            .side ul { display: none; }
            .side h1 { font-size: 26px; margin: 0; }
            .side .back { display: none; }
            .main { padding: 32px 20px 56px; align-items: flex-start; }
        }
    </style>
</head>
<body>
@php $aktif = old('form', 'login'); @endphp

<div class="split">
    <aside class="side">
        <a href="{{ url('/') }}" class="brand" aria-label="IT Helpdesk, ke beranda">
            <svg width="34" height="34" viewBox="0 0 34 34" aria-hidden="true">
                <path d="M5 8a3 3 0 0 1 3-3h18a3 3 0 0 1 3 3v4.5a4.5 4.5 0 0 0 0 9V26a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3v-4.5a4.5 4.5 0 0 0 0-9V8Z" fill="#1abc9c"/>
                <path d="m11.5 17.2 3.6 3.6 7.4-7.6" fill="none" stroke="#12202b" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            IT Helpdesk
        </a>

        <div>
            <h1>Satu akun untuk semua laporan IT Anda.</h1>
            <ul>
                <li><b>Pantau status tiket</b>Lihat siapa teknisinya dan sampai mana penanganannya.</li>
                <li><b>Riwayat tersimpan</b>Masalah yang pernah dilaporkan bisa dibuka lagi kapan saja.</li>
                <li><b>Tidak perlu mengulang</b>Nama dan departemen terisi otomatis saat membuat tiket.</li>
            </ul>
        </div>

        <a href="{{ url('/') }}" class="back">Kembali ke beranda</a>
    </aside>

    <main class="main">
        <div class="box" data-awal="{{ $aktif }}">
            <div class="tabs" role="tablist" aria-label="Masuk atau daftar">
                <button type="button" role="tab" id="tab-login" data-tab="login" aria-controls="panel-login">Masuk</button>
                <button type="button" role="tab" id="tab-register" data-tab="register" aria-controls="panel-register">Daftar</button>
            </div>

            {{-- Masuk --}}
            <section id="panel-login" data-panel="login" role="tabpanel" aria-labelledby="tab-login">
                <h2>Selamat datang kembali</h2>
                <p class="lead">Masuk untuk melihat dan membuat tiket.</p>
                <form method="POST" action="{{ route('login.attempt') }}" novalidate>
                    @csrf
                    <input type="hidden" name="form" value="login">
                    @php $errLogin = $aktif === 'login' ? $errors : null; @endphp
                    <div class="field">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" name="email" value="{{ $aktif === 'login' ? old('email') : '' }}" autocomplete="email" class="{{ $errLogin && $errLogin->has('email') ? 'invalid' : '' }}" required>
                        @if ($errLogin && $errLogin->has('email')) <span class="error">{{ $errLogin->first('email') }}</span> @endif
                    </div>
                    <div class="field">
                        <label for="login-password">Kata sandi</label>
                        <input type="password" id="login-password" name="password" autocomplete="current-password" class="{{ $errLogin && $errLogin->has('password') ? 'invalid' : '' }}" required>
                        @if ($errLogin && $errLogin->has('password')) <span class="error">{{ $errLogin->first('password') }}</span> @endif
                    </div>
                    <label class="check"><input type="checkbox" name="remember" value="1"> Ingat saya di perangkat ini</label>
                    <button type="submit" class="btn">Masuk</button>
                </form>
                <p class="switch">Belum punya akun? <button type="button" data-go="register">Daftar sekarang</button></p>
            </section>

            {{-- Daftar --}}
            <section id="panel-register" data-panel="register" role="tabpanel" aria-labelledby="tab-register" hidden>
                <h2>Buat akun baru</h2>
                <p class="lead">Cukup satu menit, lalu Anda bisa langsung membuat tiket.</p>
                <form method="POST" action="{{ route('register.store') }}" novalidate>
                    @csrf
                    <input type="hidden" name="form" value="register">
                    @php $errReg = $aktif === 'register' ? $errors : null; @endphp
                    <div class="field">
                        <label for="reg-name">Nama lengkap</label>
                        <input type="text" id="reg-name" name="name" value="{{ $aktif === 'register' ? old('name') : '' }}" autocomplete="name" class="{{ $errReg && $errReg->has('name') ? 'invalid' : '' }}" required>
                        @if ($errReg && $errReg->has('name')) <span class="error">{{ $errReg->first('name') }}</span> @endif
                    </div>
                    <div class="field">
                        <label for="reg-email">Email</label>
                        <input type="email" id="reg-email" name="email" value="{{ $aktif === 'register' ? old('email') : '' }}" autocomplete="email" class="{{ $errReg && $errReg->has('email') ? 'invalid' : '' }}" required>
                        @if ($errReg && $errReg->has('email')) <span class="error">{{ $errReg->first('email') }}</span> @endif
                    </div>
                    <div class="field">
                        <label for="reg-password">Kata sandi <span class="hint">(minimal 8 karakter)</span></label>
                        <input type="password" id="reg-password" name="password" autocomplete="new-password" class="{{ $errReg && $errReg->has('password') ? 'invalid' : '' }}" required>
                        @if ($errReg && $errReg->has('password')) <span class="error">{{ $errReg->first('password') }}</span> @endif
                    </div>
                    <div class="field">
                        <label for="reg-confirm">Ulangi kata sandi</label>
                        <input type="password" id="reg-confirm" name="password_confirmation" autocomplete="new-password" required>
                    </div>
                    <button type="submit" class="btn">Buat akun</button>
                </form>
                <p class="switch">Sudah punya akun? <button type="button" data-go="login">Masuk</button></p>
            </section>
        </div>
    </main>
</div>

<script>
    const tabs = [...document.querySelectorAll('[data-tab]')];
    const panels = [...document.querySelectorAll('[data-panel]')];
    function tampil(nama) {
        tabs.forEach(t => t.setAttribute('aria-selected', t.dataset.tab === nama));
        panels.forEach(p => { p.hidden = p.dataset.panel !== nama; });
    }
    tabs.forEach(t => t.addEventListener('click', () => tampil(t.dataset.tab)));
    document.querySelectorAll('[data-go]').forEach(b => b.addEventListener('click', () => tampil(b.dataset.go)));
    tampil(document.querySelector('.box').dataset.awal === 'register' ? 'register' : 'login');
</script>
</body>
</html>