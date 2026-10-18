<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'detail_pembelian';

    protected $primaryKey = 'id_detail_pembelian';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_pembelian',
        'id_produk',
        'jumlah',
        'harga_beli_satuan',
        'subtotal',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [

    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function transaksiPembelian()
    {
        return $this->belongsTo(TransaksiPembelian::class, 'id_pembelian', 'id_pembelian');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }

    // @enddbml-sync:relations
}
