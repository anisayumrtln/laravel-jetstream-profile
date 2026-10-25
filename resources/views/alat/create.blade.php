<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-emerald-950 leading-tight flex items-center gap-2">
                <span>➕</span> {{ __('Pendaftaran Alat Kesehatan Baru') }}
            </h2>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                🔒 Khusus Admin & Petugas Logistik
            </span>
        </div>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap');

        .form-page * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        .mono-code {
            font-family: 'JetBrains Mono', monospace !important;
        }

        .form-page {
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
            color: #059669;
            transform: translateX(-3px);
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 2.2rem 2.2rem;
            width: 100%;
            max-width: 720px;
            box-shadow: 0 4px 25px -2px rgba(16, 185, 129, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04);
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 1.8rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .form-icon-box {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.25);
            flex-shrink: 0;
        }

        .form-title-h1 {
            color: #0f172a;
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0 0 3px 0;
            letter-spacing: -0.3px;
        }

        .form-title-sub {
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

        .form-input::placeholder, .form-textarea::placeholder {
            color: #94a3b8;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            background: #ffffff;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
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

        .btn-simpan {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff !important;
            border: none;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 28px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
            transition: all 0.25s ease;
        }

        .btn-simpan:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.45);
        }
    </style>

    <div class="form-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Sistem Inventaris
        </a>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-icon-box">➕</div>
                <div>
                    <h1 class="form-title-h1">Pendaftaran Alat Kesehatan Baru</h1>
                    <p class="form-title-sub">Masukkan spesifikasi dan jumlah stok awal untuk dicatat di inventaris rumah sakit</p>
                </div>
            </div>

            <form action="{{ route('alat.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    {{-- Kode Alkes --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>🏷️</span> Kode Alkes
                        </label>
                        <input 
                            type="text" 
                            name="kode_alat" 
                            value="{{ old('kode_alat', $suggestedKode ?? 'ALK-019') }}" 
                            class="form-input mono-code font-bold uppercase" 
                            placeholder="Contoh: ALK-019" 
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
                                <option value="{{ $kat }}" {{ old('kategori') === $kat ? 'selected' : '' }}>
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
                            value="{{ old('nama_alat') }}" 
                            class="form-input font-semibold" 
                            placeholder="Contoh: Mesin USG Doppler 4D Color Medis" 
                            required
                        >
                        @error('nama_alat') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>

                    {{-- Stok Unit --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span>📦</span> Jumlah Stok Awal (Unit)
                        </label>
                        <input 
                            type="number" 
                            name="stok" 
                            value="{{ old('stok', 1) }}" 
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
                            <option value="Tersedia" {{ old('status') === 'Tersedia' ? 'selected' : '' }}>Tersedia (Siap Pakai)</option>
                            <option value="Digunakan" {{ old('status') === 'Digunakan' ? 'selected' : '' }}>Digunakan di Ruangan</option>
                            <option value="Pemeliharaan" {{ old('status') === 'Pemeliharaan' ? 'selected' : '' }}>Pemeliharaan Rutin</option>
                            <option value="Kalibrasi" {{ old('status') === 'Kalibrasi' ? 'selected' : '' }}>Proses Kalibrasi Lab</option>
                            <option value="Rusak" {{ old('status') === 'Rusak' ? 'selected' : '' }}>Rusak / Butuh Servis</option>
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
                            value="{{ old('merek') }}" 
                            class="form-input" 
                            placeholder="Contoh: GE Healthcare / Mindray / Omron" 
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
                            value="{{ old('tahun', date('Y')) }}" 
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
                            value="{{ old('lokasi_lab', 'Lab Sentral Medis') }}" 
                            class="form-input" 
                            placeholder="Contoh: Lab Sentral Medis, Poli Kandungan, Ruang ICU" 
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
                            placeholder="Catatan serial number, spesifikasi probe, sertifikasi kalibrasi BPFK..."
                        >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <span class="form-error">⚠ {{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('alat.index') }}" class="btn-batal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-simpan">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Daftarkan Alat ke Inventaris
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
