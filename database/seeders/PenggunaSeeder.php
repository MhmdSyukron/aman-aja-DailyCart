<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '1024M');
        set_time_limit(0);

        $defaultPassword = Hash::make('password');

        // Akun utama per role untuk DailyCarts
        Pengguna::firstOrCreate(
            ['username' => 'pemilik'],
            [
                'nama_lengkap' => 'Bapak Handoko (Owner DailyCarts)',
                'password' => $defaultPassword,
                'peran' => 'pemilik',
                'no_telepon' => '081234567890',
                'alamat' => 'Jl. Kaliurang KM 5, Sleman, Yogyakarta',
            ]
        );

        Pengguna::firstOrCreate(
            ['username' => 'admin'],
            [
                'nama_lengkap' => 'Dewi Lestari (Admin Inventory DailyCarts)',
                'password' => $defaultPassword,
                'peran' => 'admin',
                'no_telepon' => '081234567891',
                'alamat' => 'Jl. Gejayan No. 24, Yogyakarta',
            ]
        );

        Pengguna::firstOrCreate(
            ['username' => 'kasir1'],
            [
                'nama_lengkap' => 'Rian Saputra (Kasir 1)',
                'password' => $defaultPassword,
                'peran' => 'kasir',
                'no_telepon' => '081234567892',
                'alamat' => 'Jl. Kusumanegara No. 15, Yogyakarta',
            ]
        );

        Pengguna::firstOrCreate(
            ['username' => 'kurir1'],
            [
                'nama_lengkap' => 'Budi Santoso (Kurir Delivery DailyCarts)',
                'password' => $defaultPassword,
                'peran' => 'kurir',
                'no_telepon' => '081234567893',
                'alamat' => 'Jl. Magelang KM 3, Yogyakarta',
            ]
        );

        // Tambah staf kasir dan kurir tambahan menggunakan factory
        Pengguna::factory()->count(10)->create(['peran' => 'kasir']);
        Pengguna::factory()->count(10)->create(['peran' => 'kurir']);

        // 100.000 data pelanggan (di-insert secara batch per 2.500 agar selesai dalam beberapa detik dan aman dari memory limit)
        $total = 100000;
        $chunkSize = 2500;

        for ($i = 0; $i < ($total / $chunkSize); $i++) {
            $data = [];
            for ($j = 0; $j < $chunkSize; $j++) {
                $uniqueNum = ($i * $chunkSize) + $j + 1;
                $data[] = [
                    'nama_lengkap' => fake()->name(),
                    'username' => 'user'.$uniqueNum.'_'.fake()->userName(),
                    'password' => $defaultPassword,
                    'peran' => 'pelanggan',
                    'no_telepon' => fake()->phoneNumber(),
                    'alamat' => fake()->address(),
                ];
            }
            Pengguna::insert($data);
        }
    }
}
