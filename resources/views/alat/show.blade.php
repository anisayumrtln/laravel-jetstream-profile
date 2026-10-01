<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Alat Medis') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .detail-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        .detail-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 35%, #0f3460 65%, #1a4a7a 100%);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .detail-page::before {
            content: '';
            position: absolute;
            top: -180px; right: -120px;
            width: 480px; height: 480px;
            background: radial-gradient(circle, rgba(0,212,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 9s ease-in-out infinite;
            pointer-events: none;
        }

        .detail-page::after {
            content: '';
            position: absolute;
            bottom: -100px; left: -80px;
            width: 350px; height: 350px;
            background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 11s ease-in-out infinite reverse;
            pointer-events: none;
        }

        @keyframes blobFloat {
            0%,100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-25px) scale(1.04); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes cardSlideIn {
            from { opacity: 0; transform: translateX(-12px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            align-self: flex-start;
            transition: color 0.2s ease;
            position: relative;
            z-index: 10;
        }

        .back-link:hover { color: rgba(255,255,255,0.9); text-decoration: none; }

        .detail-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 24px;
            width: 100%;
            max-width: 580px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.45);
            position: relative;
            z-index: 10;
            overflow: hidden;
            animation: fadeInUp 0.6s cubic-bezier(0.16,1,0.3,1);
        }

        .detail-card-header {
            background: linear-gradient(135deg, rgba(0,212,255,0.12), rgba(0,119,182,0.08));
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 1.8rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .detail-header-icon {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, #00d4ff, #0077b6);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px;
            box-shadow: 0 10px 25px rgba(0,212,255,0.35);
            flex-shrink: 0;
        }

        .detail-header-title { color: #fff; font-size: 1.5rem; font-weight: 800; margin: 0; line-height: 1.2; }
        .detail-header-sub {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(0,212,255,0.12);
            border: 1px solid rgba(0,212,255,0.25);
            color: #67e8f9;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            margin-top: 6px;
        }

        .detail-body { padding: 1.5rem 2rem 2rem; display: flex; flex-direction: column; gap: 0; }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.1rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            animation: cardSlideIn 0.5s ease both;
        }

        .info-row:last-of-type { border-bottom: none; }

        .info-row:nth-child(1) { animation-delay: 0.1s; }
        .info-row:nth-child(2) { animation-delay: 0.18s; }
        .info-row:nth-child(3) { animation-delay: 0.26s; }
        .info-row:nth-child(4) { animation-delay: 0.34s; }

        .info-icon-wrap {
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .info-content { flex: 1; }
        .info-label { color: rgba(255,255,255,0.4); font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.7px; margin-bottom: 3px; }
        .info-value { color: #fff; font-size: 1.05rem; font-weight: 700; }

        /* Badge variants for value */
        .info-value.badge-teal {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(16,185,129,0.12);
            border: 1px solid rgba(16,185,129,0.3);
            color: #6ee7b7;
            font-size: 0.9rem;
            padding: 4px 12px;
            border-radius: 8px;
        }

        .detail-footer {
            padding: 1.5rem 2rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 11px 22px;
            border-radius: 11px;
            transition: all 0.25s ease;
        }

        .btn-kembali:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            text-decoration: none;
            transform: translateY(-1px);
        }

        .btn-edit-detail {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, rgba(245,158,11,0.2), rgba(217,119,6,0.15));
            border: 1px solid rgba(245,158,11,0.4);
            color: #fcd34d;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 11px 22px;
            border-radius: 11px;
            transition: all 0.25s ease;
        }

        .btn-edit-detail:hover {
            background: linear-gradient(135deg, rgba(245,158,11,0.3), rgba(217,119,6,0.25));
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(245,158,11,0.2);
            text-decoration: none;
            color: #fde68a;
        }
    </style>

    <div class="detail-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Daftar
        </a>

        <div class="detail-card">
            <div class="detail-card-header">
                <div class="detail-header-icon">🩺</div>
                <div>
                    <h1 class="detail-header-title">{{ $alat->nama_alat }}</h1>
                    <span class="detail-header-sub">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Detail Alat Medis
                    </span>
                </div>
            </div>

            <div class="detail-body">
                <div class="info-row">
                    <div class="info-icon-wrap">🏥</div>
                    <div class="info-content">
                        <p class="info-label">Nama Alat</p>
                        <p class="info-value">{{ $alat->nama_alat }}</p>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon-wrap">📅</div>
                    <div class="info-content">
                        <p class="info-label">Tahun Pembuatan / Pengadaan</p>
                        <p class="info-value">{{ $alat->tahun }}</p>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon-wrap">🏷️</div>
                    <div class="info-content">
                        <p class="info-label">Merek / Pabrikan</p>
                        <p class="info-value">{{ $alat->merek }}</p>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-icon-wrap">📍</div>
                    <div class="info-content">
                        <p class="info-label">Lokasi Ruangan</p>
                        <p class="info-value badge-teal">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            {{ $alat->lokasi }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="detail-footer">
                <a href="{{ route('alat.index') }}" class="btn-kembali">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    Kembali
                </a>
                <a href="{{ route('alat.edit', $alat->id) }}" class="btn-edit-detail">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit Data
                </a>
            </div>
        </div>
    </div>
</x-app-layout>