<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - IT Helpdesk</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; background: #f8fafc; color: #0f172a; }
        .topbar { height: 64px; background: #fff; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; position: fixed; top: 0; left: 0; right: 0; z-index: 10; }
        .topbar h1 { font-size: 20px; }
        .topbar form button { background: #ef4444; color: #fff; border: 0; padding: 8px 14px; border-radius: 8px; cursor: pointer; }
        .user { display: flex; align-items: center; gap: 14px; font-size: 14px; }
        .sidebar { width: 240px; background: #fff; border-right: 1px solid #e2e8f0; position: fixed; top: 64px; bottom: 0; padding: 16px; }
        .sidebar a { display: block; padding: 10px 14px; border-radius: 8px; color: #334155; text-decoration: none; margin-bottom: 4px; }
        .sidebar a:hover, .sidebar a.aktif { background: #f1f5f9; font-weight: 600; }
        .konten { margin-left: 240px; padding: 88px 32px 32px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-top: 20px; }
        .kartu { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 20px; display: flex; align-items: center; gap: 16px; }
        .ikon { width: 52px; height: 52px; border-radius: 50%; }
        .kartu small { color: #64748b; font-weight: 600; text-transform: uppercase; font-size: 12px; }
        .kartu strong { display: block; font-size: 32px; }

        .judul { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn { display: inline-block; background: #0d9488; color: #fff; border: 0; padding: 9px 16px; border-radius: 8px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn.merah { background: #ef4444; }
        .btn.abu { background: #64748b; }
        table { width: 100%; background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; border-collapse: collapse; overflow: hidden; }
        th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 14px; }
        th { background: #f1f5f9; }
        .aksi { display: flex; gap: 8px; }
        .alert { background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; }
        .form-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; max-width: 560px; }
        .form-box label { display: block; font-weight: 600; margin: 14px 0 6px; }
        .form-box input, .form-box textarea { width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font: inherit; }
        .error { color: #dc2626; font-size: 13px; margin-top: 4px; }
    </style>
</head>
<body>
    <header class="topbar">
        <h1>IT Helpdesk Admin</h1>
        <div class="user">
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar</button>
            </form>
        </div>
    </header>

    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'aktif' : '' }}">Dashboard</a>
        <a href="#">Tiket</a>
        <a href="{{ route('admin.kategori.index') }}" class="{{ request()->routeIs('admin.kategori.*') ? 'aktif' : '' }}">Kategori</a>
        <a href="#">Knowledge Base</a>
        <a href="{{ route('admin.teknisi.index') }}" class="{{ request()->routeIs('admin.teknisi.*') ? 'aktif' : '' }}">Teknisi</a>
        <a href="#">Aset</a>
        <a href="#">Pengguna</a>
    </aside>

    <main class="konten">
        @yield('content')
    </main>
</body>
</html>