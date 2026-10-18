<?php

namespace Database\Factories;

use App\Models\Pengguna;
use App\Models\Pengiriman;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pengiriman>
 */
class PengirimanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_penjualan' => TransaksiPenjualan::factory(),
            'id_kurir' => Pengguna::factory(),
            'alamat_tujuan' => fake()->address(),
            'nomor_resi' => 'RESI-'.fake()->unique()->regexify('[A-Z0-9]{10}'),
            'tanggal_kirim' => fake()->dateTimeBetween('-1 month', 'now'),
            'status_pengiriman' => fake()->randomElement(['diproses', 'dikirim', 'terkirim', 'gagal']),
        ];
    }
}
