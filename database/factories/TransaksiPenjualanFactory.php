<?php

namespace Database\Factories;

use App\Models\Pengguna;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransaksiPenjualan>
 */
class TransaksiPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_transaksi' => 'PJ-'.fake()->dateTimeBetween('-6 months', 'now')->format('Ymd').'-'.fake()->unique()->numberBetween(1000, 99999),
            'tanggal_penjualan' => fake()->dateTimeBetween('-6 months', 'now'),
            'id_pelanggan' => Pengguna::factory(),
            'id_kasir' => Pengguna::factory(),
            'id_promo' => null,
            'total_pembayaran' => fake()->numberBetween(5, 100) * 50000,
            'status_transaksi' => fake()->randomElement(['selesai', 'selesai', 'selesai', 'proses', 'batal']),
        ];
    }
}
