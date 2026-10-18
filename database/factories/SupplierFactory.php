<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_supplier' => fake()->randomElement(['PT ', 'CV ']).fake()->company().' '.fake()->randomElement(['Distrindo', 'Retailindo', 'Grosir', 'Logistik']),
            'kontak' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'informasi_pemasok' => 'Pemasok barang dagangan kategori '.fake()->randomElement(['kebutuhan harian', 'makanan kemasan', 'pakaian jadi', 'peralatan rumah tangga', 'elektronik mini']),
        ];
    }
}
