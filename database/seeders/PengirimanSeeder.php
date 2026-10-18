<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Pengiriman;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Seeder;

class PengirimanSeeder extends Seeder
{
    public function run(): void
    {
        $penjualanList = TransaksiPenjualan::where('status_transaksi', '!=', 'batal')->take(20)->get();
        $kurirIds = Pengguna::where('peran', 'kurir')->pluck('id_pengguna')->all();

        if ($penjualanList->isEmpty() || empty($kurirIds)) {
            return;
        }

        foreach ($penjualanList as $index => $penjualan) {
            Pengiriman::create([
                'id_penjualan' => $penjualan->id_penjualan,
                'id_kurir' => fake()->randomElement($kurirIds),
                'alamat_tujuan' => fake()->address(),
                'nomor_resi' => 'RESI-'.now()->format('Ymd').'-'.sprintf('%04d', $index + 1),
                'tanggal_kirim' => $penjualan->tanggal_penjualan,
                'status_pengiriman' => fake()->randomElement(['diproses', 'dikirim', 'terkirim', 'gagal']),
            ]);
        }
    }
}
