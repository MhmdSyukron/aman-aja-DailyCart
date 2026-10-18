<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hargaBeli = fake()->numberBetween(10, 300) * 1000;
        $hargaJual = $hargaBeli + (fake()->numberBetween(3, 80) * 1000);

        return [
            'id_kategori' => Kategori::factory(),
            'nama_produk' => fake()->randomElement([
                'Sabun Mandi Wangi', 'Deterjen Cair Matic', 'Biskuit Cokelat Renyah',
                'Minyak Goreng Pouch 1L', 'Beras Pulen 2.5kg', 'Kaos Polos Katun',
                'Kabel Charger Type-C', 'Botol Minum Olahraga', 'Tisu Wajah 250s',
                'Sikat Gigi Soft', 'Cemilan Keripik Kentang', 'Pembersih Kaca Spray',
            ]).' '.fake()->unique()->numerify('DC-###'),
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'stok' => fake()->numberBetween(20, 150),
            'stok_minimum' => fake()->numberBetween(5, 15),
            'deskripsi' => 'Produk belanja harian berkualitas di toko DailyCarts.',
        ];
    }
}
