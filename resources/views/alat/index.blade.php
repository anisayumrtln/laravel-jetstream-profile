<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <span class="text-2xl">🩺</span>
                <div>
                    <h2 class="font-bold text-xl text-emerald-950 leading-tight">
                        {{ __('Sistem Inventaris Alat Kesehatan') }}
                    </h2>
                    <p class="text-xs text-emerald-700 font-medium">Backend Dashboard Khusus Admin & Petugas Logistik Medis</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Akses Aman Terproteksi
                </span>
                <span class="text-xs text-slate-400 hidden sm:inline">|</span>
                <span class="text-xs text-slate-600 hidden sm:inline">
                    Petugas: <strong class="text-slate-800">{{ Auth::user()->name ?? 'Petugas Logistik' }}</strong>
                </span>
            </div>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap');

        .inventaris-page * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        .mono-code {
            font-family: 'JetBrains Mono', monospace !important;
        }

        .inventaris-page {
            min-height: calc(100vh - 65px);
            background: linear-gradient(180deg, #f0fdf9 0%, #f8fafc 40%, #f8fafc 100%);
            padding: 2rem 1.5rem 4rem;
            position: relative;
        }

        /* Header action card */
        .page-header-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 1.6rem 2rem;
            margin-bottom: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
            box-shadow: 0 4px 20px -2px rgba(16, 185, 129, 0.06), 0 2px 6px -1px rgba(0, 0, 0, 0.04);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .header-icon-box {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 6px 18px rgba(16, 185, 129, 0.3);
            flex-shrink: 0;
        }

        .header-title-text h1 {
            color: #0f172a;
            font-size: 1.55rem;
            font-weight: 800;
            margin: 0 0 3px 0;
            letter-spacing: -0.4px;
        }

        .header-title-text p {
            color: #64748b;
            font-size: 0.88rem;
            margin: 0;
        }

        .btn-daftar-baru {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 24px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
            text-decoration: none !important;
            transition: all 0.25s ease;
        }

        .btn-daftar-baru:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(16, 185, 129, 0.45);
        }

        /* ══════════════════════════════════════════════
           STATISTIK KPI METRIC CARDS (CLEAN LIGHT THEME)
        ══════════════════════════════════════════════ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.8rem;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.35rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.25s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .stat-card:hover {
            transform: translateY(-3px);
            border-color: #a7f3d0;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.1);
        }

        .stat-content {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            color: #64748b;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 4px;
        }

        .stat-number {
            color: #0f172a;
            font-size: 1.85rem;
            font-weight: 800;
            line-height: 1;
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .stat-unit {
            font-size: 0.82rem;
            color: #64748b;
            font-weight: 600;
        }

        .stat-badge {
            font-size: 0.74rem;
            font-weight: 600;
            margin-top: 6px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .icon-mint-glow {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #059669;
        }

        .icon-teal-glow {
            background: #f0fdfa;
            border: 1px solid #99f6e4;
            color: #0d9488;
        }

        .icon-blue-glow {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            color: #0284c7;
        }

        .icon-amber-glow {
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #d97706;
        }

        /* ══════════════════════════════════════════════
           TOOLBAR FILTER KATEGORI & PENCARIAN
        ══════════════════════════════════════════════ */
        .filter-toolbar-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        .toolbar-top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-container {
            position: relative;
            flex: 1;
            min-width: 260px;
            max-width: 480px;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 10px 16px 10px 42px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: #0f172a;
            font-size: 0.88rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .search-input::placeholder {
            color: #94a3b8;
        }

        .search-input:focus {
            background: #ffffff;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        .filter-select-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-select {
            padding: 10px 14px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: #334155;
            font-size: 0.88rem;
            font-weight: 600;
            outline: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-select:focus {
            border-color: #10b981;
            background: #ffffff;
        }

        .category-pills {
            display: flex;
            align-items: center;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 4px;
            scrollbar-width: thin;
        }

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            text-decoration: none !important;
            white-space: nowrap;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .category-pill:hover {
            color: #059669;
            background: #ecfdf5;
            border-color: #a7f3d0;
        }

        .category-pill.active {
            color: #ffffff;
            background: #059669;
            border-color: #059669;
            box-shadow: 0 2px 8px rgba(5, 150, 105, 0.3);
        }

        /* ══════════════════════════════════════════════
           TABEL INVENTARIS LENGKAP (CLEAN MEDICAL MINT)
        ══════════════════════════════════════════════ */
        .table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        }

        .table-header-meta {
            padding: 15px 22px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            background: #ffffff;
        }

        .table-meta-left {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #1e293b;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .counter-badge {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 3px 10px;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table.inventaris-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead tr {
            background: #f0fdf4;
            border-bottom: 1px solid #d1fae5;
        }

        th {
            padding: 14px 18px;
            color: #065f46;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            white-space: nowrap;
        }

        tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.15s ease;
            background: #ffffff;
        }

        tbody tr:hover {
            background: #f0fdf9;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        td {
            padding: 15px 18px;
            color: #334155;
            font-size: 0.875rem;
            vertical-align: middle;
            white-space: nowrap;
        }

        .td-no {
            color: #94a3b8;
            font-weight: 600;
            font-size: 0.8rem;
            width: 50px;
        }

        .badge-kode {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            padding: 4px 9px;
            border-radius: 7px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .item-name-block {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .item-main-name {
            color: #0f172a;
            font-weight: 700;
            font-size: 0.92rem;
        }

        .item-sub-desc {
            color: #64748b;
            font-size: 0.75rem;
            max-width: 260px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .badge-kategori {
            display: inline-block;
            background: #f0fdfa;
            border: 1px solid #ccfbf1;
            color: #0f766e;
            padding: 3px 9px;
            border-radius: 6px;
            font-size: 0.76rem;
            font-weight: 600;
        }

        .badge-stok {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 700;
        }

        .stok-ready {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .stok-warning {
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #b45309;
        }

        .stok-empty {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 9px;
            border-radius: 6px;
            font-size: 0.76rem;
            font-weight: 600;
        }

        .status-tersedia {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }

        .status-digunakan {
            background: #f0f9ff;
            color: #0284c7;
            border: 1px solid #bae6fd;
        }

        .status-maintenance {
            background: #fffbeb;
            color: #d97706;
            border: 1px solid #fde68a;
        }

        .status-rusak {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .badge-lokasi {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: #475569;
            font-size: 0.8rem;
            background: #f8fafc;
            padding: 3px 8px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        /* ══════════════════════════════════════════════
           TOMBOL AKSI INTERAKTIF (CLEAN LIGHT THEME)
        ══════════════════════════════════════════════ */
        .actions-cell {
            text-align: right;
            padding-right: 18px;
        }

        .actions-group {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-act {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 11px;
            border-radius: 7px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none !important;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-act-detail {
            background: #f0fdfa;
            border: 1px solid #ccfbf1;
            color: #0f766e;
        }

        .btn-act-detail:hover {
            background: #ccfbf1;
            color: #115e59;
            transform: translateY(-1px);
        }

        .btn-act-edit {
            background: #fffbeb;
            border: 1px solid #fde68a;
            color: #b45309;
        }

        .btn-act-edit:hover {
            background: #fef3c7;
            color: #92400e;
            transform: translateY(-1px);
        }

        .btn-act-hapus {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .btn-act-hapus:hover {
            background: #fee2e2;
            color: #991b1b;
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 3.5rem;
            margin-bottom: 12px;
            opacity: 0.6;
        }

        .empty-title {
            color: #0f172a;
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0 0 6px 0;
        }

        .empty-desc {
            color: #64748b;
            font-size: 0.88rem;
            margin: 0 0 1.25rem 0;
        }
    </style>

    <div class="inventaris-page">
        {{-- Header Card --}}
        <div class="page-header-card">
            <div class="header-brand">
                <div class="header-icon-box">🩺</div>
                <div class="header-title-text">
                    <h1>Sistem Inventaris Alkes</h1>
                    <p>Pusat kontrol & pengelolaan data stok alat kesehatan medis Anisa Medika</p>
                </div>
            </div>
            <div>
                <a href="{{ route('alat.create') }}" class="btn-daftar-baru" id="btn-daftarkan-alat">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="16"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                    Daftarkan Alat Baru
                </a>
            </div>
        </div>

        {{-- Ringkasan Statistik Total Model & Unit (KPI Cards) --}}
        <div class="stats-grid">
            {{-- Total Model Alkes --}}
            <div class="stat-card">
                <div class="stat-content">
                    <span class="stat-label">Total Model Alkes</span>
                    <div class="stat-number">
                        <span id="stat-total-model">{{ $totalModel }}</span>
                        <span class="stat-unit">Model</span>
                    </div>
                    <span class="stat-badge text-emerald-700">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        Tercatat di Database
                    </span>
                </div>
                <div class="stat-icon icon-mint-glow">🏥</div>
            </div>

            {{-- Total Unit Stok Fisik --}}
            <div class="stat-card">
                <div class="stat-content">
                    <span class="stat-label">Total Unit Fisik</span>
                    <div class="stat-number">
                        <span id="stat-total-unit">{{ $totalUnitStok }}</span>
                        <span class="stat-unit">Unit</span>
                    </div>
                    <span class="stat-badge text-teal-700">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                        Akumulasi Fisik Stok
                    </span>
                </div>
                <div class="stat-icon icon-teal-glow">📦</div>
            </div>

            {{-- Unit Siap Pakai / Tersedia --}}
            <div class="stat-card">
                <div class="stat-content">
                    <span class="stat-label">Unit Siap Pakai</span>
                    <div class="stat-number">
                        <span id="stat-total-tersedia">{{ $totalTersedia }}</span>
                        <span class="stat-unit">Unit</span>
                    </div>
                    <span class="stat-badge text-emerald-700">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Siap Distribusi & Operasional
                    </span>
                </div>
                <div class="stat-icon icon-mint-glow">⚡</div>
            </div>

            {{-- Unit Perlu Perawatan / Kalibrasi --}}
            <div class="stat-card">
                <div class="stat-content">
                    <span class="stat-label">Perawatan / Kalibrasi</span>
                    <div class="stat-number">
                        <span id="stat-total-perbaikan">{{ $totalPerbaikan }}</span>
                        <span class="stat-unit">Alat</span>
                    </div>
                    <span class="stat-badge text-amber-700">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Perlu Perhatian Rutin
                    </span>
                </div>
                <div class="stat-icon icon-amber-glow">🛠️</div>
            </div>
        </div>

        {{-- Toolbar Filter Kategori & Pencarian --}}
        <div class="filter-toolbar-card">
            <div class="toolbar-top-row">
                {{-- Live Search Input --}}
                <div class="search-container">
                    <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input 
                        type="text" 
                        id="table-search" 
                        class="search-input" 
                        placeholder="Cari kode alkes (ALK-xxx), nama alat, merek, atau ruangan..." 
                        value="{{ $search ?? '' }}"
                        autocomplete="off"
                    >
                </div>

                {{-- Dropdown Kategori Filter --}}
                <div class="filter-select-wrapper">
                    <label for="select-kategori-filter" class="text-xs font-semibold text-slate-600 flex items-center gap-1.5">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                        Filter Kategori:
                    </label>
                    <select id="select-kategori-filter" class="filter-select" onchange="filterByCategory(this.value)">
                        <option value="Semua" {{ empty($selectedKategori) || $selectedKategori === 'Semua' ? 'selected' : '' }}>Semua Kategori</option>
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat }}" {{ ($selectedKategori ?? '') === $kat ? 'selected' : '' }}>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Quick Filter Pills --}}
            <div class="category-pills">
                <a href="{{ route('alat.index') }}" class="category-pill {{ empty($selectedKategori) || $selectedKategori === 'Semua' ? 'active' : '' }}">
                    ✨ Semua
                </a>
                @foreach ($kategoris as $kat)
                    <a href="{{ route('alat.index', ['kategori' => $kat]) }}" class="category-pill {{ ($selectedKategori ?? '') === $kat ? 'active' : '' }}">
                        {{ $kat }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Tabel Inventaris Lengkap dengan Kode Alkes --}}
        <div class="table-card">
            <div class="table-header-meta">
                <div class="table-meta-left">
                    <span>Daftar Stok Alat Medis</span>
                    <span class="counter-badge" id="visible-count-badge">{{ count($alats) }} Model Ditampilkan</span>
                </div>
                <div class="text-xs text-slate-500 font-medium">
                    Sistem Inventaris Anisa Medika • Real-Time Database Sync
                </div>
            </div>

            <div class="table-responsive">
                <table class="inventaris-table" id="inventaris-table">
                    <thead>
                        <tr>
                            <th class="td-no">No</th>
                            <th>Kode Alkes</th>
                            <th>Nama Alat Kesehatan</th>
                            <th>Kategori</th>
                            <th>Stok Unit</th>
                            <th>Status</th>
                            <th>Merek</th>
                            <th>Lokasi / Lab</th>
                            <th>Tahun</th>
                            <th class="actions-cell">Aksi Pengelolaan</th>
                        </tr>
                    </thead>
                    <tbody id="inventaris-tbody">
                        @forelse ($alats as $index => $item)
                            <tr class="inventaris-row" 
                                data-kode="{{ strtolower($item->kode_alat ?? '') }}"
                                data-nama="{{ strtolower($item->nama_alat ?? '') }}"
                                data-kategori="{{ strtolower($item->kategori ?? '') }}"
                                data-merek="{{ strtolower($item->merek ?? '') }}"
                                data-lokasi="{{ strtolower($item->lokasi_lab ?? $item->lokasi ?? '') }}">
                                
                                <td class="td-no">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                
                                {{-- Kode Alkes --}}
                                <td>
                                    <span class="badge-kode mono-code">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        {{ $item->kode_alat ?? ('ALK-' . str_pad($item->id, 3, '0', STR_PAD_LEFT)) }}
                                    </span>
                                </td>

                                {{-- Nama Alat & Deskripsi --}}
                                <td>
                                    <div class="item-name-block">
                                        <span class="item-main-name">{{ $item->nama_alat }}</span>
                                        @if ($item->deskripsi)
                                            <span class="item-sub-desc" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</span>
                                        @else
                                            <span class="item-sub-desc">Spesifikasi medis terverifikasi</span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Kategori --}}
                                <td>
                                    <span class="badge-kategori">{{ $item->kategori ?? 'Alat Diagnostik' }}</span>
                                </td>

                                {{-- Stok Unit --}}
                                <td>
                                    @php
                                        $stokVal = (int) ($item->stok ?? 0);
                                        $stokClass = $stokVal > 3 ? 'stok-ready' : ($stokVal > 0 ? 'stok-warning' : 'stok-empty');
                                    @endphp
                                    <span class="badge-stok {{ $stokClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $stokVal > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                        {{ $stokVal }} Unit
                                    </span>
                                </td>

                                {{-- Status Operasional --}}
                                <td>
                                    @php
                                        $status = $item->status ?? 'Tersedia';
                                        $statusClass = 'status-tersedia';
                                        if (in_array(strtolower($status), ['digunakan', 'terpakai'])) $statusClass = 'status-digunakan';
                                        elseif (in_array(strtolower($status), ['pemeliharaan', 'perbaikan', 'kalibrasi'])) $statusClass = 'status-maintenance';
                                        elseif (in_array(strtolower($status), ['rusak', 'afkir'])) $statusClass = 'status-rusak';
                                    @endphp
                                    <span class="badge-status {{ $statusClass }}">
                                        {{ $status }}
                                    </span>
                                </td>

                                {{-- Merek --}}
                                <td>
                                    <span class="font-semibold text-slate-800">{{ $item->merek ?? '-' }}</span>
                                </td>

                                {{-- Lokasi Lab / Ruangan --}}
                                <td>
                                    <span class="badge-lokasi">
                                        📍 {{ $item->lokasi_lab ?? $item->lokasi ?? 'Lab Sentral' }}
                                    </span>
                                </td>

                                {{-- Tahun Pengadaan --}}
                                <td>
                                    <span class="text-slate-600 text-xs font-semibold">{{ $item->tahun ?? '-' }}</span>
                                </td>

                                {{-- Tombol Aksi Pengelolaan --}}
                                <td class="actions-cell">
                                    <div class="actions-group">
                                        {{-- Detail Spesifikasi --}}
                                        <a href="{{ route('alat.show', $item->id) }}" class="btn-act btn-act-detail" title="Lihat Spesifikasi Lengkap">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                            Detail
                                        </a>

                                        {{-- Edit Spesifikasi --}}
                                        <a href="{{ route('alat.edit', $item->id) }}" class="btn-act btn-act-edit" title="Edit Spesifikasi & Stok">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit
                                        </a>

                                        {{-- Hapus Data Stok (Aman & CSRF Protected) --}}
                                        <form action="{{ route('alat.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="button" 
                                                class="btn-act btn-act-hapus" 
                                                title="Hapus Data Stok dari Inventaris"
                                                onclick="confirmDelete(event, '{{ addslashes($item->nama_alat) }} [{{ $item->kode_alat }}]')"
                                            >
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">
                                    <div class="empty-state">
                                        <div class="empty-icon">🩺</div>
                                        <h3 class="empty-title">Belum Ada Data Inventaris</h3>
                                        <p class="empty-desc">Sistem inventaris siap digunakan. Klik tombol di bawah untuk mendaftarkan alat medis pertama.</p>
                                        <a href="{{ route('alat.create') }}" class="btn-daftar-baru" style="display:inline-flex;">
                                            ➕ Daftarkan Alat Baru Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Interactive Live Filter & Search Script --}}
    <script>
        function filterByCategory(val) {
            const url = new URL(window.location.href);
            if (val && val !== 'Semua') {
                url.searchParams.set('kategori', val);
            } else {
                url.searchParams.delete('kategori');
            }
            window.location.href = url.toString();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('table-search');
            const rows = document.querySelectorAll('.inventaris-row');
            const countBadge = document.getElementById('visible-count-badge');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    let visibleCount = 0;

                    rows.forEach(row => {
                        const kode = row.getAttribute('data-kode') || '';
                        const nama = row.getAttribute('data-nama') || '';
                        const kategori = row.getAttribute('data-kategori') || '';
                        const merek = row.getAttribute('data-merek') || '';
                        const lokasi = row.getAttribute('data-lokasi') || '';

                        const match = !query || 
                            kode.includes(query) || 
                            nama.includes(query) || 
                            kategori.includes(query) || 
                            merek.includes(query) || 
                            lokasi.includes(query);

                        if (match) {
                            row.style.display = '';
                            visibleCount++;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    if (countBadge) {
                        countBadge.textContent = `${visibleCount} Model Ditampilkan`;
                    }
                });
            }
        });
    </script>
</x-app-layout>
