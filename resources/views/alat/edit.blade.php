<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-950 leading-tight flex items-center gap-2">
                <span>✏️</span> {{ __('Edit Spesifikasi & Stok Alat Medis') }}
            </h2>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                🔒 Mode Edit Khusus Admin / Logistik
            </span>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap');

        .edit-page * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        .mono-code {
            font-family: 'JetBrains Mono', monospace !important;
        }

        .edit-page {
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
            max-width: 720px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: #d97706;
            transform: translateX(-3px);
        }

        .edit-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 2.2rem 2.2rem;
            width: 100%;
            max-width: 720px;
            box-shadow: 0 4px 25px -2px rgba(245, 158, 11, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04);
        }

        .edit-card-header {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 1.8rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .edit-icon-box {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 14px rgba(245, 158, 11, 0.25);
            flex-shrink: 0;
        }

        .edit-title-h1 {
            color: #0f172a;
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0 0 3px 0;
            letter-spacing: -0.3px;
        }

        .edit-title-sub {
            color: #64748b;
            font-size: 0.85rem;
            margin: 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.25rem;
        }

        .col-span-2 {
            grid-column: span 2;
        }

        @media (max-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            .col-span-2 {
                grid-column: span 1;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #334155;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 11px 14px;
            color: #0f172a;
            font-size: 0.9rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-select option {
            background: #ffffff;
            color: #0f172a;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            background: #ffffff;
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.15);
        }

        .form-error {
            color: #dc2626;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 2px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-batal {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            text-decoration: none !important;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 11px 22px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            transition: all 0.2s ease;
        }

        .btn-batal:hover {
            color: #0f172a;
            border-color: #94a3b8;
            background: #f1f5f9;
        }

        .btn-update {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff !important;
            border: none;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 28px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(245, 158, 11, 0.35);
            transition: all 0.25s ease;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.45);
        }
    </style>

    <div class="edit-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Sistem Inventaris
        </a>

        <div class="edit-card">
            <div class="edit-card-header">
                <div class="edit-icon-box">✏️</div>
                <div>
                    <h1 class="edit-title-h1">Edit Spesifikasi & Stok Alat</h1>
                    <p class="edit-title-sub">Perbarui informasi teknis, status kesiapan, atau kuantitas unit alkes</p>
                </div>
            </div>

            <form action="{{ route('alat.update', $alat->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    {{-- Kode Alkes --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>🏷️</span> Kode Alkes
                        </label>
                        <input 
                            type="text" 
                            name="kode_alat" 
                            value="{{ old('kode_alat', $alat->kode_alat ?? ('ALK-' . str_pad($alat->id, 3, '0', STR_PAD_LEFT))) }}" 
                            class="form-input mono-code font-bold uppercase" 
                            required
                        >
                        @error('kode_alat') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>🗂️</span> Kategori Alkes
                        </label>
                        <select name="kategori" class="form-select" required>
                            @foreach ($kategoris as $kat)
                                <option value="{{ $kat }}" {{ old('kategori', $alat->kategori) === $kat ? 'selected' : '' }}>
                                    {{ $kat }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Nama Alat Medis --}}
                    <div class="form-group col-span-2">
                        <label class="form-label">
                            <span>🏥</span> Nama Alat Kesehatan Medis
                        </label>
                        <input 
                            type="text" 
                            name="nama_alat" 
                            value="{{ old('nama_alat', $alat->nama_alat) }}" 
                            class="form-input font-semibold" 
                            required
                        >
                        @error('nama_alat') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Stok Unit --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>📦</span> Stok Unit Tersedia
                        </label>
                        <input 
                            type="number" 
                            name="stok" 
                            value="{{ old('stok', $alat->stok ?? 1) }}" 
                            class="form-input font-bold" 
                            min="0" 
                            max="9999" 
                            required
                        >
                        @error('stok') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Status Operasional --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>⚡</span> Status Operasional
                        </label>
                        <select name="status" class="form-select" required>
                            @php $currentStatus = old('status', $alat->status ?? 'Tersedia'); @endphp
                            <option value="Tersedia" {{ $currentStatus === 'Tersedia' ? 'selected' : '' }}>Tersedia (Siap Pakai)</option>
                            <option value="Digunakan" {{ $currentStatus === 'Digunakan' ? 'selected' : '' }}>Digunakan di Ruangan</option>
                            <option value="Pemeliharaan" {{ $currentStatus === 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan Rutin</option>
                            <option value="Kalibrasi" {{ $currentStatus === 'Kalibrasi' ? 'selected' : '' }}>Proses Kalibrasi Lab</option>
                            <option value="Rusak" {{ $currentStatus === 'Rusak' ? 'selected' : '' }}>Rusak / Butuh Servis</option>
                        </select>
                        @error('status') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Merek / Pabrikan --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>🏢</span> Merek / Pabrikan
                        </label>
                        <input 
                            type="text" 
                            name="merek" 
                            value="{{ old('merek', $alat->merek) }}" 
                            class="form-input" 
                            required
                        >
                        @error('merek') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Tahun Pengadaan --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>📅</span> Tahun Pengadaan
                        </label>
                        <input 
                            type="number" 
                            name="tahun" 
                            value="{{ old('tahun', $alat->tahun) }}" 
                            class="form-input" 
                            min="1990" 
                            max="{{ date('Y') + 1 }}" 
                            required
                        >
                        @error('tahun') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Lokasi Ruangan / Laboratorium --}}
                    <div class="form-group col-span-2">
                        <label class="form-label">
                            <span>📍</span> Lokasi Penempatan Ruangan / Lab
                        </label>
                        <input 
                            type="text" 
                            name="lokasi_lab" 
                            value="{{ old('lokasi_lab', $alat->lokasi_lab ?? $alat->lokasi) }}" 
                            class="form-input" 
                            required
                        >
                        @error('lokasi_lab') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Deskripsi / Spesifikasi Teknis --}}
                    <div class="form-group col-span-2">
                        <label class="form-label">
                            <span>📝</span> Deskripsi & Catatan Spesifikasi Teknis
                        </label>
                        <textarea 
                            name="deskripsi" 
                            rows="3" 
                            class="form-textarea" 
                            placeholder="Catatan serial number, nomor kalibrasi, atau riwayat perawatan..."
                        >{{ old('deskripsi', $alat->deskripsi) }}</textarea>
                        @error('deskripsi') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('alat.index') }}" class="btn-batal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-update">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Perbarui Spesifikasi & Stok
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
