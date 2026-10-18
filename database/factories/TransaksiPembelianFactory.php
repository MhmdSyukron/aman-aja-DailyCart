<?php

namespace Database\Factories;

use App\Models\Pengguna;
use App\Models\Supplier;
use App\Models\TransaksiPembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TransaksiPembelian>
 */
class TransaksiPembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_transaksi' => 'TB-'.fake()->dateTimeBetween('-6 months', 'now')->format('Ymd').'-'.fake()->unique()->numberBetween(1000, 99999),
            'tanggal_pembelian' => fake()->dateTimeBetween('-6 months', 'now'),
            'id_supplier' => Supplier::factory(),
            'id_pengguna' => Pengguna::factory(),
            'total_biaya' => fake()->numberBetween(10, 500) * 100000,
        ];
    }
}
