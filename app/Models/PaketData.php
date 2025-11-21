<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketData extends Model
{
    use HasFactory;

    protected $table = 'paket_data';

    protected $fillable = [
        // legacy fields
        'nama',
        'kuota',
        'masa_aktif',
        'harga',
        'deskripsi',
        'status',
        // new schema fields
        'product_name',
        'ml_category',
        'operator',
        'price',
        'description',
        'image_url',
        'is_popular',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'price' => 'decimal:2',
        'masa_aktif' => 'integer',
        'is_popular' => 'boolean',
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
        return 'Rp ' . number_format($this->harga ?? $this->price ?? 0, 0, ',', '.');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price ?? $this->harga ?? 0, 0, ',', '.');
    }

    /**
     * Check apakah paket aktif
     */
    public function isActive()
    {
        return $this->status === 'active';
    }
}