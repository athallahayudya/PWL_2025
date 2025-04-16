<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            ['kategori_id' => 1, 'kategori_kode' => 'FOOD', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 2, 'kategori_kode' => 'DRINK', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_kode' => 'BEAUTY', 'kategori_nama' => 'Kecantikan'],
            ['kategori_id' => 4, 'kategori_kode' => 'HOME', 'kategori_nama' => 'Peralatan Rumah'],
            ['kategori_id' => 5, 'kategori_kode' => 'BABY', 'kategori_nama' => 'Perlengkapan Bayi'],
         ]);   
    }
}
