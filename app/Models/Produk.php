<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'deskripsi',
        'stok',
        'harga',
        'gambar_url',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class);
    }
}
