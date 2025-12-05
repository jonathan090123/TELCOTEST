<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlProductMapping extends Model
{
    use HasFactory;

    protected $table = 'ml_product_mappings';

    protected $fillable = [
        'operator',
        'ml_kategori',
        'ml_produk',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
