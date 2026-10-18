<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'pengiriman';

    protected $primaryKey = 'id_pengiriman';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_penjualan',
        'id_kurir',
        'alamat_tujuan',
        'nomor_resi',
        'tanggal_kirim',
        'status_pengiriman',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_kirim' => 'datetime',
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function transaksiPenjualan()
    {
        return $this->belongsTo(TransaksiPenjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_kurir', 'id_pengguna');
    }

    // @enddbml-sync:relations
}
