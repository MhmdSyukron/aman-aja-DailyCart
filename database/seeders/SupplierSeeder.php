<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'nama_supplier' => 'PT Unilever Indonesia Distributor',
                'kontak' => '021-5262112',
                'alamat' => 'BSD City, Tangerang',
                'informasi_pemasok' => 'Pemasok resmi sabun, sampo, deterjen, dan produk personal care',
            ],
            [
                'nama_supplier' => 'PT Indofood CBP Sukses Makmur',
                'kontak' => '021-57958822',
                'alamat' => 'Sudirman Plaza, Jakarta Selatan',
                'informasi_pemasok' => 'Pemasok mie instan, biskuit, snack, dan bumbu dapur',
            ],
            [
                'nama_supplier' => 'PT Wings Surya Kencana',
                'kontak' => '031-8438281',
                'alamat' => 'Jl. Kalisosok Kidul, Surabaya',
                'informasi_pemasok' => 'Pemasok sabun cuci piring, deterjen, dan pembersih lantai',
            ],
            [
                'nama_supplier' => 'PT Mayora Indah Retail',
                'kontak' => '021-80637000',
                'alamat' => 'Jl. Tomang Raya, Jakarta Barat',
                'informasi_pemasok' => 'Pemasok kopi instan, permen, biskuit, dan sereal',
            ],
            [
                'nama_supplier' => 'CV Mitra Elektronik Nusantara',
                'kontak' => '021-6598822',
                'alamat' => 'Mangga Dua Mall Blok C, Jakarta Pusat',
                'informasi_pemasok' => 'Pemasok kipas angin, blender, kabel USB, dan alat elektronik',
            ],
            [
                'nama_supplier' => 'PT Prima Garment Textile',
                'kontak' => '022-7561234',
                'alamat' => 'Kawasan Industri Majalaya, Bandung',
                'informasi_pemasok' => 'Konveksi & pemasok kaos polos, kemeja, dan pakaian santai',
            ],
        ];

        foreach ($suppliers as $item) {
            Supplier::firstOrCreate(['nama_supplier' => $item['nama_supplier']], $item);
        }

        // Tambah 4 supplier acak
        Supplier::factory()->count(4)->create();
    }
}
