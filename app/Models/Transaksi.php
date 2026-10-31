<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'nama_pelanggan',
        'email',
        'telepon',
        'nama_alat',
        'alat_id',
        'jumlah',
        'total_harga',
        'status',
        'snap_token',
        'metode_pembayaran',
        'catatan',
    ];

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}
