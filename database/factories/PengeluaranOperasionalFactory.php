<?php

namespace Database\Factories;

use App\Models\PengeluaranOperasional;
use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PengeluaranOperasional>
 */
class PengeluaranOperasionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengguna' => Pengguna::factory(),
            'tanggal_pengeluaran' => fake()->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
            'jenis_pengeluaran' => fake()->randomElement(['listrik', 'sewa', 'gaji', 'operasional']),
            'nominal' => fake()->numberBetween(1, 50) * 100000,
            'keterangan' => fake()->sentence(6),
        ];
    }
}
