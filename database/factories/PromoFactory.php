<?php

namespace Database\Factories;

use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mulai = fake()->dateTimeBetween('-1 month', '+1 month');
        $selesai = (clone $mulai)->modify('+14 days');

        return [
            'kode_promo' => strtoupper(fake()->unique()->lexify('CART???')).fake()->numberBetween(10, 99),
            'nama_promo' => 'Diskon '.fake()->randomElement(['Super Hemat', 'Belanja Cerdas', 'Voucher Kasir', 'Pesta Belanja']),
            'potongan' => fake()->randomElement([10000, 15000, 20000, 30000, 50000]),
            'tanggal_mulai' => $mulai->format('Y-m-d'),
            'tanggal_selesai' => $selesai->format('Y-m-d'),
            'status_aktif' => fake()->randomElement(['aktif', 'aktif', 'nonaktif']),
        ];
    }
}
