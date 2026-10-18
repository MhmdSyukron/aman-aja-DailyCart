<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Kebutuhan Rumah & Kebersihan',
                'deskripsi' => 'Sabun mandi, deterjen pakaian, pembersih lantai, dan sabun cuci piring',
            ],
            [
                'nama_kategori' => 'Makanan & Minuman (F&B)',
                'deskripsi' => 'Snack, biskuit, mie instan, susu, minuman kemasan, dan sembako',
            ],
            [
                'nama_kategori' => 'Pakaian & Fashion',
                'deskripsi' => 'Kaos santai, kemeja, celana, jaket, dan pakaian harian',
            ],
            [
                'nama_kategori' => 'Elektronik & Gadget',
                'deskripsi' => 'Kipas angin, blender, setrika, earphone, kabel charger, dan powerbank',
            ],
            [
                'nama_kategori' => 'Kesehatan & Perawatan Tubuh',
                'deskripsi' => 'Skincare, pasta gigi, sampo, lotion, minyak kayu putih, dan vitamin',
            ],
            [
                'nama_kategori' => 'Peralatan Dapur & Rumah Tangga',
                'deskripsi' => 'Wajan teflon, panci, kotak makan, wadah bumbu, dan botol minum tumbler',
            ],
            [
                'nama_kategori' => 'Alat Tulis & Kantor (ATK)',
                'deskripsi' => 'Buku tulis, pulpen, map, gunting, dan perlengkapan sekolah',
            ],
            [
                'nama_kategori' => 'Ibu & Bayi',
                'deskripsi' => 'Popok bayi, susu formula, minyak telon, dan tisu basah',
            ],
        ];

        foreach ($kategori as $item) {
            Kategori::firstOrCreate(['nama_kategori' => $item['nama_kategori']], $item);
        }
    }
}
