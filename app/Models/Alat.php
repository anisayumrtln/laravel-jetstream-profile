<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'kategori',
        'stok',
        'status',
        'lokasi_lab',
        'deskripsi',
        'tahun',
        'merek',
        'lokasi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'stok' => 'integer',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'nama_alkes',
    ];

    /**
     * Accessor for nama_alkes to guarantee full compatibility with Nuxt.js frontend.
     */
    public function getNamaAlkesAttribute(): ?string
    {
        return $this->attributes['nama_alat'] ?? null;
    }
}
