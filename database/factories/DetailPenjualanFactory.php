<?php

namespace Database\Factories;

use App\Models\DetailPenjualan;
use App\Models\Produk;
use App\Models\TransaksiPenjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetailPenjualan>
 */
class DetailPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah = fake()->numberBetween(1, 10);
        $harga = fake()->numberBetween(20, 500) * 1000;

        return [
            'id_penjualan' => TransaksiPenjualan::factory(),
            'id_produk' => Produk::factory(),
            'jumlah' => $jumlah,
            'harga_satuan' => $harga,
            'subtotal' => $jumlah * $harga,
        ];
    }
}
