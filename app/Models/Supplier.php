<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'supplier';

    protected $primaryKey = 'id_supplier';

    public $timestamps = false;
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'nama_supplier',
        'kontak',
        'alamat',
        'informasi_pemasok',
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [

    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function transaksiPembelians()
    {
        return $this->hasMany(TransaksiPembelian::class, 'id_supplier', 'id_supplier');
    }

    // @enddbml-sync:relations
}
