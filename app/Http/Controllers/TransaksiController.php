<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Alat;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with('alat')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('nama_alat', 'like', "%{$search}%");
            });
        }

        $transaksis = $query->paginate(10);
        $totalTransaksi = Transaksi::count();
        $totalSukses = Transaksi::whereIn('status', ['success', 'settlement', 'capture'])->count();
        $totalNominal = Transaksi::whereIn('status', ['success', 'settlement', 'capture'])->sum('total_harga');
        $totalPending = Transaksi::where('status', 'pending')->count();

        return view('transaksi.index', compact('transaksis', 'totalTransaksi', 'totalSukses', 'totalNominal', 'totalPending'));
    }

    public function markSuccess($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->status !== 'success') {
            $transaksi->update([
                'status' => 'success',
                'metode_pembayaran' => $transaksi->metode_pembayaran ?: 'Transfer/Terverifikasi Manual',
            ]);

            // Otomatis kurangi stok pada tabel Alats
            if ($transaksi->alat_id) {
                $alat = Alat::find($transaksi->alat_id);
                if ($alat) {
                    $alat->stok = max(0, $alat->stok - $transaksi->jumlah);
                    if ($alat->stok <= 0) $alat->status = 'Habis';
                    $alat->save();
                }
            } elseif ($transaksi->nama_alat) {
                $alat = Alat::where('nama_alat', 'like', '%' . trim($transaksi->nama_alat) . '%')->first();
                if ($alat) {
                    $alat->stok = max(0, $alat->stok - $transaksi->jumlah);
                    if ($alat->stok <= 0) $alat->status = 'Habis';
                    $alat->save();
                    $transaksi->update(['alat_id' => $alat->id]);
                }
            }
        }

        return redirect()->back()->with('success', "Pesanan {$transaksi->order_id} berhasil dikonfirmasi LUNAS & stok diperbarui!");
    }

    public function markFailed($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => 'failed']);

        return redirect()->back()->with('success', "Pesanan {$transaksi->order_id} berhasil dibatalkan.");
    }
}
