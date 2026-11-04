<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Minuman'],
            ['nama_kategori' => 'Makanan'],
        ]);

        DB::table('produks')->insert([
            [
                'kategori_id' => 1,
                'nama_produk' => 'Kopi',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'stok' => 100,
            ],
            [
                'kategori_id' => 1,
                'nama_produk' => 'Teh',
                'harga_beli' => 2000,
                'harga_jual' => 4000,
                'stok' => 80,
            ],
            [
                'kategori_id' => 2,
                'nama_produk' => 'Roti',
                'harga_beli' => 4000,
                'harga_jual' => 6000,
                'stok' => 50,
            ],
        ]);
    }
}