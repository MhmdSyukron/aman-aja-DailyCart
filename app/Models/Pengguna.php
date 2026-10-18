<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'peran',
        'no_telepon',
        'alamat',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [

    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function transaksiPenjualans()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'id_pelanggan', 'id_pengguna');
    }

    public function transaksiPembelians()
    {
        return $this->hasMany(TransaksiPembelian::class, 'id_pengguna', 'id_pengguna');
    }

    public function pengirimen()
    {
        return $this->hasMany(Pengiriman::class, 'id_kurir', 'id_pengguna');
    }

    public function pengeluaranOperasionals()
    {
        return $this->hasMany(PengeluaranOperasional::class, 'id_pengguna', 'id_pengguna');
    }

    // @enddbml-sync:relations
}
