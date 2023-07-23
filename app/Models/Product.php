<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'stok',
        'category_id',
        'satuan_id',
        'harga_beli',
        'harga_jual',
        'warna',
        'ukuran'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
}
