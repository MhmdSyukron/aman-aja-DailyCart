<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kategori sudah ada
        if (Kategori::count() === 0) {
            $this->call(KategoriSeeder::class);
        }

        $kategoriMap = Kategori::pluck('id_kategori', 'nama_kategori')->all();

        $produkList = [
            // 1. Kebutuhan Rumah & Kebersihan
            'Kebutuhan Rumah & Kebersihan' => [
                ['nama' => 'Sabun Mandi Cair Lifebuoy Total 10 Refill 450ml', 'beli' => 20000, 'jual' => 26500, 'stok' => 50],
                ['nama' => 'Sabun Cuci Piring Sunlight Jeruk Nipis 750ml', 'beli' => 13500, 'jual' => 17500, 'stok' => 80],
                ['nama' => 'Deterjen Bubuk Rinso Molto Rose Fresh 770g', 'beli' => 19000, 'jual' => 24000, 'stok' => 60],
                ['nama' => 'Pembersih Lantai Wipol Karbol Cemara 780ml', 'beli' => 15000, 'jual' => 19500, 'stok' => 45],
                ['nama' => 'Pasta Gigi Pepsodent Pencegah Gigi Berlubang 190g', 'beli' => 11000, 'jual' => 15000, 'stok' => 75],
                ['nama' => 'Shampoo Pantene Anti Ketombe & Rontok 290ml', 'beli' => 32000, 'jual' => 41000, 'stok' => 40],
            ],

            // 2. Makanan & Minuman (F&B)
            'Makanan & Minuman (F&B)' => [
                ['nama' => 'Minyak Goreng Sania Pouch 2 Liter', 'beli' => 32000, 'jual' => 37500, 'stok' => 100],
                ['nama' => 'Beras Ramos Super Premium 5 Kg', 'beli' => 65000, 'jual' => 75000, 'stok' => 50],
                ['nama' => 'Indomie Mi Goreng Spesial 1 Dus (40 Pcs)', 'beli' => 105000, 'jual' => 120000, 'stok' => 30],
                ['nama' => 'Indomie Kuah Rasa Ayam Bawang 1 Dus (40 Pcs)', 'beli' => 100000, 'jual' => 115000, 'stok' => 30],
                ['nama' => 'Susu UHT Ultra Milk Cokelat 1000ml', 'beli' => 16500, 'jual' => 20500, 'stok' => 60],
                ['nama' => 'Kopi Kapal Api Spesial Mix 1 Renceng (10 Sachet)', 'beli' => 12000, 'jual' => 15500, 'stok' => 85],
                ['nama' => 'Biskuit Roma Kelapa Renyah 300g', 'beli' => 9000, 'jual' => 12500, 'stok' => 70],
                ['nama' => 'Gula Pasir Kristal Gulaku Tebu Murni 1 Kg', 'beli' => 15000, 'jual' => 18000, 'stok' => 90],
            ],

            // 3. Pakaian & Fashion
            'Pakaian & Fashion' => [
                ['nama' => 'Kaos Polos Basic Cotton Combed 30s Hitam (Size L)', 'beli' => 30000, 'jual' => 48000, 'stok' => 40],
                ['nama' => 'Kaos Polos Basic Cotton Combed 30s Putih (Size M)', 'beli' => 30000, 'jual' => 48000, 'stok' => 35],
                ['nama' => 'Kemeja Flannel Pria Lengan Panjang Kotak-Kotak', 'beli' => 75000, 'jual' => 110000, 'stok' => 25],
                ['nama' => 'Celana Chino Slim Fit Pria Abu-Abu (Size 32)', 'beli' => 80000, 'jual' => 125000, 'stok' => 20],
                ['nama' => 'Jaket Hoodie Polos Zipper Fleece Katun Unisex', 'beli' => 90000, 'jual' => 135000, 'stok' => 20],
                ['nama' => 'Daster Santai Rayon Motif Bunga Nyaman', 'beli' => 25000, 'jual' => 39000, 'stok' => 30],
            ],

            // 4. Elektronik & Gadget
            'Elektronik & Gadget' => [
                ['nama' => 'Kipas Angin Meja Miyako Desk Fan 9 Inch', 'beli' => 135000, 'jual' => 175000, 'stok' => 15],
                ['nama' => 'Blender Kaca Philips 2-in-1 Serbaguna 2 Liter', 'beli' => 320000, 'jual' => 395000, 'stok' => 10],
                ['nama' => 'Setrika Listrik Maspion Otomatis Anti Lengket', 'beli' => 95000, 'jual' => 130000, 'stok' => 20],
                ['nama' => 'TWS Earphone Bluetooth Wireless V5.3 Bass Hifi', 'beli' => 65000, 'jual' => 99000, 'stok' => 25],
                ['nama' => 'Powerbank Fast Charging 10.000 mAh Dual USB', 'beli' => 90000, 'jual' => 139000, 'stok' => 20],
                ['nama' => 'Kabel Data Type-C Braided Fast Charging 1.2M', 'beli' => 15000, 'jual' => 29000, 'stok' => 50],
            ],

            // 5. Kesehatan & Perawatan Tubuh
            'Kesehatan & Perawatan Tubuh' => [
                ['nama' => 'Facial Foam Garnier Men Acno Fight 100ml', 'beli' => 25000, 'jual' => 33500, 'stok' => 35],
                ['nama' => 'Serum Wajah Wardah Lightening Ampoule 30ml', 'beli' => 48000, 'jual' => 62000, 'stok' => 25],
                ['nama' => 'Minyak Kayu Putih Cap Lang Asli 120ml', 'beli' => 35000, 'jual' => 45000, 'stok' => 40],
                ['nama' => 'Multivitamin Enervon-C Botol Isi 30 Tablet', 'beli' => 38000, 'jual' => 49000, 'stok' => 30],
                ['nama' => 'Plester Luka Elastis Hansaplast (Box Isi 10 Pcs)', 'beli' => 6000, 'jual' => 9500, 'stok' => 60],
            ],

            // 6. Peralatan Dapur & Rumah Tangga
            'Peralatan Dapur & Rumah Tangga' => [
                ['nama' => 'Wajan Teflon Frypan Anti Lengket Diameter 24cm', 'beli' => 45000, 'jual' => 69000, 'stok' => 25],
                ['nama' => 'Panci Masak Stainless Steel 20cm Tutup Kaca', 'beli' => 55000, 'jual' => 79000, 'stok' => 20],
                ['nama' => 'Kotak Makan Seal Lock 3 Sekat BPA Free 800ml', 'beli' => 18000, 'jual' => 28000, 'stok' => 45],
                ['nama' => 'Botol Minum Tumbler Stainless Steel 500ml', 'beli' => 35000, 'jual' => 55000, 'stok' => 30],
            ],

            // 7. Alat Tulis & Kantor (ATK)
            'Alat Tulis & Kantor (ATK)' => [
                ['nama' => 'Buku Tulis Sinar Dunia 38 Lembar (Pack Isi 10 Buku)', 'beli' => 30000, 'jual' => 40000, 'stok' => 30],
                ['nama' => 'Pulpen Gel Faster 0.5mm Tinta Hitam (Box Isi 12)', 'beli' => 22000, 'jual' => 32000, 'stok' => 35],
                ['nama' => 'Gunting Kertas Serbaguna Gagang Karet Joyko', 'beli' => 7000, 'jual' => 11000, 'stok' => 40],
            ],

            // 8. Ibu & Bayi
            'Ibu & Bayi' => [
                ['nama' => 'Popok Celana Bayi MamyPoko Pants Standar M34', 'beli' => 47000, 'jual' => 58000, 'stok' => 40],
                ['nama' => 'Minyak Telon My Baby Plus Minyak Kayu Putih 150ml', 'beli' => 23000, 'jual' => 30000, 'stok' => 45],
                ['nama' => 'Tisu Basah Bayi Cussons Baby Wipes Fresh 50s', 'beli' => 12000, 'jual' => 17000, 'stok' => 50],
            ],
        ];

        foreach ($produkList as $kategoriNama => $items) {
            $idKategori = $kategoriMap[$kategoriNama] ?? array_values($kategoriMap)[0];

            foreach ($items as $item) {
                Produk::firstOrCreate(
                    ['nama_produk' => $item['nama']],
                    [
                        'id_kategori' => $idKategori,
                        'harga_beli' => $item['beli'],
                        'harga_jual' => $item['jual'],
                        'stok' => $item['stok'],
                        'stok_minimum' => 5,
                        'deskripsi' => 'Produk original berkualitas di DailyCarts - '.$item['nama'],
                    ]
                );
            }
        }
    }
}
