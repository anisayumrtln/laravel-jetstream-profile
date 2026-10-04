<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight flex items-center gap-2">
            <span>📊</span> {{ __('Dashboard System Overview') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .dash-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        .dash-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 35%, #0f3460 65%, #1a4a7a 100%);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Ambient Glow Backgrounds */
        .dash-page::before {
            content: '';
            position: absolute;
            top: -150px; right: -150px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(0,212,255,0.12) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .dash-page::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -100px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* Hero Welcome Banner */
        .hero-banner {
            background: linear-gradient(135deg, rgba(255,255,255,0.06) 0%, rgba(255,255,255,0.02) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 24px;
            padding: 2.2rem 2.5rem;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            position: relative;
            z-index: 10;
        }

        .hero-title {
            color: #ffffff;
            font-size: 1.8rem;
            font-weight: 800;
            margin: 0 0 6px 0;
            letter-spacing: -0.4px;
        }

        .hero-subtitle {
            color: rgba(255,255,255,0.6);
            font-size: 0.95rem;
            margin: 0;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-dash-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 12px 22px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,212,255,0.35);
            text-decoration: none !important;
            transition: all 0.3s ease;
        }
        .btn-dash-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,212,255,0.55);
        }

        .btn-dash-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.18);
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none !important;
            transition: all 0.3s ease;
        }
        .btn-dash-secondary:hover {
            background: rgba(255,255,255,0.18);
            transform: translateY(-2px);
        }

        /* Metric KPI Grid */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
            position: relative;
            z-index: 10;
        }

        .metric-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 1.5rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 18px;
            transition: all 0.3s ease;
        }
        .metric-card:hover {
            transform: translateY(-4px);
            background: rgba(255,255,255,0.07);
            border-color: rgba(255,255,255,0.18);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .metric-icon-box {
            width: 54px; height: 54px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .icon-cyan { background: rgba(0,212,255,0.15); border: 1px solid rgba(0,212,255,0.3); box-shadow: 0 0 20px rgba(0,212,255,0.2); }
        .icon-emerald { background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3); box-shadow: 0 0 20px rgba(16,185,129,0.2); }
        .icon-purple { background: rgba(99,102,241,0.15); border: 1px solid rgba(99,102,241,0.3); box-shadow: 0 0 20px rgba(99,102,241,0.2); }
        .icon-amber { background: rgba(245,158,11,0.15); border: 1px solid rgba(245,158,11,0.3); box-shadow: 0 0 20px rgba(245,158,11,0.2); }

        .metric-label {
            color: rgba(255,255,255,0.55);
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 4px;
        }

        .metric-value {
            color: #ffffff;
            font-size: 1.7rem;
            font-weight: 800;
            margin: 0;
            line-height: 1;
        }

        /* Recent Activity Table Card */
        .dash-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            position: relative;
            z-index: 10;
        }

        .dash-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dash-card-title {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

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

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.05);
            transition: background 0.25s ease;
        }
        tbody tr:hover { background: rgba(255,255,255,0.05); }

        td { padding: 16px 20px; color: rgba(255,255,255,0.8); font-size: 0.875rem; white-space: nowrap; }

        .td-nama { color: #fff; font-weight: 600; }
        .badge-tahun { display:inline-block; background:rgba(99,102,241,0.2); border:1px solid rgba(99,102,241,0.4); color:#a5b4fc; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:600; }
        .badge-merek { display:inline-block; background:rgba(0,212,255,0.1); border:1px solid rgba(0,212,255,0.3); color:#67e8f9; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:500; }
        .badge-lokasi { display:inline-flex; align-items:center; gap:4px; background:rgba(16,185,129,0.1); border:1px solid rgba(16,185,129,0.3); color:#6ee7b7; border-radius:6px; padding:3px 10px; font-size:0.78rem; font-weight:600; }

        .btn-view-all {
            color: #67e8f9;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .btn-view-all:hover { color: #00d4ff; }
    </style>

    <div class="dash-page">
        <!-- Hero Welcome Banner -->
        <div class="hero-banner">
            <div>
                <h1 class="hero-title">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="hero-subtitle">Sistem Manajemen & Informasi Inventaris Alat Medis Rumah Sakit</p>
            </div>
            <div class="hero-actions">
                <a href="{{ route('alat.index') }}" class="btn-dash-primary">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                    Lihat Seluruh Alat
                </a>
            </div>
        </div>

        <!-- Metric KPI Cards Grid -->
        <div class="metrics-grid">
            <div class="metric-card">
                <div class="metric-icon-box icon-cyan">🩺</div>
                <div>
                    <div class="metric-label">Total Alat Medis</div>
                    <div class="metric-value">{{ $totalAlat }}</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-emerald">📍</div>
                <div>
                    <div class="metric-label">Lokasi Ruangan</div>
                    <div class="metric-value">{{ $totalLokasi }}</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-purple">🏷️</div>
                <div>
                    <div class="metric-label">Pabrikan / Merek</div>
                    <div class="metric-value">{{ $totalMerek }}</div>
                </div>
            </div>

            <div class="metric-card">
                <div class="metric-icon-box icon-amber">⚡</div>
                <div>
                    <div class="metric-label">Status Sistem</div>
                    <div class="metric-value" style="font-size: 1.25rem; color: #fde68a;">Aktif & Normal</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
