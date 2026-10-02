<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IT Helpdesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #12202b; --muted: #566672; --paper: #f6f8f7; --white: #fff; --line: #dbe3e0;
            --brand: #1abc9c; --brand-deep: #0b7a69; --brand-tint: #e3f5f1;
            --amber: #a86a00; --amber-tint: #fdf0d5; --red: #b53a26; --red-tint: #fbe4df; --slate-tint: #e8edf0;
            --display: 'Bricolage Grotesque', 'Segoe UI', sans-serif;
            --body: 'Public Sans', 'Segoe UI', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        [hidden] { display: none !important; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: var(--body); font-size: 16px; line-height: 1.6; }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 3px solid var(--brand-deep); outline-offset: 3px; border-radius: 4px; }
        .wrap { max-width: 1160px; margin: 0 auto; padding: 0 28px; }

        .nav { background: var(--white); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 10; }
        .nav .wrap { display: flex; align-items: center; justify-content: space-between; height: 68px; gap: 24px; }
        .brand { display: flex; align-items: center; gap: 10px; font-family: var(--display); font-weight: 700; font-size: 20px; }
        .menu { display: flex; gap: 28px; font-size: 15px; font-weight: 500; color: var(--muted); }
        .menu a:hover, .menu a[aria-current] { color: var(--ink); }
        .menu a[aria-current] { box-shadow: 0 2px 0 var(--brand); padding-bottom: 4px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; padding: 11px 20px; border-radius: 8px; border: 1.5px solid transparent; cursor: pointer; font-family: var(--body); }
        .btn-solid { background: var(--brand-deep); color: #fff; }
        .btn-solid:hover { background: #09665a; }
        .btn-line { border-color: var(--ink); color: var(--ink); }
        .btn-line:hover { background: var(--ink); color: #fff; }

        .page { padding: 48px 0 88px; }
        .crumb { font-size: 14px; color: var(--muted); margin-bottom: 18px; }
        .crumb a { border-bottom: 1px solid var(--line); }
        h1 { font-family: var(--display); font-weight: 700; font-size: clamp(32px, 4vw, 46px); line-height: 1.08; letter-spacing: -0.02em; margin: 0 0 12px; }
        .sub { color: var(--muted); max-width: 36em; margin: 0 0 36px; }
        .note { margin: 28px 0 0; font-size: 13.5px; color: var(--muted); }
        .textlink { font-weight: 600; color: var(--brand-deep); border-bottom: 1.5px solid var(--brand); }

        .items { border-bottom: 1px solid var(--line); }
        .item { display: grid; grid-template-columns: 240px 1fr 170px; gap: 24px; padding: 26px 0; border-top: 1px solid var(--line); align-items: start; }
        .item h3 { font-family: var(--display); font-size: 21px; line-height: 1.2; margin: 0; }
        .item p { margin: 0 0 6px; color: var(--muted); }
        .item .ex { font-size: 14.5px; }
        .item .side { display: grid; gap: 6px; justify-items: start; }
        .item .count { font-weight: 600; }

        .tablewrap { overflow-x: auto; background: var(--white); border: 1px solid var(--line); border-radius: 14px; }
        table { width: 100%; border-collapse: collapse; min-width: 680px; }
        th { text-align: left; font-size: 13.5px; font-weight: 600; color: var(--muted); padding: 14px 18px; background: var(--brand-tint); border-bottom: 1px solid var(--line); }
        td { padding: 14px 18px; border-bottom: 1px solid var(--line); font-size: 15px; vertical-align: middle; }
        tr:last-child td { border-bottom: 0; }
        .mono { font-family: ui-monospace, Consolas, monospace; font-size: 13.5px; font-variant-numeric: tabular-nums; }
        .chip { display: inline-block; font-size: 12.5px; font-weight: 600; padding: 4px 10px; border-radius: 999px; white-space: nowrap; }
        .chip.new { background: var(--red-tint); color: var(--red); }
        .chip.doing { background: var(--amber-tint); color: var(--amber); }
        .chip.done { background: var(--brand-tint); color: var(--brand-deep); }
        .bar { height: 8px; width: 110px; background: var(--line); border-radius: 99px; overflow: hidden; }
        .bar i { display: block; height: 100%; background: var(--brand-deep); }
        .bar.high i { background: var(--amber); }
        .load { display: flex; align-items: center; gap: 12px; }

        .tools { display: flex; gap: 14px; align-items: center; flex-wrap: wrap; margin-bottom: 20px; }
        .tools .sum { color: var(--muted); font-size: 15px; margin-left: auto; }
        input[type=search], select { font: inherit; color: var(--ink); background: var(--white); border: 1.5px solid #c3cfcb; border-radius: 8px; padding: 0 14px; height: 48px; }
        input[type=search] { flex: 1; min-width: 220px; max-width: 480px; }
        input:focus, select:focus { outline: none; border-color: var(--brand-deep); box-shadow: 0 0 0 3px var(--brand-tint); }

        .faq { border-bottom: 1px solid var(--line); }
        .faq details { border-top: 1px solid var(--line); padding: 20px 0; }
        .faq summary { cursor: pointer; list-style: none; display: flex; justify-content: space-between; gap: 16px; font-family: var(--display); font-weight: 600; font-size: 20px; line-height: 1.3; }
        .faq summary::-webkit-details-marker { display: none; }
        .faq summary::after { content: '+'; font-weight: 400; font-size: 26px; line-height: 1; color: var(--brand-deep); }
        .faq details[open] summary::after { content: '\2212'; }
        .faq .body { margin-top: 14px; max-width: 62ch; color: var(--muted); }
        .faq ol { margin: 0 0 14px; padding-left: 22px; }
        .faq li { margin-bottom: 6px; }
        .empty { padding: 28px 0; color: var(--muted); }

        footer { padding: 28px 0; font-size: 14px; color: var(--muted); border-top: 1px solid var(--line); }
        footer .wrap { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }

        @media (max-width: 900px) {
            .nav .wrap { height: auto; flex-wrap: wrap; padding-top: 12px; padding-bottom: 0; gap: 12px; }
            .menu { order: 3; width: 100%; overflow-x: auto; gap: 22px; padding: 6px 0 12px; white-space: nowrap; }
            .page { padding: 32px 0 56px; }
            .item { grid-template-columns: 1fr; gap: 8px; }
        }
        @media (max-width: 560px) { .wrap { padding: 0 18px; } .tools .sum { margin-left: 0; width: 100%; } }
        .navr { display: flex; align-items: center; gap: 12px; }
        .navr form { margin: 0; }
        .who { font-size: 15px; font-weight: 500; color: var(--muted); }
        button.btn { font-family: var(--body); }
        @media (max-width: 560px) { .who { display: none; } }
    </style>
</head>
<body>

    <header class="nav">
        <div class="wrap">
            <a href="{{ url('/') }}" class="brand" aria-label="IT Helpdesk, ke beranda">
                <svg width="34" height="34" viewBox="0 0 34 34" aria-hidden="true">
                    <path d="M5 8a3 3 0 0 1 3-3h18a3 3 0 0 1 3 3v4.5a4.5 4.5 0 0 0 0 9V26a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3v-4.5a4.5 4.5 0 0 0 0-9V8Z" fill="#1abc9c"/>
                    <path d="m11.5 17.2 3.6 3.6 7.4-7.6" fill="none" stroke="#12202b" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                IT Helpdesk
            </a>
            <nav class="menu" aria-label="Menu utama">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('categories.index') }}" @if (request()->routeIs('categories.*')) aria-current="page" @endif>Kategori Masalah</a>
                <a href="{{ route('technicians.index') }}" @if (request()->routeIs('technicians.*')) aria-current="page" @endif>Teknisi IT</a>
                <a href="{{ route('kb.index') }}" @if (request()->routeIs('kb.*')) aria-current="page" @endif>Knowledge Base</a>
                <a href="{{ route('assets.index') }}" @if (request()->routeIs('assets.*')) aria-current="page" @endif>Aset PC</a>
            </nav>
            <div class="navr">
                @auth
                    <span class="who">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-line">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-line">Masuk</a>
                @endauth
                <a href="{{ route('tickets.create') }}" class="btn btn-solid">Buat tiket</a>
            </div>
        </div>
    </header>

    <main class="page">
        <div class="wrap">
            <div class="crumb"><a href="{{ url('/') }}">Beranda</a> / @yield('title')</div>
            <h1>@yield('title')</h1>
            <p class="sub">@yield('lead')</p>

            @yield('content')

            <p class="note">Data contoh untuk ilustrasi tampilan.</p>
        </div>
    </main>

    <footer>
        <div class="wrap">
            <span>IT Helpdesk System</span>
            <span>Tugas Besar Pemrograman Web</span>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>