<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Alat Medis Baru') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .form-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        .form-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 35%, #0f3460 65%, #1a4a7a 100%);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-page::before {
            content: '';
            position: absolute;
            top: -200px; right: -100px;
            width: 450px; height: 450px;
            background: radial-gradient(circle, rgba(0,212,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 9s ease-in-out infinite;
            pointer-events: none;
        }

        .form-page::after {
            content: '';
            position: absolute;
            bottom: -120px; left: -80px;
            width: 380px; height: 380px;
            background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 12s ease-in-out infinite reverse;
            pointer-events: none;
        }

        @keyframes blobFloat {
            0%,100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-25px) scale(1.04); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        /* Back link */
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

        /* Form Card */
        .form-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 560px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.45), 0 0 0 1px rgba(255,255,255,0.05) inset;
            position: relative;
            z-index: 10;
            animation: fadeInUp 0.6s cubic-bezier(0.16,1,0.3,1);
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .form-card-icon {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #00d4ff, #0077b6);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            box-shadow: 0 8px 20px rgba(0,212,255,0.3);
            flex-shrink: 0;
        }

        .form-card-title { color: #fff; font-size: 1.3rem; font-weight: 800; margin: 0; }
        .form-card-subtitle { color: rgba(255,255,255,0.4); font-size: 0.8rem; margin: 3px 0 0 0; }

        /* Form groups */
        .form-body { display: flex; flex-direction: column; gap: 1.25rem; }

        .form-group { display: flex; flex-direction: column; gap: 6px; }

        .form-label {
            display: flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,0.7);
            font-size: 0.82rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .label-icon { opacity: 0.7; }

        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 13px 16px;
            color: #fff;
            font-size: 0.92rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input::placeholder { color: rgba(255,255,255,0.25); }

        .form-input:focus {
            border-color: rgba(0,212,255,0.6);
            background: rgba(0,212,255,0.06);
            box-shadow: 0 0 0 3px rgba(0,212,255,0.12), 0 0 20px rgba(0,212,255,0.08);
        }

        .form-input:hover:not(:focus) { border-color: rgba(255,255,255,0.2); }

        .form-error { color: #f87171; font-size: 0.78rem; margin-top: 2px; }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.08);
            gap: 1rem;
        }

        .btn-batal {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 11px 20px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.2s ease;
        }

        .btn-batal:hover {
            color: rgba(255,255,255,0.85);
            border-color: rgba(255,255,255,0.25);
            background: rgba(255,255,255,0.05);
            text-decoration: none;
        }

        .btn-simpan {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #00d4ff, #0077b6);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 28px;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(0,212,255,0.35);
            transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-simpan::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-simpan:hover::before { left: 100%; }
        .btn-simpan:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 10px 28px rgba(0,212,255,0.5);
        }

        .btn-simpan:active { transform: scale(0.98); }
    </style>

    <div class="form-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Daftar
        </a>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">➕</div>
                <div>
                    <h1 class="form-card-title">Tambah Alat Medis</h1>
                    <p class="form-card-subtitle">Isi semua data alat dengan lengkap dan benar</p>
                </div>
            </div>

            <form action="{{ route('alat.store') }}" method="POST" class="form-body">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        <span class="label-icon">🏥</span> Nama Alat
                    </label>
                    <input type="text" name="nama_alat" value="{{ old('nama_alat') }}" class="form-input" placeholder="Contoh: Stetoskop Littmann Classic III" required>
                    @error('nama_alat') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="label-icon">📅</span> Tahun Pengadaan
                    </label>
                    <input type="number" name="tahun" value="{{ old('tahun') }}" class="form-input" placeholder="Contoh: 2024" min="1990" max="2030" required>
                    @error('tahun') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="label-icon">🏷️</span> Merek / Pabrikan
                    </label>
                    <input type="text" name="merek" value="{{ old('merek') }}" class="form-input" placeholder="Contoh: 3M Littmann" required>
                    @error('merek') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <span class="label-icon">📍</span> Lokasi Ruangan
                    </label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-input" placeholder="Contoh: R-101" required>
                    @error('lokasi') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('alat.index') }}" class="btn-batal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-simpan">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
