<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'transaksi_penjualan';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'nomor_transaksi',
		'tanggal_penjualan',
		'id_pelanggan',
		'id_kasir',
		'id_promo',
		'total_pembayaran',
		'status_transaksi'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_penjualan' => 'datetime'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pelanggan', 'id_pengguna');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_kasir', 'id_pengguna');
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class, 'id_promo', 'id_promo');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function pengirimen()
    {
        return $this->hasMany(Pengiriman::class, 'id_penjualan', 'id_penjualan');
    }

    // @enddbml-sync:relations
}