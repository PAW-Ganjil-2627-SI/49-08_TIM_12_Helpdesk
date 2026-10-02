<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat tiket - IT Helpdesk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #12202b; --muted: #566672; --paper: #f6f8f7; --white: #fff; --line: #dbe3e0;
            --brand: #1abc9c; --brand-deep: #0b7a69; --brand-tint: #e3f5f1;
            --amber: #a86a00; --amber-tint: #fdf0d5; --red: #b53a26; --red-tint: #fbe4df;
            --display: 'Bricolage Grotesque', 'Segoe UI', sans-serif;
            --body: 'Public Sans', 'Segoe UI', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; background: var(--paper); color: var(--ink); font-family: var(--body); font-size: 16px; line-height: 1.6; }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 3px solid var(--brand-deep); outline-offset: 3px; border-radius: 4px; }
        .wrap { max-width: 1160px; margin: 0 auto; padding: 0 28px; }

        .nav { background: var(--white); border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 10; }
        .nav .wrap { display: flex; align-items: center; justify-content: space-between; height: 68px; gap: 24px; }
        .brand { display: flex; align-items: center; gap: 10px; font-family: var(--display); font-weight: 700; font-size: 20px; }
        .menu { display: flex; gap: 28px; font-size: 15px; font-weight: 500; color: var(--muted); }
        .menu a:hover { color: var(--ink); }
        .btn { display: inline-flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; padding: 11px 20px; border-radius: 8px; border: 1.5px solid transparent; cursor: pointer; font-family: var(--body); }
        .btn-solid { background: var(--brand-deep); color: #fff; }
        .btn-solid:hover { background: #09665a; }
        .btn-line { border-color: var(--ink); color: var(--ink); background: transparent; }
        .btn-line:hover { background: var(--ink); color: #fff; }

        .page { padding: 48px 0 88px; }
        .crumb { font-size: 14px; color: var(--muted); margin-bottom: 18px; }
        .crumb a { border-bottom: 1px solid var(--line); }
        h1 { font-family: var(--display); font-weight: 700; font-size: clamp(32px, 4vw, 46px); line-height: 1.08; letter-spacing: -0.02em; margin: 0 0 12px; }
        .sub { color: var(--muted); max-width: 34em; margin: 0 0 36px; }
        .layout { display: grid; grid-template-columns: 1.6fr 1fr; gap: 56px; align-items: start; }

        /* Form */
        form { background: var(--white); border: 1px solid var(--line); border-radius: 14px; padding: 32px; display: grid; gap: 22px; }
        .two { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .field { display: grid; gap: 6px; }
        label, .legend { font-weight: 600; font-size: 15px; }
        .hint { font-weight: 400; color: var(--muted); font-size: 13.5px; }
        input[type=text], select, textarea { width: 100%; font: inherit; color: var(--ink); background: var(--white); border: 1.5px solid #c3cfcb; border-radius: 8px; padding: 11px 14px; }
        textarea { min-height: 140px; resize: vertical; }
        input[type=text], select { height: 48px; line-height: 1.4; }
        input:hover, select:hover, textarea:hover { border-color: #93a5a0; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--brand-deep); box-shadow: 0 0 0 3px var(--brand-tint); }
        .invalid { border-color: var(--red) !important; }
        .error { color: var(--red); font-size: 13.5px; font-weight: 500; }
        fieldset { border: 0; margin: 0; padding: 0; display: grid; gap: 8px; }
        .seg { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
        .seg label { position: relative; font-weight: 500; }
        .seg input { position: absolute; opacity: 0; inset: 0; cursor: pointer; }
        .seg span { display: block; text-align: center; padding: 10px 8px; border: 1.5px solid #c3cfcb; border-radius: 8px; font-size: 15px; }
        .seg small { display: block; font-size: 12.5px; color: var(--muted); font-weight: 400; }
        .seg input:checked + span { border-color: var(--brand-deep); background: var(--brand-tint); font-weight: 600; }
        .seg .urgent input:checked + span { border-color: var(--red); background: var(--red-tint); }
        .seg input:focus-visible + span { outline: 3px solid var(--brand-deep); outline-offset: 2px; }
        .submit { display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap; padding-top: 6px; border-top: 1px solid var(--line); margin-top: 4px; padding-top: 22px; }
        .submit p { margin: 0; font-size: 14px; color: var(--muted); max-width: 24em; }

        /* Samping */
        aside { position: sticky; top: 92px; }
        aside h2 { font-family: var(--display); font-size: 22px; margin: 0 0 14px; }
        aside ul { list-style: none; margin: 0 0 24px; padding: 0; display: grid; gap: 14px; }
        aside li { padding-left: 16px; border-left: 3px solid var(--brand); color: var(--muted); font-size: 15px; }
        aside li b { color: var(--ink); display: block; font-weight: 600; }
        aside a.link { font-weight: 600; color: var(--brand-deep); border-bottom: 1.5px solid var(--brand); }

        /* Berhasil */
        .done { background: var(--white); border: 1px solid var(--line); border-radius: 14px; padding: 40px; max-width: 640px; }
        .done .no { display: inline-block; font-family: ui-monospace, Consolas, monospace; font-size: 18px; font-weight: 600; background: var(--brand-tint); color: var(--brand-deep); padding: 6px 14px; border-radius: 8px; margin: 6px 0 18px; }
        .done p { color: var(--muted); margin: 0 0 24px; }
        .done .actions { display: flex; gap: 12px; flex-wrap: wrap; }

        @media (max-width: 900px) {
            .menu { display: none; }
            .layout { grid-template-columns: 1fr; gap: 36px; }
            aside { position: static; }
            .page { padding: 32px 0 56px; }
        }
        @media (max-width: 560px) {
            .wrap { padding: 0 18px; }
            form, .done { padding: 22px; }
            .two, .seg { grid-template-columns: 1fr; }
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
                <a href="{{ url('/') }}">Beranda</a>
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

    <main class="page">
        <div class="wrap">
            <div class="crumb"><a href="{{ url('/') }}">Beranda</a> / Buat tiket</div>

            @if (session('ticket_no'))
                <div class="done" role="status">
                    <h1>Tiket terkirim</h1>
                    <div class="no">{{ session('ticket_no') }}</div>
                    <p>Simpan nomor tiket ini. Teknisi akan menghubungi Anda setelah tiket ditugaskan, dan statusnya bisa dipantau kapan saja.</p>
                    <div class="actions">
                        <a href="{{ route('tickets.create') }}" class="btn btn-solid">Buat tiket lain</a>
                        <a href="{{ url('/') }}" class="btn btn-line">Kembali ke beranda</a>
                    </div>
                </div>
            @else
                <h1>Buat tiket baru</h1>
                <p class="sub">Ceritakan masalahnya sejelas mungkin. Semakin lengkap, semakin cepat teknisi bisa menanganinya.</p>

                <div class="layout">
                    <form method="POST" action="{{ route('tickets.store') }}" novalidate>
                        @csrf

                        <div class="two">
                            <div class="field">
                                <label for="nama">Nama lengkap</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" autocomplete="name" class="{{ $errors->has('nama') ? 'invalid' : '' }}" required>
                                @error('nama') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="departemen">Departemen</label>
                                <select id="departemen" name="departemen" class="{{ $errors->has('departemen') ? 'invalid' : '' }}" required>
                                    <option value="">Pilih departemen</option>
                                    @foreach (['Keuangan', 'HRD', 'Pemasaran', 'Operasional', 'Produksi', 'Lainnya'] as $d)
                                        <option value="{{ $d }}" @selected(old('departemen') === $d)>{{ $d }}</option>
                                    @endforeach
                                </select>
                                @error('departemen') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="two">
                            <div class="field">
                                <label for="kategori">Kategori masalah</label>
                                <select id="kategori" name="kategori" class="{{ $errors->has('kategori') ? 'invalid' : '' }}" required>
                                    <option value="">Pilih kategori</option>
                                    @foreach (['Jaringan & Wi-Fi', 'Perangkat keras', 'Perangkat lunak', 'Akun & email', 'Printer & periferal'] as $k)
                                        <option value="{{ $k }}" @selected(old('kategori', request('kategori')) === $k)>{{ $k }}</option>
                                    @endforeach
                                </select>
                                @error('kategori') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="field">
                                <label for="aset">Kode aset PC <span class="hint">(opsional)</span></label>
                                <input type="text" id="aset" name="aset" value="{{ old('aset', request('aset')) }}" placeholder="Contoh: PC-KEU-014">
                            </div>
                        </div>

                        <div class="field">
                            <label for="judul">Judul masalah</label>
                            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Printer lantai 2 tidak terdeteksi" class="{{ $errors->has('judul') ? 'invalid' : '' }}" required>
                            @error('judul') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label for="deskripsi">Apa yang terjadi?</label>
                            <textarea id="deskripsi" name="deskripsi" class="{{ $errors->has('deskripsi') ? 'invalid' : '' }}" placeholder="Sejak kapan terjadi, apa yang sudah dicoba, dan pesan error yang muncul (kalau ada)." required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <fieldset>
                            <span class="legend">Seberapa mendesak?</span>
                            <div class="seg">
                                <label><input type="radio" name="prioritas" value="rendah" @checked(old('prioritas') === 'rendah')><span>Rendah<small>Masih bisa bekerja</small></span></label>
                                <label><input type="radio" name="prioritas" value="sedang" @checked(old('prioritas', 'sedang') === 'sedang')><span>Sedang<small>Pekerjaan terhambat</small></span></label>
                                <label class="urgent"><input type="radio" name="prioritas" value="mendesak" @checked(old('prioritas') === 'mendesak')><span>Mendesak<small>Tidak bisa bekerja</small></span></label>
                            </div>
                            @error('prioritas') <span class="error">{{ $message }}</span> @enderror
                        </fieldset>

                        <div class="submit">
                            <p>Tiket langsung masuk antrean dan akan ditugaskan ke teknisi.</p>
                            <button type="submit" class="btn btn-solid">Kirim tiket</button>
                        </div>
                    </form>

                    <aside>
                        <h2>Sebelum mengirim</h2>
                        <ul>
                            <li><b>Coba mulai ulang perangkat</b>Banyak masalah ringan selesai dengan restart dan memeriksa kabel.</li>
                            <li><b>Catat pesan error persis</b>Foto layar atau salinan teks error membantu teknisi menemukan penyebabnya.</li>
                            <li><b>Sebutkan kode aset</b>Biasanya ada stiker di badan PC atau laptop.</li>
                        </ul>
                        <a href="{{ route('kb.index') }}" class="link">Cari solusi di Knowledge Base</a>
                    </aside>
                </div>
            @endif
        </div>
    </main>

</body>
</html>