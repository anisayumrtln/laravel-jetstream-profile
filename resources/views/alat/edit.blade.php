<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Alat Medis') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .edit-page * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

        .edit-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 35%, #0f3460 65%, #1a4a7a 100%);
            padding: 2.5rem 1.5rem;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .edit-page::before {
            content: '';
            position: absolute;
            top: -200px; right: -120px;
            width: 460px; height: 460px;
            background: radial-gradient(circle, rgba(245,158,11,0.08) 0%, transparent 70%);
            border-radius: 50%;
            animation: blobFloat 9s ease-in-out infinite;
            pointer-events: none;
        }

        .edit-page::after {
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

        .edit-card {
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

        .edit-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .edit-card-icon {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            box-shadow: 0 8px 20px rgba(245,158,11,0.3);
            flex-shrink: 0;
        }

        .edit-card-title { color: #fff; font-size: 1.3rem; font-weight: 800; margin: 0; }
        .edit-card-subtitle { color: rgba(255,255,255,0.4); font-size: 0.8rem; margin: 3px 0 0 0; }

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

        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.14);
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
            border-color: rgba(245,158,11,0.6);
            background: rgba(245,158,11,0.05);
            box-shadow: 0 0 0 3px rgba(245,158,11,0.12), 0 0 20px rgba(245,158,11,0.06);
        }

        .form-input:hover:not(:focus) { border-color: rgba(255,255,255,0.22); }

        .form-error { color: #f87171; font-size: 0.78rem; margin-top: 2px; }

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

        .btn-update {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #fff;
            border: none;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 12px 28px;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(245,158,11,0.35);
            transition: all 0.3s cubic-bezier(0.34,1.56,0.64,1);
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-update::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-update:hover::before { left: 100%; }
        .btn-update:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 10px 28px rgba(245,158,11,0.5);
        }

        .btn-update:active { transform: scale(0.98); }

        /* Changed indicator */
        .edit-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(245,158,11,0.12);
            border: 1px solid rgba(245,158,11,0.3);
            color: #fcd34d;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
            margin-left: 6px;
        }
    </style>

    <div class="edit-page">
        <a href="{{ route('alat.index') }}" class="back-link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Daftar
        </a>

        <div class="edit-card">
            <div class="edit-card-header">
                <div class="edit-card-icon">✏️</div>
                <div>
                    <h1 class="edit-card-title">Edit Alat Medis <span class="edit-badge">✦ Mode Edit</span></h1>
                    <p class="edit-card-subtitle">Perbarui informasi alat medis di bawah ini</p>
                </div>
            </div>

            <form action="{{ route('alat.update', $alat->id) }}" method="POST" class="form-body">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">🏥 Nama Alat</label>
                    <input type="text" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}" class="form-input" required>
                    @error('nama_alat') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">📅 Tahun Pengadaan</label>
                    <input type="number" name="tahun" value="{{ old('tahun', $alat->tahun) }}" class="form-input" min="1990" max="2030" required>
                    @error('tahun') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">🏷️ Merek / Pabrikan</label>
                    <input type="text" name="merek" value="{{ old('merek', $alat->merek) }}" class="form-input" required>
                    @error('merek') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">📍 Lokasi Ruangan</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $alat->lokasi) }}" class="form-input" required>
                    @error('lokasi') <span class="form-error">⚠ {{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('alat.index') }}" class="btn-batal">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        Batal
                    </a>
                    <button type="submit" class="btn-update">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
