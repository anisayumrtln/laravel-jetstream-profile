<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-800 leading-tight flex items-center gap-2">
                    <span>💳</span>
                    <span>Riwayat Transaksi & Pembayaran Alkes</span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Monitoring pemesanan langsung dari toko online frontend & Midtrans Gateway</p>
            </div>
            <a href="{{ route('alat.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                <span>🩺 Lihat Inventaris Stok</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Flash Alert Message -->
            @if(session('success'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-between text-xs text-emerald-800 shadow-sm">
                    <div class="flex items-center gap-2 font-bold">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <span class="text-[11px] text-emerald-600 font-semibold">Tersinkronisasi</span>
                </div>
            @endif

            <!-- Info Simulasi Sandbox Midtrans -->
            <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-sky-50 via-teal-50 to-emerald-50 border border-sky-200/80 shadow-xs">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-sky-100 text-sky-800 uppercase tracking-wider">Info Midtrans Sandbox</span>
                            <span class="text-xs font-bold text-slate-800">Mengapa status awal berstatus "Menunggu"?</span>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed max-w-3xl">
                            Saat pelanggan menekan tombol <strong>Bayar Sekarang</strong>, tagihan/Virtual Account diterbitkan sehingga status awal adalah <strong>Menunggu (Pending)</strong>. Status otomatis berubah menjadi <strong>Sukses</strong> saat pelanggan menyelesaikan pembayaran di Midtrans, atau Anda dapat mengonfirmasi secara manual di bawah ini.
                        </p>
                    </div>
                    <div class="flex flex-wrap sm:flex-nowrap gap-2 shrink-0">
                        <a href="https://simulator.sandbox.midtrans.com/" target="_blank" class="px-3.5 py-2 rounded-xl bg-white border border-sky-300 hover:bg-sky-50 text-sky-700 text-xs font-bold shadow-2xs flex items-center gap-1.5 transition">
                            <span>🚀 Simulator Midtrans</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Overview Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Transaksi</div>
                        <div class="text-2xl font-black text-slate-800 mt-1">{{ number_format($totalTransaksi) }}</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Seluruh pesanan masuk</div>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl font-bold">📋</div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Transaksi Sukses</div>
                        <div class="text-2xl font-black text-emerald-700 mt-1">{{ number_format($totalSukses) }}</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Pembayaran terverifikasi</div>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">✅</div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold text-amber-600 uppercase tracking-wider">Menunggu Bayar</div>
                        <div class="text-2xl font-black text-amber-700 mt-1">{{ number_format($totalPending) }}</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Pending di Midtrans</div>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">⏳</div>
                </div>

                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm flex items-center justify-between">
                    <div>
                        <div class="text-xs font-bold text-teal-600 uppercase tracking-wider">Total Pendapatan</div>
                        <div class="text-xl font-black text-teal-800 mt-1">Rp {{ number_format($totalNominal, 0, ',', '.') }}</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Dari transaksi sukses</div>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl font-bold">💰</div>
                </div>
            </div>

            <!-- Tabel Transaksi -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="font-bold text-base text-slate-800">Daftar Transaksi Pelanggan</h3>
                        <p class="text-xs text-slate-500">Stok alat kesehatan otomatis berkurang saat transaksi berhasil</p>
                    </div>

                    <form method="GET" action="{{ route('transaksi.index') }}" class="flex items-center gap-2 w-full sm:w-auto">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari Order ID, Nama, Alat..." 
                            class="text-xs rounded-xl border border-slate-300 px-3 py-2 w-full sm:w-64 focus:ring-emerald-500 focus:border-emerald-500"
                        />
                        <button type="submit" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-sm">
                            Filter
                        </button>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-wider border-b border-slate-200">
                                <th class="py-3.5 px-4">Order ID & Waktu</th>
                                <th class="py-3.5 px-4">Pelanggan</th>
                                <th class="py-3.5 px-4">Item Alat Kesehatan</th>
                                <th class="py-3.5 px-4">Jumlah (Qty)</th>
                                <th class="py-3.5 px-4">Total Bayar</th>
                                <th class="py-3.5 px-4">Metode</th>
                                <th class="py-3.5 px-4">Status</th>
                                <th class="py-3.5 px-4 text-center">Aksi Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                            @forelse($transaksis as $t)
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="py-3.5 px-4 font-mono font-semibold text-slate-900">
                                        <div class="text-emerald-700 font-bold">{{ $t->order_id }}</div>
                                        <div class="text-[10px] text-slate-400 font-sans mt-0.5">{{ $t->created_at->format('d M Y, H:i') }} WIB</div>
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <div class="font-bold text-slate-800">{{ $t->nama_pelanggan }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $t->email }}</div>
                                    </td>
                                    <td class="py-3.5 px-4 font-medium text-slate-800">
                                        {{ $t->nama_alat }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-slate-100 text-slate-800 font-bold">
                                            {{ $t->jumlah }} unit
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-4 font-extrabold text-slate-900">
                                        Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3.5 px-4 uppercase text-[11px] text-slate-600 font-semibold">
                                        {{ $t->metode_pembayaran ?: 'Midtrans Snap' }}
                                    </td>
                                    <td class="py-3.5 px-4">
                                        @if(in_array($t->status, ['success', 'settlement', 'capture']))
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                <span>✓</span> Sukses
                                            </span>
                                        @elseif($t->status === 'pending')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                                <span>⏳</span> Menunggu
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-100 text-rose-800 border border-rose-200">
                                                <span>✕</span> Gagal
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        @if($t->status === 'pending')
                                            <div class="flex items-center justify-center gap-1.5">
                                                <form method="POST" action="{{ route('transaksi.markSuccess', $t->id) }}" onsubmit="return confirm('Konfirmasi pesanan ini telah LUNAS? Stok alat akan otomatis berkurang.');">
                                                    @csrf
                                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-[11px] shadow-2xs flex items-center gap-1 transition" title="Konfirmasi Pembayaran Lunas">
                                                        <span>✓</span> Lunas
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('transaksi.markFailed', $t->id) }}" onsubmit="return confirm('Batalkan pesanan ini?');">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-1.5 rounded-lg border border-slate-300 hover:bg-rose-50 hover:text-rose-700 text-slate-500 font-semibold text-[11px] transition" title="Batalkan Pesanan">
                                                        <span>✕</span>
                                                    </button>
                                                </form>
                                            </div>
                                        @elseif(in_array($t->status, ['success', 'settlement', 'capture']))
                                            <span class="text-[11px] text-emerald-600 font-bold flex items-center justify-center gap-1">
                                                <span>Terverifikasi</span>
                                            </span>
                                        @else
                                            <span class="text-[11px] text-slate-400">Dibatalkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-12 text-center text-slate-400">
                                        <div class="text-3xl mb-2">📦</div>
                                        <div class="font-bold">Belum ada transaksi tercatat</div>
                                        <div class="text-[11px] mt-0.5">Lakukan transaksi checkout di frontend untuk menguji pencatatan pesanan otomatis.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($transaksis->hasPages())
                    <div class="p-4 border-t border-slate-100">
                        {{ $transaksis->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
