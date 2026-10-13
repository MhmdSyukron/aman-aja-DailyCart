<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'produk';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_kategori',
		'nama_produk',
		'harga_beli',
		'harga_jual',
		'stok',
		'stok_minimum',
		'deskripsi'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_produk', 'id_produk');
    }

    public function detailPembelians()
    {
        return $this->hasMany(DetailPembelian::class, 'id_produk', 'id_produk');
    }

    // @enddbml-sync:relations
}