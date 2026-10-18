<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'promo';

    protected $primaryKey = 'id_promo';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'kode_promo',
        'nama_promo',
        'potongan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_aktif',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function transaksiPenjualans()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'id_promo', 'id_promo');
    }

    // @enddbml-sync:relations
}
