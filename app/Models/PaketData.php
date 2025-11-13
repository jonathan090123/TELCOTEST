<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketData extends Model
{
    use HasFactory;

    protected $table = 'paket_data';

    protected $fillable = [
        'nama',
        'kuota',
        'masa_aktif',
        'harga',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'masa_aktif' => 'integer',
    ];

    /**
     * Relasi dengan transaksi
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    /**
     * Format harga ke Rupiah
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Check apakah paket aktif
     */
    public function isActive()
    {
        return $this->status === 'active';
    }
}