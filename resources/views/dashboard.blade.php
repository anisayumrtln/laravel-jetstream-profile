<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-950 leading-tight flex items-center gap-2">
                <span>📊</span> {{ __('Dashboard Logistik & Inventaris Medis') }}
            </h2>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Database Real-time Terhubung
                </span>
            </div>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap');

        .dash-page * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        .mono-code {
            font-family: 'JetBrains Mono', monospace !important;
        }

        .dash-page {
            min-height: calc(100vh - 65px);
            background: linear-gradient(180deg, #f0fdf9 0%, #f8fafc 35%, #f8fafc 100%);
            padding: 2rem 1.5rem 4rem;
            position: relative;
        }

        /* Hero Welcome Banner */
        .hero-banner {
            background: #ffffff;
            border: 1px solid #d1fae5;
            border-radius: 20px;
            padding: 2.2rem 2.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
            position: relative;
            overflow: hidden;
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-title {
            color: #064e3b;
            font-size: 1.65rem;
            font-weight: 800;
            margin: 0 0 6px 0;
            letter-spacing: -0.3px;
        }

        .hero-subtitle {
            color: #64748b;
            font-size: 0.95rem;
            margin: 0;
            max-width: 650px;
            line-height: 1.5;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }

        .btn-dash-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 12px 22px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
            text-decoration: none !important;
            transition: all 0.25s ease;
        }

        .btn-dash-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.45);
        }

        .btn-dash-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #334155 !important;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .btn-dash-secondary:hover {
            background: #f8fafc;
            border-color: #94a3b8;
            color: #0f172a !important;
        }

        /* Metric KPI Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .metric-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.4rem 1.6rem;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            transition: all 0.25s ease;
        }

        .metric-card:hover {
            transform: translateY(-3px);
            border-color: #a7f3d0;
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.12);
        }

        .metric-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .icon-emerald { background: #ecfdf5; border: 1px solid #a7f3d0; }
        .icon-cyan    { background: #ecfeff; border: 1px solid #a5f3fc; }
        .icon-amber   { background: #fffbeb; border: 1px solid #fde68a; }
        .icon-purple  { background: #f5f3ff; border: 1px solid #ddd6fe; }

        .metric-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 4px;
        }

        .metric-value {
            color: #0f172a;
            font-size: 1.65rem;
            font-weight: 800;
            margin: 0;
            line-height: 1;
        }

        .metric-sub {
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 4px;
        }

        /* Recent Activity Table Card */
        .dash-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.04), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
        }

        .dash-card-header {
            padding: 1.4rem 1.8rem;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .dash-card-title {
            color: #0f172a;
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            padding: 14px 20px;
            text-align: left;
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        td {
            padding: 14px 20px;
            color: #334155;
            font-size: 0.88rem;
            white-space: nowrap;
        }

        .td-code {
            font-family: 'JetBrains Mono', monospace;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 6px;
            display: inline-block;
        }

        .td-nama {
            color: #0f172a;
            font-weight: 700;
        }

        .badge-kategori {
            display: inline-block;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            border-radius: 6px;
            padding: 3px 10px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .badge-status-tersedia {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .badge-status-lain {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #b45309;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .btn-view-all {
            color: #059669;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none !important;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-view-all:hover {
            color: #047857;
            gap: 8px;
        }

        .btn-action-detail {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            color: #334155;
            text-decoration: none !important;
            font-weight: 600;
            font-size: 0.78rem;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.15s ease;
        }

        .btn-action-detail:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
    </style>

    <div class="dash-page">
        <!-- Hero Welcome Banner -->
        <div class="hero-banner">
            <div>
                <h1 class="hero-title">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="hero-subtitle">
                    Sistem Manajemen & Informasi Inventaris Alat Medis Rumah Sakit Anisa Medika. Data inventaris tersinkronisasi langsung dengan katalog kesehatan.
                </p>
            </div>
            <div class="hero-actions">
                <a href="{{ route('alat.create') }}" class="btn-dash-secondary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Daftar Alat Baru
                </a>
                <a href="{{ route('transaksi.index') }}" class="btn-dash-primary" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    Pesanan Masuk (Midtrans)
                </a>
                <a href="{{ route('alat.index') }}" class="btn-dash-primary">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    Kelola Seluruh Inventaris
                </a>
            </div>
        </div>

        <!-- Metric KPI Cards Grid -->
        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-icon-box icon-emerald">🩺</div>
                <div>
                    <div class="metric-label">Model Alkes Medis</div>
                    <div class="metric-value">{{ $totalAlat }}</div>
                    <div class="metric-sub">Tipe perangkat aktif</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-cyan">📦</div>
                <div>
                    <div class="metric-label">Total Stok Fisik</div>
                    <div class="metric-value text-emerald-600">{{ $totalUnit ?? $totalAlat }}</div>
                    <div class="metric-sub">Unit fisik di rumah sakit</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-amber">📍</div>
                <div>
                    <div class="metric-label">Lokasi Ruangan & Lab</div>
                    <div class="metric-value">{{ $totalLokasi }}</div>
                    <div class="metric-sub">Titik penempatan alkes</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-purple">🏷️</div>
                <div>
                    <div class="metric-label">Pabrikan & Merek</div>
                    <div class="metric-value">{{ $totalMerek }}</div>
                    <div class="metric-sub">Mitra produsen terdaftar</div>
                </div>
            </div>
        </div>

        <!-- Recent Registered Medical Devices Card -->
        <div class="dash-card">
            <div class="dash-card-header">
                <h3 class="dash-card-title">
                    <span>📋</span>
                    Daftar Peralatan Medis Terakhir Didaftarkan
                </h3>
                <a href="{{ route('alat.index') }}" class="btn-view-all">
                    Buka Tabel Inventaris Lengkap
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Alkes</th>
                            <th>Nama Peralatan</th>
                            <th>Kategori</th>
                            <th>Stok Fisik</th>
                            <th>Status Operasional</th>
                            <th>Ruangan / Lab</th>
                            <th style="text-align: right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestAlats as $item)
                            <tr>
                                <td>
                                    <span class="td-code">{{ $item->kode_alat ?? 'ALK-000' }}</span>
                                </td>
                                <td>
                                    <div class="td-nama">{{ $item->nama_alat }}</div>
                                    <div class="text-xs text-slate-400 font-normal">{{ $item->merek }} &bull; {{ $item->tahun }}</div>
                                </td>
                                <td>
                                    <span class="badge-kategori">{{ $item->kategori ?? 'Umum' }}</span>
                                </td>
                                <td>
                                    <span class="font-bold text-slate-800">{{ $item->stok ?? 0 }}</span>
                                    <span class="text-xs text-slate-500">unit</span>
                                </td>
                                <td>
                                    @if(($item->status ?? 'Tersedia') === 'Tersedia')
                                        <span class="badge-status-tersedia">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="badge-status-lain">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            {{ $item->status }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-slate-600 font-medium">{{ $item->lokasi_lab ?? $item->lokasi }}</span>
                                </td>
                                <td style="text-align: right;">
                                    <a href="{{ route('alat.show', $item->id) }}" class="btn-action-detail">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 2.5rem; color: #94a3b8;">
                                    Belum ada data alat medis yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
