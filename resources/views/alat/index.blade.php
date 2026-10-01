<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Inventaris Alat Medis') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .alat-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        .alat-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 35%, #0f3460 65%, #1a4a7a 100%);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .alat-page::before {
            content: '';
            position: absolute;
            top: -150px; right: -150px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(0,212,255,0.12) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 8s ease-in-out infinite;
            pointer-events: none;
        }

        .alat-page::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 10s ease-in-out infinite reverse;
            pointer-events: none;
        }

        @keyframes blobFloat {
            0%,100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes rowFadeIn {
            from { opacity: 0; transform: translateX(-8px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
            z-index: 10;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title-block { display: flex; align-items: center; gap: 1rem; }

        .page-icon {
            width: 52px; height: 52px;
            background: linear-gradient(135deg, #00d4ff, #0099cc);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 20px rgba(0,212,255,0.3);
            flex-shrink: 0;
        }

        .page-title { color: #fff; font-size: 1.6rem; font-weight: 800; margin: 0; letter-spacing: -0.3px; }
        .page-subtitle { color: rgba(255,255,255,0.45); font-size: 0.8rem; margin: 2px 0 0 0; }

        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #00d4ff, #0099cc);
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 12px 24px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,212,255,0.35);
            transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
            position: relative;
            overflow: hidden;
        }

        .btn-tambah::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-tambah:hover::before { left: 100%; }
        .btn-tambah:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 12px 30px rgba(0,212,255,0.5);
            color: #fff;
            text-decoration: none;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16,185,129,0.15), rgba(5,150,105,0.1));
            border: 1px solid rgba(16,185,129,0.4);
            border-radius: 12px;
            padding: 14px 20px;
            color: #6ee7b7;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(10px);
            position: relative; z-index: 10;
            animation: slideDown 0.4s ease;
        }

        .table-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            position: relative; z-index: 10;
            animation: fadeInUp 0.6s cubic-bezier(0.16,1,0.3,1);
        }

        .stats-bar {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .stat-item { display: flex; align-items: center; gap: 6px; color: rgba(255,255,255,0.45); font-size: 0.8rem; }
        .stat-item strong { color: rgba(255,255,255,0.8); font-weight: 700; }
        .stat-dot { width: 7px; height: 7px; border-radius: 50%; background: #00d4ff; flex-shrink: 0; }

        .table-wrapper { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; }

        thead tr {
            background: linear-gradient(90deg, rgba(0,212,255,0.08), rgba(99,102,241,0.08));
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-size: 0.7rem;
            font-weight: 700;
            color: rgba(0,212,255,0.8);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            white-space: nowrap;
        }

        th.text-center { text-align: center; }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background 0.25s ease;
            animation: rowFadeIn 0.5s ease both;
        }

        tbody tr:nth-child(1){animation-delay:0.1s}
        tbody tr:nth-child(2){animation-delay:0.15s}
        tbody tr:nth-child(3){animation-delay:0.2s}
        tbody tr:nth-child(4){animation-delay:0.25s}
        tbody tr:nth-child(5){animation-delay:0.3s}
        tbody tr:hover { background: rgba(255,255,255,0.05); }
        tbody tr:last-child { border-bottom: none; }

        td { padding: 16px 20px; color: rgba(255,255,255,0.8); font-size: 0.875rem; white-space: nowrap; }

        .td-no { color: rgba(255,255,255,0.3); font-weight: 600; font-size: 0.8rem; }
        .td-nama { color: #fff; font-weight: 600; font-size: 0.9rem; }

        .badge-tahun { display:inline-block; background:rgba(99,102,241,0.2); border:1px solid rgba(99,102,241,0.4); color:#a5b4fc; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:600; }
        .badge-merek { display:inline-block; background:rgba(0,212,255,0.1); border:1px solid rgba(0,212,255,0.3); color:#67e8f9; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:500; }
        .badge-lokasi { display:inline-flex; align-items:center; gap:4px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); color:#6ee7b7; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:600; }

        .actions-cell { text-align: center; }
        .actions-group { display:flex; align-items:center; justify-content:center; gap:6px; }

        .btn-action {
            display:inline-flex; align-items:center; gap:5px;
            padding:7px 14px; border-radius:8px;
            font-size:0.78rem; font-weight:600;
            text-decoration:none; border:none; cursor:pointer;
            transition:all 0.2s ease; letter-spacing:0.2px;
        }

        .btn-detail { background:rgba(99,102,241,0.15); border:1px solid rgba(99,102,241,0.4); color:#a5b4fc; }
        .btn-detail:hover { background:rgba(99,102,241,0.3); transform:translateY(-1px); box-shadow:0 4px 12px rgba(99,102,241,0.3); text-decoration:none; color:#c7d2fe; }

        .btn-edit { background:rgba(245,158,11,0.12); border:1px solid rgba(245,158,11,0.35); color:#fcd34d; }
        .btn-edit:hover { background:rgba(245,158,11,0.25); transform:translateY(-1px); box-shadow:0 4px 12px rgba(245,158,11,0.25); text-decoration:none; color:#fde68a; }

        .btn-hapus { background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.35); color:#fca5a5; }
        .btn-hapus:hover { background:rgba(239,68,68,0.25); transform:translateY(-1px); box-shadow:0 4px 12px rgba(239,68,68,0.25); color:#fecaca; }

        .empty-state { text-align:center; padding:60px 20px; }
        .empty-state-icon { font-size:3.5rem; margin-bottom:1rem; opacity:0.35; display:block; }
        .empty-state-text { color:rgba(255,255,255,0.4); font-size:0.95rem; }
    </style>

    <div class="alat-page">
        <div class="page-header">
            <div class="page-title-block">
                <div class="page-icon">🩺</div>
                <div>
                    <h1 class="page-title">Inventaris Alat Medis</h1>
                    <p class="page-subtitle">Kelola seluruh peralatan medis rumah sakit</p>
                </div>
            </div>
            <a href="{{ route('alat.create') }}" class="btn-tambah">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                Tambah Alat
            </a>
        </div>

        @if (session('success'))
            <div class="alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <div class="stats-bar">
                <div class="stat-item">
                    <span class="stat-dot"></span>
                    Total: <strong>{{ count($alats) }} Alat</strong>
                </div>
                <div class="stat-item">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Terakhir diperbarui: <strong>Hari ini</strong>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Tahun</th>
                            <th>Merek</th>
                            <th>Lokasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alats as $index => $item)
                            <tr>
                                <td class="td-no">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="td-nama">{{ $item->nama_alat }}</td>
                                <td><span class="badge-tahun">{{ $item->tahun }}</span></td>
                                <td><span class="badge-merek">{{ $item->merek }}</span></td>
                                <td><span class="badge-lokasi">📍 {{ $item->lokasi }}</span></td>
                                <td class="actions-cell">
                                    <div class="actions-group">
                                        <a href="{{ route('alat.show', $item->id) }}" class="btn-action btn-detail">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                            Detail
                                        </a>
                                        <a href="{{ route('alat.edit', $item->id) }}" class="btn-action btn-edit">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('alat.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama_alat }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-hapus">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <span class="empty-state-icon">🗂️</span>
                                        <p class="empty-state-text">Belum ada data alat medis.<br>Klik <strong>Tambah Alat</strong> untuk memulai.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
