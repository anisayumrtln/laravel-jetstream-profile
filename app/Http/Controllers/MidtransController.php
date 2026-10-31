<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaksi;
use App\Models\Alat;
use Exception;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function getToken(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-FVYRHW4KMT1AgoyI.cfgKDnt');

        Config::$serverKey = $serverKey;
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $validated = $request->validate([
            'gross_amount' => 'required|numeric|min:1',
            'first_name'   => 'nullable|string',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            'item_name'    => 'nullable|string',
            'alat_id'      => 'nullable|integer',
            'qty'          => 'nullable|integer|min:1',
        ]);

        $orderId = 'ORDER-' . time() . '-' . rand(100, 999);
        $grossAmount = (int) round($validated['gross_amount']);
        $namaAlat = $validated['item_name'] ?? 'Alat Medis Anisa Medika';
        $qty = $validated['qty'] ?? 1;

        // Cari alat terkait jika ada
        $alat = null;
        if (!empty($validated['alat_id'])) {
            $alat = Alat::find($validated['alat_id']);
        } elseif (!empty($validated['item_name'])) {
            $alat = Alat::where('nama_alat', 'like', '%' . trim($validated['item_name']) . '%')->first();
        }

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $validated['first_name'] ?? 'Pelanggan Anisa Medika',
                'email'      => $validated['email'] ?? 'pelanggan@example.com',
                'phone'      => $validated['phone'] ?? '08123456789',
            ],
            'item_details' => [
                [
                    'id'       => $alat ? 'ALAT-' . $alat->id : 'ITEM-1',
                    'price'    => (int) round($grossAmount / max(1, $qty)),
                    'quantity' => $qty,
                    'name'     => mb_substr($namaAlat, 0, 50),
                ]
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan record Transaksi di Database Laravel
            $transaksi = Transaksi::create([
                'order_id'          => $orderId,
                'nama_pelanggan'    => $validated['first_name'] ?? 'Pelanggan Anisa Medika',
                'email'             => $validated['email'] ?? 'pelanggan@example.com',
                'telepon'           => $validated['phone'] ?? null,
                'nama_alat'         => $namaAlat,
                'alat_id'           => $alat ? $alat->id : null,
                'jumlah'            => $qty,
                'total_harga'       => $grossAmount,
                'status'            => 'pending',
                'snap_token'        => $snapToken,
                'metode_pembayaran' => null,
            ]);

            return response()->json([
                'success'      => true,
                'order_id'     => $orderId,
                'snap_token'   => $snapToken,
                'token'        => $snapToken,
                'transaksi_id' => $transaksi->id
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal generate Snap Token: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        $orderId = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status', 'settlement');
        $paymentType = $request->input('payment_type');

        if (!$orderId) {
            return response()->json(['success' => false, 'message' => 'Order ID tidak ditemukan'], 400);
        }

        $transaksi = Transaksi::where('order_id', $orderId)->first();
        if (!$transaksi) {
            return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan'], 404);
        }

        $isSuccess = in_array(strtolower($transactionStatus), ['capture', 'settlement', 'success']);

        if ($isSuccess && $transaksi->status !== 'success') {
            $transaksi->update([
                'status' => 'success',
                'metode_pembayaran' => $paymentType ?? $transaksi->metode_pembayaran,
            ]);

            // Otomatis kurangi stok pada tabel Alats
            if ($transaksi->alat_id) {
                $alat = Alat::find($transaksi->alat_id);
                if ($alat) {
                    $alat->stok = max(0, $alat->stok - $transaksi->jumlah);
                    if ($alat->stok <= 0) {
                        $alat->status = 'Habis';
                    }
                    $alat->save();
                    Log::info("Stok alat #{$alat->id} ({$alat->nama_alat}) dikurangi {$transaksi->jumlah}, sisa: {$alat->stok}");
                }
            } elseif ($transaksi->nama_alat) {
                $alat = Alat::where('nama_alat', 'like', '%' . trim($transaksi->nama_alat) . '%')->first();
                if ($alat) {
                    $alat->stok = max(0, $alat->stok - $transaksi->jumlah);
                    if ($alat->stok <= 0) {
                        $alat->status = 'Habis';
                    }
                    $alat->save();
                    $transaksi->update(['alat_id' => $alat->id]);
                }
            }
        } elseif (in_array(strtolower($transactionStatus), ['deny', 'cancel', 'expire'])) {
            $transaksi->update(['status' => 'failed']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Status transaksi berhasil diperbarui',
            'transaksi' => $transaksi
        ]);
    }
}
