<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'id_product',
        'brand',
        'jenis',
        'nama_produk',
        'material',
        'dimensi',
        'warna_tersedia',
        'harga'
    ];
}
