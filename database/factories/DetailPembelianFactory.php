<?php

namespace Database\Factories;

use App\Models\DetailPembelian;
use App\Models\Produk;
use App\Models\TransaksiPembelian;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetailPembelian>
 */
class DetailPembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah = fake()->numberBetween(1, 50);
        $harga = fake()->numberBetween(50, 1000) * 1000;

        return [
            'id_pembelian' => TransaksiPembelian::factory(),
            'id_produk' => Produk::factory(),
            'jumlah' => $jumlah,
            'harga_beli_satuan' => $harga,
            'subtotal' => $jumlah * $harga,
        ];
    }
}
