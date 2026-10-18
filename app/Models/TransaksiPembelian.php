<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelian extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'transaksi_pembelian';

    protected $primaryKey = 'id_pembelian';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'nomor_transaksi',
        'tanggal_pembelian',
        'id_supplier',
        'id_pengguna',
        'total_biaya',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_pembelian' => 'datetime',
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function detailPembelians()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian', 'id_pembelian');
    }

    // @enddbml-sync:relations
}
