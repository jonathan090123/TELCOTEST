<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom mana saja yang boleh diisi datanya?
    protected $fillable = [
        'product_name',
        'ml_category',  // Penting: Mapping ke API Python
        'operator',
        'price',
        'description',
        'image_url',
        'is_popular'
    ];

    /**
     * Compatibility accessor: beberapa view mengakses ->nama
     * agar kode lama tetap bekerja, peta ke product_name
     */
    public function getNamaAttribute()
    {
        return $this->product_name;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }

    public function getImagePathAttribute()
    {
        return $this->image_url
            ? asset('storage/' . $this->image_url)
            : asset('img/Telco.jpeg');
    }
}
