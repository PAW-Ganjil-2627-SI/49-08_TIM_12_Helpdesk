<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT Helpdesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #12202b;
            --muted: #566672;
            --paper: #f6f8f7;
            --white: #ffffff;
            --line: #dbe3e0;
            --brand: #1abc9c;
            --brand-deep: #0b7a69;
            --brand-tint: #e3f5f1;
            --amber: #a86a00;
            --amber-tint: #fdf0d5;
            --red: #b53a26;
            --red-tint: #fbe4df;
            --slate-tint: #e8edf0;
            --display: 'Bricolage Grotesque', 'Segoe UI', sans-serif;
            --body: 'Public Sans', 'Segoe UI', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: var(--body); font-size: 16px; line-height: 1.6; }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 3px solid var(--brand-deep); outline-offset: 3px; border-radius: 4px; }
        .wrap { max-width: 1160px; margin: 0 auto; padding: 0 28px; }

        /* Navbar */
        .nav { background: var(--white); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 10; }
        .nav .wrap { display: flex; align-items: center; justify-content: space-between; height: 68px; gap: 24px; }
        .brand { display: flex; align-items: center; gap: 10px; font-family: var(--display); font-weight: 700; font-size: 20px; }
        .menu { display: flex; gap: 28px; font-size: 15px; font-weight: 500; color: var(--muted); }
        .menu a:hover, .menu a[aria-current] { color: var(--ink); }
        .menu a[aria-current] { box-shadow: 0 2px 0 var(--brand); padding-bottom: 4px; }
        .btn { display: inline-flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; padding: 11px 20px; border-radius: 8px; border: 1.5px solid transparent; cursor: pointer; }
        .btn-solid { background: var(--brand-deep); color: #fff; }
        .btn-solid:hover { background: #09665a; }
        .btn-line { border-color: var(--ink); color: var(--ink); background: transparent; }
        .btn-line:hover { background: var(--ink); color: #fff; }

        /* Hero */
        .hero { padding: 72px 0 88px; }
        .hero .wrap { display: grid; grid-template-columns: 1.05fr 1fr; gap: 64px; align-items: center; }
        h1 { font-family: var(--display); font-weight: 700; font-size: clamp(38px, 5.2vw, 62px); line-height: 1.04; letter-spacing: -0.02em; margin: 0 0 22px; }
        .lead { font-size: 18px; color: var(--muted); max-width: 30em; margin: 0 0 34px; }
        .actions { display: flex; gap: 12px; flex-wrap: wrap; }

        /* Panel antrean tiket */
        .queue { background: var(--white); border: 1px solid var(--line); border-radius: 14px; box-shadow: 0 1px 0 var(--line), 0 24px 48px -28px rgba(18,32,43,.35); overflow: hidden; }
        .queue-head { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid var(--line); background: var(--brand-tint); }
        .queue-head strong { font-family: var(--display); font-size: 17px; }
        .queue-head span { font-size: 13px; color: var(--brand-deep); font-weight: 600; }
        .ticket { display: grid; grid-template-columns: 1fr auto; gap: 4px 16px; padding: 16px 20px; border-bottom: 1px solid var(--line); }
        .ticket:last-of-type { border-bottom: 0; }
        .ticket h3 { margin: 0; font-size: 15px; font-weight: 600; line-height: 1.35; }
        .ticket .meta { grid-column: 1; font-size: 13px; color: var(--muted); }
        .ticket .id { font-variant-numeric: tabular-nums; font-family: ui-monospace, Consolas, monospace; font-size: 12.5px; }
        .chip { grid-row: 1 / span 2; grid-column: 2; align-self: center; font-size: 12.5px; font-weight: 600; padding: 4px 10px; border-radius: 999px; white-space: nowrap; }
        .chip.new { background: var(--red-tint); color: var(--red); }
        .chip.assigned { background: var(--slate-tint); color: #34495a; }
        .chip.doing { background: var(--amber-tint); color: var(--amber); }
        .chip.done { background: var(--brand-tint); color: var(--brand-deep); }
        .queue-foot { padding: 12px 20px; font-size: 12.5px; color: var(--muted); border-top: 1px solid var(--line); background: var(--paper); }

        /* Satu-satunya animasi: baris tiket muncul bergantian saat halaman dibuka */
        @keyframes drop-in { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: none; } }
        .ticket { animation: drop-in .5s ease-out both; }
        .ticket:nth-of-type(1) { animation-delay: .15s; }
        .ticket:nth-of-type(2) { animation-delay: .3s; }
        .ticket:nth-of-type(3) { animation-delay: .45s; }
        .ticket:nth-of-type(4) { animation-delay: .6s; }
        @media (prefers-reduced-motion: reduce) { .ticket { animation: none; } html { scroll-behavior: auto; } }

        /* Modul */
        .modules { background: var(--white); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line); padding: 88px 0; }
        .modules .wrap { display: grid; grid-template-columns: 1fr 1.6fr; gap: 64px; }
        h2 { font-family: var(--display); font-weight: 700; font-size: clamp(28px, 3.4vw, 40px); line-height: 1.1; letter-spacing: -0.015em; margin: 0 0 16px; }
        .modules p.intro { color: var(--muted); max-width: 22em; margin: 0; }
        .row { display: grid; grid-template-columns: 220px 1fr; gap: 24px; padding: 26px 0; border-top: 1px solid var(--line); }
        .row:first-child { border-top: 0; padding-top: 4px; }
        .row h3 { font-family: var(--display); font-size: 21px; margin: 0; line-height: 1.2; }
        .row p { margin: 0 0 8px; color: var(--muted); }
        .row a { font-weight: 600; font-size: 15px; color: var(--brand-deep); border-bottom: 1.5px solid var(--brand); }

        /* Alur */
        .flow { padding: 88px 0; }
        .steps { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; margin-top: 44px; list-style: none; padding: 0; }
        .steps li { position: relative; padding: 22px 24px 0 0; border-top: 3px solid var(--line); }
        .steps li::before { content: ''; position: absolute; top: -3px; left: 0; width: 56px; border-top: 3px solid var(--brand-deep); }
        .steps b { display: block; font-family: var(--display); font-size: 20px; margin-bottom: 6px; }
        .steps span { color: var(--muted); font-size: 15px; display: block; max-width: 17em; }

        /* Ajakan */
        .cta { background: var(--ink); color: #fff; padding: 64px 0; }
        .cta .wrap { display: flex; justify-content: space-between; align-items: center; gap: 32px; flex-wrap: wrap; }
        .cta h2 { margin: 0 0 8px; }
        .cta p { margin: 0; color: #b9c7d0; }
        .cta .btn-solid { background: var(--brand); color: var(--ink); }
        .cta .btn-solid:hover { background: #3dd0b2; }
        footer { padding: 28px 0; font-size: 14px; color: var(--muted); }
        footer .wrap { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }

        @media (max-width: 900px) {
            .menu { display: none; }
            .hero { padding: 44px 0 56px; }
            .hero .wrap, .modules .wrap { grid-template-columns: 1fr; gap: 40px; }
            .row { grid-template-columns: 1fr; gap: 8px; }
            .steps { grid-template-columns: 1fr 1fr; row-gap: 32px; }
            .modules, .flow { padding: 56px 0; }
        }
        @media (max-width: 520px) {
            .wrap { padding: 0 18px; }
            .steps { grid-template-columns: 1fr; }
            .nav .btn-line { display: none; }
        }
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
                <a href="#" aria-current="page">Beranda</a>
                <a href="{{ route('categories.index') }}">Kategori Masalah</a>
                <a href="{{ route('technicians.index') }}">Teknisi IT</a>
                <a href="{{ route('kb.index') }}">Knowledge Base</a>
                <a href="{{ route('assets.index') }}">Aset PC</a>
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
                
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="wrap">
                <div>
                    <h1>Laporkan masalah IT. Pantau sampai selesai.</h1>
                    <p class="lead">Kirim tiket dari mana saja, lihat teknisi mana yang menangani, dan cek perkembangannya tanpa perlu datang ke meja IT.</p>
                    <div class="actions">
                        <a href="{{ route('tickets.create') }}" class="btn btn-solid">Buat tiket</a>
                        <a href="{{ route('kb.index') }}" class="btn btn-line">Cari solusi di Knowledge Base</a>
                    </div>
                </div>

                <div class="queue" role="img" aria-label="Contoh tampilan antrean tiket helpdesk">
                    <div class="queue-head">
                        <strong>Antrean tiket hari ini</strong>
                        <span>4 tiket</span>
                    </div>
                    <div class="ticket">
                        <h3>Wi-Fi ruang rapat putus-putus</h3>
                        <span class="chip new">Baru</span>
                        <div class="meta"><span class="id">TKT-0148</span> · Operasional</div>
                    </div>
                    <div class="ticket">
                        <h3>Laptop restart sendiri saat dipakai</h3>
                        <span class="chip assigned">Ditugaskan</span>
                        <div class="meta"><span class="id">TKT-0147</span> · Pemasaran · Dimas</div>
                    </div>
                    <div class="ticket">
                        <h3>Printer lantai 2 tidak terdeteksi</h3>
                        <span class="chip doing">Diproses</span>
                        <div class="meta"><span class="id">TKT-0146</span> · Keuangan · Rudi</div>
                    </div>
                    <div class="ticket">
                        <h3>Tidak bisa masuk email kantor</h3>
                        <span class="chip done">Selesai</span>
                        <div class="meta"><span class="id">TKT-0145</span> · HRD · Sinta</div>
                    </div>
                    <div class="queue-foot">Data contoh untuk ilustrasi tampilan.</div>
                </div>
            </div>
        </section>

        <section class="modules" id="modul">
            <div class="wrap">
                <div>
                    <h2>Semua urusan IT kantor di satu tempat</h2>
                    <p class="intro">Empat bagian yang saling terhubung, dari laporan pertama sampai catatan perbaikan.</p>
                </div>
                <div>
                    <div class="row">
                        <h3>Kategori masalah</h3>
                        <div>
                            <p>Jaringan, perangkat keras, perangkat lunak, atau akun. Setiap tiket masuk ke kategori yang tepat sejak awal.</p>
                            <a href="{{ route('categories.index') }}">Lihat kategori</a>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Teknisi IT</h3>
                        <div>
                            <p>Tiket diteruskan ke teknisi yang sesuai bidangnya, dan jumlah tiket yang sedang dipegang tiap teknisi terlihat jelas.</p>
                            <a href="{{ route('technicians.index') }}">Lihat teknisi</a>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Knowledge Base</h3>
                        <div>
                            <p>Panduan dan jawaban atas pertanyaan yang sering muncul. Coba dulu sebelum membuat tiket, banyak masalah selesai di sini.</p>
                            <a href="{{ route('kb.index') }}">Buka panduan</a>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Aset PC</h3>
                        <div>
                            <p>Daftar komputer per departemen beserta riwayat perbaikannya, jadi teknisi tahu perangkat apa yang sedang dibahas.</p>
                            <a href="{{ route('assets.index') }}">Lihat aset</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flow">
            <div class="wrap">
                <h2>Perjalanan sebuah tiket</h2>
                <ol class="steps">
                    <li><b>Dilaporkan</b><span>Karyawan mengisi masalah, kategori, dan departemennya.</span></li>
                    <li><b>Ditugaskan</b><span>Tiket diberikan ke teknisi yang tersedia.</span></li>
                    <li><b>Diproses</b><span>Teknisi menangani dan memperbarui status.</span></li>
                    <li><b>Selesai</b><span>Solusinya tersimpan dan bisa dibaca lagi di Knowledge Base.</span></li>
                </ol>
            </div>
        </section>

        <section class="cta">
            <div class="wrap">
                <div>
                    <h2>Ada perangkat yang bermasalah?</h2>
                    <p>Tulis keluhannya, sisanya kami yang kabari.</p>
                </div>
                <a href="{{ route('tickets.create') }}" class="btn btn-solid">Buat tiket</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="wrap">
            <span>IT Helpdesk System</span>
            <span>Tugas Besar Pemrograman Web</span>
        </div>
    </footer>

</body>
</html>