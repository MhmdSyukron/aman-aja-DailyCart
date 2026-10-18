<?php

namespace Database\Seeders;

use App\Models\DetailPenjualan;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Promo;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Seeder;

class TransaksiPenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $pelangganIds = Pengguna::where('peran', 'pelanggan')->pluck('id_pengguna')->all();
        if (empty($pelangganIds)) {
            $pelangganIds = Pengguna::pluck('id_pengguna')->all();
        }

        $kasirIds = Pengguna::whereIn('peran', ['kasir', 'admin'])->pluck('id_pengguna')->all();
        if (empty($kasirIds)) {
            $kasirIds = Pengguna::pluck('id_pengguna')->all();
        }

        $promoIds = Promo::where('status_aktif', 'aktif')->pluck('id_promo')->all();
        $produkList = Produk::all();

        if (empty($pelangganIds) || empty($kasirIds) || $produkList->isEmpty()) {
            return;
        }

        for ($i = 1; $i <= 35; $i++) {
            $promoId = (fake()->boolean(40) && ! empty($promoIds)) ? fake()->randomElement($promoIds) : null;
            $potongan = 0;

            if ($promoId) {
                $promo = Promo::find($promoId);
                $potongan = $promo ? $promo->potongan : 0;
            }

            $transaksi = TransaksiPenjualan::create([
                'nomor_transaksi' => 'PJ-'.now()->subDays(fake()->numberBetween(1, 60))->format('Ymd').'-'.sprintf('%04d', $i),
                'tanggal_penjualan' => fake()->dateTimeBetween('-2 months', 'now'),
                'id_pelanggan' => fake()->randomElement($pelangganIds),
                'id_kasir' => fake()->randomElement($kasirIds),
                'id_promo' => $promoId,
                'total_pembayaran' => 0,
                'status_transaksi' => fake()->randomElement(['selesai', 'selesai', 'selesai', 'proses', 'batal']),
            ]);

            $subtotalSemua = 0;
            $itemsCount = fake()->numberBetween(1, 4);
            $selectedProduks = $produkList->random(min($itemsCount, $produkList->count()));

            foreach ($selectedProduks as $produk) {
                $jumlah = fake()->numberBetween(1, 5);
                $hargaSatuan = $produk->harga_jual;
                $subtotal = $jumlah * $hargaSatuan;

                DetailPenjualan::create([
                    'id_penjualan' => $transaksi->id_penjualan,
                    'id_produk' => $produk->id_produk,
                    'jumlah' => $jumlah,
                    'harga_satuan' => $hargaSatuan,
                    'subtotal' => $subtotal,
                ]);

                $subtotalSemua += $subtotal;
            }

            $totalAkhir = max(0, $subtotalSemua - $potongan);
            $transaksi->update(['total_pembayaran' => $totalAkhir]);
        }
    }
}
