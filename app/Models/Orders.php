<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Karena nama tabelnya 'orders', Laravel secara otomatis mengenalinya
    protected $table = 'orders';
    protected $primaryKey = 'id_penjualan';
    public $timestamps = false;

    protected $fillable = [
        'nomor_transaksi',
        'tanggal_penjualan',
        'id_pelanggan',
        'id_kasir',
        'id_promo',
        'total_pembayaran',
        'status_transaksi',
    ];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_penjualan', 'id_penjualan');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pengguna::class, 'id_pelanggan', 'id_pengguna');
    }

    public function kasir()
    {
        return $this->belongsTo(Pengguna::class, 'id_kasir', 'id_pengguna');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'id_promo', 'id_promo');
    }
}