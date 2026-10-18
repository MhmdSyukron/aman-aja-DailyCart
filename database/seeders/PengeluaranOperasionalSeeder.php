<?php

namespace Database\Seeders;

use App\Models\PengeluaranOperasional;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PengeluaranOperasionalSeeder extends Seeder
{
    public function run(): void
    {
        $adminIds = Pengguna::whereIn('peran', ['admin', 'pemilik'])->pluck('id_pengguna')->all();

        if (empty($adminIds)) {
            $adminIds = Pengguna::pluck('id_pengguna')->all();
        }

        if (empty($adminIds)) {
            return;
        }

        $pengeluaranList = [
            ['jenis_pengeluaran' => 'listrik', 'nominal' => 2450000, 'keterangan' => 'Tagihan listrik toko, lampu etalase, dan AC supermarket'],
            ['jenis_pengeluaran' => 'listrik', 'nominal' => 1800000, 'keterangan' => 'Listrik operasional freezer dan showcase pendingin minuman'],
            ['jenis_pengeluaran' => 'sewa', 'nominal' => 20000000, 'keterangan' => 'Biaya perpanjangan sewa ruko toko DailyCarts semester ini'],
            ['jenis_pengeluaran' => 'gaji', 'nominal' => 4500000, 'keterangan' => 'Gaji bulanan kasir dan pramuniaga toko'],
            ['jenis_pengeluaran' => 'gaji', 'nominal' => 3500000, 'keterangan' => 'Gaji kurir layanan pesan antar DailyCarts'],
            ['jenis_pengeluaran' => 'operasional', 'nominal' => 450000, 'keterangan' => 'Pembelian roll kertas struk thermal printer kasir dan kantong belanja ramah lingkungan'],
            ['jenis_pengeluaran' => 'operasional', 'nominal' => 550000, 'keterangan' => 'Bahan bakar bensin motor delivery kurir toko'],
            ['jenis_pengeluaran' => 'operasional', 'nominal' => 750000, 'keterangan' => 'Perawatan rutin barcode scanner dan komputer kasir'],
            ['jenis_pengeluaran' => 'operasional', 'nominal' => 600000, 'keterangan' => 'Tagihan langganan internet Wi-Fi dan sistem Cloud POS toko'],
        ];

        foreach ($pengeluaranList as $item) {
            PengeluaranOperasional::create([
                'id_pengguna' => fake()->randomElement($adminIds),
                'tanggal_pengeluaran' => fake()->dateTimeBetween('-2 months', 'now')->format('Y-m-d'),
                'jenis_pengeluaran' => $item['jenis_pengeluaran'],
                'nominal' => $item['nominal'],
                'keterangan' => $item['keterangan'],
            ]);
        }

        // Tambah 10 pengeluaran acak dengan factory
        for ($i = 0; $i < 10; $i++) {
            PengeluaranOperasional::factory()->create([
                'id_pengguna' => fake()->randomElement($adminIds),
            ]);
        }
    }
}
