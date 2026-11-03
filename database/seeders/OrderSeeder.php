<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Matikan log query agar hemat memori RAM
        DB::disableQueryLog();

        // 2. Ambil ID pengguna & promo yang sudah ada di database
        $pelangganIds = Pengguna::where('peran', 'pelanggan')->pluck('id_pengguna')->all();
        if (empty($pelangganIds)) {
            $pelangganIds = Pengguna::pluck('id_pengguna')->all();
        }

        $kasirIds = Pengguna::whereIn('peran', ['kasir', 'admin'])->pluck('id_pengguna')->all();
        if (empty($kasirIds)) {
            $kasirIds = Pengguna::pluck('id_pengguna')->all();
        }

        $promoIds = Promo::where('status_aktif', 'aktif')->pluck('id_promo')->all();

        if (empty($pelangganIds)) {
            $this->command->error('Data pengguna masih kosong! Harap isi data pengguna terlebih dahulu.');
            return;
        }

        $totalData = 100000; // 100.000 data
        $chunkSize = 2500;   // Insert 2.500 baris per query
        $totalChunks = (int) ($totalData / $chunkSize);

        $statuses = ['selesai', 'selesai', 'selesai', 'proses', 'batal'];

        $this->command->info("Memulai seeding 100.000 data ke tabel 'orders'...");
        $bar = $this->command->getOutput()->createProgressBar($totalData);
        $bar->start();

        $faker = \Faker\Factory::create('id_ID');
        $counter = 1;

        for ($chunk = 0; $chunk < $totalChunks; $chunk++) {
            $batchData = [];

            for ($i = 0; $i < $chunkSize; $i++) {
                $batchData[] = [
                    'nomor_transaksi'   => 'ORD-' . date('Ymd') . '-' . str_pad($counter, 7, '0', STR_PAD_LEFT),
                    'tanggal_penjualan' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
                    'id_pelanggan'      => $pelangganIds[array_rand($pelangganIds)],
                    'id_kasir'          => !empty($kasirIds) ? $kasirIds[array_rand($kasirIds)] : null,
                    'id_promo'          => (!empty($promoIds) && rand(1, 100) <= 25) ? $promoIds[array_rand($promoIds)] : null,
                    'total_pembayaran'  => (string) (rand(5, 200) * 25000),
                    'status_transaksi'  => $statuses[array_rand($statuses)],
                ];

                $counter++;
            }

            // Insert langsung ke tabel orders
            DB::table('orders')->insert($batchData);

            unset($batchData);
            $bar->advance($chunkSize);
        }

        $bar->finish();
        $this->command->newLine();
        $this->command->info("Selesai! 100.000 data dummy berhasil dimasukkan ke tabel 'orders'.");
    }
}