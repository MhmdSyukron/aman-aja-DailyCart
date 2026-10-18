<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        $promos = [
            [
                'kode_promo' => 'DAILYCARTS10',
                'nama_promo' => 'Voucher Sambutan Pengguna Baru DailyCarts',
                'potongan' => 15000,
                'tanggal_mulai' => now()->subDays(10)->format('Y-m-d'),
                'tanggal_selesai' => now()->addDays(30)->format('Y-m-d'),
                'status_aktif' => 'aktif',
            ],
            [
                'kode_promo' => 'BELANJAHEMAT',
                'nama_promo' => 'Diskon Belanja Sembako & Kebutuhan Rumah',
                'potongan' => 20000,
                'tanggal_mulai' => now()->subDays(5)->format('Y-m-d'),
                'tanggal_selesai' => now()->addDays(20)->format('Y-m-d'),
                'status_aktif' => 'aktif',
            ],
            [
                'kode_promo' => 'WEEKENDDEAL',
                'nama_promo' => 'Promo Spesial Belanja Akhir Pekan',
                'potongan' => 25000,
                'tanggal_mulai' => now()->startOfWeek()->format('Y-m-d'),
                'tanggal_selesai' => now()->endOfWeek()->format('Y-m-d'),
                'status_aktif' => 'aktif',
            ],
            [
                'kode_promo' => 'MEMBERVIP',
                'nama_promo' => 'Potongan Eksklusif Member Prioritas DailyCarts',
                'potongan' => 50000,
                'tanggal_mulai' => now()->startOfMonth()->format('Y-m-d'),
                'tanggal_selesai' => now()->endOfMonth()->format('Y-m-d'),
                'status_aktif' => 'aktif',
            ],
            [
                'kode_promo' => 'PAYDAYSERU',
                'nama_promo' => 'Promo Gajian Murah Meriah DailyCarts',
                'potongan' => 35000,
                'tanggal_mulai' => now()->subDays(2)->format('Y-m-d'),
                'tanggal_selesai' => now()->addDays(10)->format('Y-m-d'),
                'status_aktif' => 'aktif',
            ],
        ];

        foreach ($promos as $item) {
            Promo::firstOrCreate(['kode_promo' => $item['kode_promo']], $item);
        }

        // Generate 3 promo acak tambahan
        Promo::factory()->count(3)->create();
    }
}
