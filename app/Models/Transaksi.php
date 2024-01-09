<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        "id_user",
        "nama",
        "id_produk",
        "subtotal",
        "status",
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
