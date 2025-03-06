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
            ['kategori_kode' => 'FOOD', 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 'DRINK', 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 'BEAUTY', 'kategori_nama' => 'Kecantikan'],
            ['kategori_kode' => 'HOME', 'kategori_nama' => 'Peralatan Rumah'],
            ['kategori_kode' => 'BABY', 'kategori_nama' => 'Perlengkapan Bayi'],
        ]);
    }
}
