<?php

namespace Database\Seeders;

use App\Models\DetailPembelian;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\TransaksiPembelian;
use Illuminate\Database\Seeder;

class TransaksiPembelianSeeder extends Seeder
{
    public function run(): void
    {
        $supplierIds = Supplier::pluck('id_supplier')->all();
        $adminIds = Pengguna::whereIn('peran', ['admin', 'pemilik'])->pluck('id_pengguna')->all();
        $produkList = Produk::all();

        if (empty($supplierIds) || empty($adminIds) || $produkList->isEmpty()) {
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            $transaksi = TransaksiPembelian::create([
                'nomor_transaksi' => 'TB-'.now()->subDays(fake()->numberBetween(1, 90))->format('Ymd').'-'.sprintf('%04d', $i),
                'tanggal_pembelian' => fake()->dateTimeBetween('-3 months', 'now'),
                'id_supplier' => fake()->randomElement($supplierIds),
                'id_pengguna' => fake()->randomElement($adminIds),
                'total_biaya' => 0,
            ]);

            $totalBiaya = 0;
            $itemsCount = fake()->numberBetween(1, 4);
            $selectedProduks = $produkList->random(min($itemsCount, $produkList->count()));

            foreach ($selectedProduks as $produk) {
                $jumlah = fake()->numberBetween(5, 50);
                $hargaBeliSatuan = $produk->harga_beli;
                $subtotal = $jumlah * $hargaBeliSatuan;

                DetailPembelian::create([
                    'id_pembelian' => $transaksi->id_pembelian,
                    'id_produk' => $produk->id_produk,
                    'jumlah' => $jumlah,
                    'harga_beli_satuan' => $hargaBeliSatuan,
                    'subtotal' => $subtotal,
                ]);

                $totalBiaya += $subtotal;
            }

            $transaksi->update(['total_biaya' => $totalBiaya]);
        }
    }
}
