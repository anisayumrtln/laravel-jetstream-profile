<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-950 leading-tight flex items-center gap-2">
                <span>🩺</span> {{ __('Detail Spesifikasi Alat Medis') }}
            </h2>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                🔒 Khusus Admin & Petugas Logistik
            </span>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap');

        .detail-page * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        .mono-code {
            font-family: 'JetBrains Mono', monospace !important;
        }

        .detail-page {
            min-height: calc(100vh - 65px);
            background: linear-gradient(180deg, #f0fdf9 0%, #f8fafc 40%, #f8fafc 100%);
            padding: 2rem 1.5rem 4rem;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            text-decoration: none !important;
            font-size: 0.88rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            align-self: flex-start;
            max-width: 760px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: #059669;
            transform: translateX(-3px);
        }

        .detail-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            width: 100%;
            max-width: 760px;
            box-shadow: 0 10px 25px -5px rgba(16, 185, 129, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            animation: cardFadeUp 0.4s ease-out;
        }

        @keyframes cardFadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .detail-card-header {
            background: linear-gradient(135deg, #ecfdf5 0%, #f0fdf4 100%);
            border-bottom: 1px solid #d1fae5;
            padding: 2rem 2.2rem;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .detail-header-left {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .detail-header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
            flex-shrink: 0;
        }

        .detail-header-title {
            color: #064e3b;
            font-size: 1.55rem;
            font-weight: 800;
            margin: 0 0 6px 0;
            line-height: 1.2;
        }

        .detail-badges {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .badge-code {
            font-family: 'JetBrains Mono', monospace;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }

        .badge-kat {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            color: #475569;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 6px;
        }

        .badge-status-tersedia {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-status-pemeliharaan {
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #b45309;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-status-rusak {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .detail-body {
            padding: 2rem 2.2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 640px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        .info-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.2s ease;
        }

        .info-card:hover {
            border-color: #cbd5e1;
            background: #f1f5f9;
        }

        .info-icon-box {
            width: 40px;
            height: 40px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .info-content {
            flex: 1;
            min-width: 0;
        }

        .info-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-value {
            color: #0f172a;
            font-size: 1rem;
            font-weight: 700;
            margin: 0;
            word-break: break-word;
        }

        .stok-highlight {
            color: #059669;
            font-size: 1.2rem;
            font-weight: 800;
        }

        .desc-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.25rem;
            margin-top: 0.5rem;
        }

        .desc-label {
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .desc-text {
            color: #334155;
            font-size: 0.92rem;
            line-height: 1.6;
            margin: 0;
        }

        .detail-footer {
            padding: 1.5rem 2.2rem;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-kembali {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #475569;
            text-decoration: none !important;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .btn-kembali:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #94a3b8;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: 1px solid #d97706;
            color: #ffffff !important;
            text-decoration: none !important;
            font-weight: 700;
            font-size: 0.88rem;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.25);
            transition: all 0.2s ease;
        }

        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.35);
        }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-weight: 600;
            font-size: 0.88rem;
            padding: 10px 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #b91c1c;
            border-color: #fca5a5;
        }
    </style>

    <div class="detail-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Daftar Inventaris
        </a>

        <div class="detail-card">
            <!-- Header Section -->
            <div class="detail-card-header">
                <div class="detail-header-left">
                    <div class="detail-header-icon">🩺</div>
                    <div>
                        <h1 class="detail-header-title">{{ $alat->nama_alat }}</h1>
                        <div class="detail-badges">
                            <span class="badge-code">{{ $alat->kode_alat ?? 'ALK-000' }}</span>
                            <span class="badge-kat">{{ $alat->kategori ?? 'Alat Medis' }}</span>
                        </div>
                    </div>
                </div>

                <div>
                    @if(($alat->status ?? 'Tersedia') === 'Tersedia')
                        <span class="badge-status-tersedia">
                            <span class="status-dot" style="background:#10b981;"></span>
                            Tersedia
                        </span>
                    @elseif(($alat->status ?? '') === 'Pemeliharaan' || ($alat->status ?? '') === 'Kalibrasi')
                        <span class="badge-status-pemeliharaan">
                            <span class="status-dot" style="background:#f59e0b;"></span>
                            {{ $alat->status }}
                        </span>
                    @else
                        <span class="badge-status-rusak">
                            <span class="status-dot" style="background:#ef4444;"></span>
                            {{ $alat->status ?? 'Perbaikan' }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Body Information Grid -->
            <div class="detail-body">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon-box">🔢</div>
                        <div class="info-content">
                            <div class="info-label">Kode Alkes Inventaris</div>
                            <div class="info-value mono-code text-emerald-800">{{ $alat->kode_alat ?? 'ALK-000' }}</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon-box">📦</div>
                        <div class="info-content">
                            <div class="info-label">Stok Fisik Tersedia</div>
                            <div class="info-value"><span class="stok-highlight">{{ $alat->stok ?? 0 }}</span> <span class="text-xs text-slate-500 font-normal">Unit Fisik</span></div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon-box">🏷️</div>
                        <div class="info-content">
                            <div class="info-label">Kategori Peralatan</div>
                            <div class="info-value">{{ $alat->kategori ?? 'Umum' }}</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon-box">🏢</div>
                        <div class="info-content">
                            <div class="info-label">Merek / Pabrikan</div>
                            <div class="info-value">{{ $alat->merek ?? '-' }}</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon-box">📍</div>
                        <div class="info-content">
                            <div class="info-label">Lokasi Penempatan / Lab</div>
                            <div class="info-value">{{ $alat->lokasi_lab ?? $alat->lokasi ?? 'Lab Sentral Medis' }}</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon-box">📅</div>
                        <div class="info-content">
                            <div class="info-label">Tahun Pembuatan / Pengadaan</div>
                            <div class="info-value">{{ $alat->tahun ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Description / Catatan Teknis -->
                <div class="desc-box">
                    <div class="desc-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        Deskripsi & Spesifikasi Teknis
                    </div>
                    <p class="desc-text">
                        {{ $alat->deskripsi ?? 'Peralatan medis operasional Rumah Sakit / Klinik Anisa Medika. Terkalibrasi dan siap digunakan oleh tenaga medis berwenang.' }}
                    </p>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="detail-footer">
                <div class="footer-left">
                    <a href="{{ route('alat.index') }}" class="btn-kembali">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                        Kembali
                    </a>
                </div>

                <div class="footer-right">
                    <form action="{{ route('alat.destroy', $alat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete" onclick="confirmDelete(event, '{{ addslashes($alat->nama_alat) }} [{{ $alat->kode_alat }}]')">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                            Hapus Data
                        </button>
                    </form>

                    <a href="{{ route('alat.edit', $alat->id) }}" class="btn-edit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit Spesifikasi
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>