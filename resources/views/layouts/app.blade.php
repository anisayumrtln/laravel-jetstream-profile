<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            /* ═══════════════════════════════════════════
               TOAST NOTIFICATION SYSTEM (CENTER & HIGH CONTRAST)
            ═══════════════════════════════════════════ */
            #toast-container {
                position: fixed;
                top: 24px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 99999;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
                pointer-events: none;
                max-width: 460px;
                width: calc(100vw - 32px);
                font-family: 'Inter', 'Figtree', sans-serif;
            }

            .toast {
                pointer-events: all;
                display: flex;
                align-items: center;
                gap: 14px;
                padding: 14px 20px;
                border-radius: 10px; /* Kotak sleek */
                background: #0f172a; /* Solid Dark Slate untuk kontras tajam */
                border: 1.5px solid;
                box-shadow: 0 14px 35px rgba(0, 0, 0, 0.5), 0 4px 10px rgba(0, 0, 0, 0.3);
                position: relative;
                overflow: hidden;
                width: 100%;
                animation: toastDropDown 0.4s cubic-bezier(0.16, 1, 0.3, 1) both;
            }

            .toast.toast-hide {
                animation: toastFadeUp 0.3s cubic-bezier(0.55, 0, 1, 0.45) both;
            }

            /* Toast Types - Bold & High Contrast */
            .toast-success {
                border-color: #10b981;
                background: linear-gradient(135deg, #064e3b 0%, #0f172a 70%);
            }
            .toast-error {
                border-color: #ef4444;
                background: linear-gradient(135deg, #7f1d1d 0%, #0f172a 70%);
            }
            .toast-warning {
                border-color: #f59e0b;
                background: linear-gradient(135deg, #78350f 0%, #0f172a 70%);
            }
            .toast-info {
                border-color: #06b6d4;
                background: linear-gradient(135deg, #164e63 0%, #0f172a 70%);
            }

            /* Left Accent Stripe */
            .toast::before {
                content: '';
                position: absolute;
                top: 0; left: 0; bottom: 0;
                width: 5px;
            }
            .toast-success::before { background: #10b981; box-shadow: 0 0 10px #10b981; }
            .toast-error::before   { background: #ef4444; box-shadow: 0 0 10px #ef4444; }
            .toast-warning::before { background: #f59e0b; box-shadow: 0 0 10px #f59e0b; }
            .toast-info::before    { background: #06b6d4; box-shadow: 0 0 10px #06b6d4; }

            /* Icon box */
            .toast-icon {
                width: 36px; height: 36px;
                border-radius: 8px;
                display: flex; align-items: center; justify-content: center;
                font-size: 18px;
                flex-shrink: 0;
                font-weight: 700;
            }
            .toast-success .toast-icon { background: rgba(16, 185, 129, 0.25); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.4); }
            .toast-error   .toast-icon { background: rgba(239, 68, 68, 0.25);  color: #f87171; border: 1px solid rgba(239, 68, 68, 0.4); }
            .toast-warning .toast-icon { background: rgba(245, 158, 11, 0.25); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.4); }
            .toast-info    .toast-icon { background: rgba(6, 182, 212, 0.25);  color: #38bdf8; border: 1px solid rgba(6, 182, 212, 0.4); }

            .toast-body { flex: 1; min-width: 0; }
            .toast-title {
                font-size: 0.78rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 2px;
            }
            .toast-success .toast-title { color: #34d399; }
            .toast-error   .toast-title { color: #f87171; }
            .toast-warning .toast-title { color: #fbbf24; }
            .toast-info    .toast-title { color: #38bdf8; }

            .toast-message {
                font-size: 0.9rem;
                font-weight: 600;
                line-height: 1.35;
                color: #ffffff; /* Teks Putih Terang Jelas */
                word-break: break-word;
            }

            /* Close button */
            .toast-close {
                background: rgba(255, 255, 255, 0.1);
                border: none;
                cursor: pointer;
                padding: 6px;
                border-radius: 6px;
                display: flex; align-items: center; justify-content: center;
                color: rgba(255, 255, 255, 0.7);
                transition: all 0.2s ease;
                flex-shrink: 0;
            }
            .toast-close:hover { background: rgba(255, 255, 255, 0.25); color: #ffffff; }

            /* Progress bar bottom */
            .toast-progress {
                position: absolute;
                bottom: 0; left: 0;
                height: 3px;
                animation: toastProgress linear both;
            }
            .toast-success .toast-progress { background: #10b981; }
            .toast-error   .toast-progress { background: #ef4444; }
            .toast-warning .toast-progress { background: #f59e0b; }
            .toast-info    .toast-progress { background: #06b6d4; }

            @keyframes toastDropDown {
                from { opacity: 0; transform: translateY(-30px) scale(0.95); }
                to   { opacity: 1; transform: translateY(0) scale(1); }
            }
            @keyframes toastFadeUp {
                from { opacity: 1; transform: translateY(0) scale(1); max-height: 100px; margin-bottom: 0; }
                to   { opacity: 0; transform: translateY(-20px) scale(0.9); max-height: 0; margin-bottom: -10px; padding: 0; }
            }
            @keyframes toastProgress {
                from { width: 100%; }
                to   { width: 0%; }
            }

            /* ═══════════════════════════════════════════
               CUSTOM DELETE CONFIRMATION MODAL
            ═══════════════════════════════════════════ */
            .custom-modal-overlay {
                position: fixed;
                inset: 0;
                z-index: 999999;
                background: rgba(10, 22, 40, 0.8);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                opacity: 0;
                transition: opacity 0.25s ease;
                pointer-events: none;
            }

            .custom-modal-overlay.active {
                opacity: 1;
                pointer-events: all;
            }

            .custom-modal-card {
                background: #0f172a;
                border: 1.5px solid rgba(239, 68, 68, 0.4);
                border-radius: 18px;
                width: 100%;
                max-width: 440px;
                padding: 28px;
                box-shadow: 0 30px 70px rgba(0, 0, 0, 0.7), 0 0 30px rgba(239, 68, 68, 0.15);
                transform: scale(0.9) translateY(15px);
                transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                position: relative;
                overflow: hidden;
            }

            .custom-modal-overlay.active .custom-modal-card {
                transform: scale(1) translateY(0);
            }

            /* Top Accent line */
            .custom-modal-card::before {
                content: '';
                position: absolute;
                top: 0; left: 0; right: 0;
                height: 4px;
                background: linear-gradient(90deg, #ef4444, #f87171, #ef4444);
            }

            .custom-modal-header {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-bottom: 18px;
            }

            .custom-modal-icon-danger {
                width: 48px; height: 48px;
                border-radius: 12px;
                background: rgba(239, 68, 68, 0.18);
                border: 1px solid rgba(239, 68, 68, 0.4);
                color: #f87171;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                box-shadow: 0 0 20px rgba(239, 68, 68, 0.25);
            }

            .custom-modal-title {
                color: #ffffff;
                font-size: 1.15rem;
                font-weight: 800;
                margin: 0;
                letter-spacing: -0.2px;
            }

            .custom-modal-subtitle {
                color: rgba(255, 255, 255, 0.5);
                font-size: 0.8rem;
                margin: 2px 0 0 0;
            }

            .custom-modal-body {
                color: rgba(255, 255, 255, 0.85);
                font-size: 0.92rem;
                line-height: 1.5;
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.07);
                border-radius: 12px;
                padding: 14px 18px;
                margin-bottom: 24px;
            }

            .custom-modal-highlight {
                color: #fca5a5;
                font-weight: 700;
                word-break: break-word;
            }

            .custom-modal-footer {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                gap: 12px;
            }

            .btn-modal-cancel {
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.15);
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.875rem;
                font-weight: 600;
                padding: 10px 20px;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .btn-modal-cancel:hover {
                background: rgba(255, 255, 255, 0.16);
                color: #ffffff;
            }

            .btn-modal-confirm-delete {
                background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
                border: none;
                color: #ffffff;
                font-size: 0.875rem;
                font-weight: 700;
                padding: 10px 22px;
                border-radius: 10px;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 8px;
                box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
                transition: all 0.25s ease;
            }

            .btn-modal-confirm-delete:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(239, 68, 68, 0.6);
                background: linear-gradient(135deg, #f87171 0%, #ef4444 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <!-- ═══ TOAST CONTAINER ═══ -->
        <div id="toast-container" aria-live="polite" aria-atomic="false"></div>

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- ═══ DELETE CONFIRMATION MODAL ═══ -->
        <div id="delete-modal" class="custom-modal-overlay">
            <div class="custom-modal-card" role="dialog" aria-modal="true">
                <div class="custom-modal-header">
                    <div class="custom-modal-icon-danger">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </div>
                    <div>
                        <h3 class="custom-modal-title">Konfirmasi Hapus Data</h3>
                        <p class="custom-modal-subtitle">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
                <div class="custom-modal-body">
                    Apakah Anda yakin ingin menghapus <span id="delete-modal-item-name" class="custom-modal-highlight">data ini</span>?
                </div>
                <div class="custom-modal-footer">
                    <button type="button" class="btn-modal-cancel" id="delete-modal-cancel-btn">Batal</button>
                    <button type="button" class="btn-modal-confirm-delete" id="delete-modal-confirm-btn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                        Ya, Hapus Data
                    </button>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- ═══ TOAST NOTIFICATION DATA ═══ --}}
        @if (session('success'))
            <script>
                window.__toasts = window.__toasts || [];
                window.__toasts.push({ type: 'success', message: @json(session('success')) });
            </script>
        @endif
        @if (session('error'))
            <script>
                window.__toasts = window.__toasts || [];
                window.__toasts.push({ type: 'error', message: @json(session('error')) });
            </script>
        @endif
        @if (session('warning'))
            <script>
                window.__toasts = window.__toasts || [];
                window.__toasts.push({ type: 'warning', message: @json(session('warning')) });
            </script>
        @endif
        @if (session('info'))
            <script>
                window.__toasts = window.__toasts || [];
                window.__toasts.push({ type: 'info', message: @json(session('info')) });
            </script>
        @endif

        <script>
        (function () {
            const DURATION = 4500;

            const META = {
                success: {
                    title: 'Berhasil',
                    icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>`
                },
                error: {
                    title: 'Gagal',
                    icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>`
                },
                warning: {
                    title: 'Perhatian',
                    icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>`
                },
                info: {
                    title: 'Informasi',
                    icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>`
                },
            };

            function createToast(type, message) {
                const meta    = META[type] || META.info;
                const toast   = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.setAttribute('role', 'alert');

                toast.innerHTML = `
                    <div class="toast-icon">${meta.icon}</div>
                    <div class="toast-body">
                        <p class="toast-title">${meta.title}</p>
                        <p class="toast-message">${message}</p>
                    </div>
                    <button class="toast-close" aria-label="Tutup">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <line x1="18" y1="6" x2="6" y2="18"/>
                            <line x1="6" y1="6" x2="18" y2="18"/>
                        </svg>
                    </button>
                    <div class="toast-progress" style="animation-duration:${DURATION}ms"></div>
                `;

                const container = document.getElementById('toast-container');
                container.appendChild(toast);

                function dismiss() {
                    toast.classList.add('toast-hide');
                    toast.addEventListener('animationend', () => toast.remove(), { once: true });
                }

                toast.querySelector('.toast-close').addEventListener('click', dismiss);

                const timer = setTimeout(dismiss, DURATION);

                // Pause progress on hover
                toast.addEventListener('mouseenter', () => {
                    clearTimeout(timer);
                    const bar = toast.querySelector('.toast-progress');
                    if (bar) {
                        const cs = getComputedStyle(bar);
                        bar.style.animationPlayState = 'paused';
                    }
                });
                toast.addEventListener('mouseleave', () => {
                    const bar = toast.querySelector('.toast-progress');
                    if (bar) bar.style.animationPlayState = 'running';
                    setTimeout(dismiss, DURATION * 0.3);
                });
            }

            function init() {
                (window.__toasts || []).forEach(t => createToast(t.type, t.message));
                window.__toasts = [];

                // Global API: window.toast('success', 'Pesan...')
                window.toast = createToast;
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();

        /* ═══ GLOBAL CUSTOM DELETE CONFIRMATION SCRIPT ═══ */
        (function() {
            let activeForm = null;

            window.confirmDelete = function(event, itemName) {
                if (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    activeForm = event.target.closest('form');
                }
                
                const modal = document.getElementById('delete-modal');
                const nameEl = document.getElementById('delete-modal-item-name');
                if (nameEl) nameEl.textContent = itemName ? `"${itemName}"` : 'data ini';
                
                if (modal) {
                    modal.classList.add('active');
                }
                return false;
            };

            function closeDeleteModal() {
                const modal = document.getElementById('delete-modal');
                if (modal) modal.classList.remove('active');
                activeForm = null;
            }

            document.addEventListener('DOMContentLoaded', function() {
                const cancelBtn = document.getElementById('delete-modal-cancel-btn');
                const confirmBtn = document.getElementById('delete-modal-confirm-btn');
                const modal = document.getElementById('delete-modal');

                if (cancelBtn) cancelBtn.addEventListener('click', closeDeleteModal);
                if (modal) {
                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) closeDeleteModal();
                    });
                }
                if (confirmBtn) {
                    confirmBtn.addEventListener('click', function() {
                        if (activeForm) {
                            const formToSubmit = activeForm;
                            closeDeleteModal();
                            formToSubmit.submit();
                        }
                    });
                }

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && modal && modal.classList.contains('active')) {
                        closeDeleteModal();
                    }
                });
            });
        })();
        </script>
    </body>
</html>
