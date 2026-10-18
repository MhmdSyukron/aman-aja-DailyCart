<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Pengguna>
 */
class PenggunaFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => fake()->name(),
            'username' => fake()->unique()->userName().fake()->numberBetween(1, 999999),
            'password' => static::$password ??= Hash::make('password'),
            'peran' => fake()->randomElement(['pemilik', 'admin', 'kasir', 'pelanggan', 'kurir']),
            'no_telepon' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
        ];
    }
}
