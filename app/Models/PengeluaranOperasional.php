<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranOperasional extends Model
{
    use HasFactory;

    // @dbml-sync:table-property
    protected $table = 'pengeluaran_operasional';
    // @enddbml-sync:table-property

    // @dbml-sync:fillable
    protected $fillable = [
        'id_pengguna',
		'tanggal_pengeluaran',
		'jenis_pengeluaran',
		'nominal',
		'keterangan'
    ];
    // @enddbml-sync:fillable

    // @dbml-sync:casts
    protected $casts = [
        'tanggal_pengeluaran' => 'date'
    ];
    // @enddbml-sync:casts

    // @dbml-sync:relations
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    // @enddbml-sync:relations
}