<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Arjo', 'penjualan_kode' => 'TRX001', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Atha', 'penjualan_kode' => 'TRX002', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 3, 'user_id' => 1, 'pembeli' => 'Andi', 'penjualan_kode' => 'TRX003', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Rina', 'penjualan_kode' => 'TRX004', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Miri', 'penjualan_kode' => 'TRX005', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 6, 'user_id' => 1, 'pembeli' => 'Dewi', 'penjualan_kode' => 'TRX006', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Agus', 'penjualan_kode' => 'TRX007', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Lina', 'penjualan_kode' => 'TRX008', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Dayu', 'penjualan_kode' => 'TRX009', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Eka', 'penjualan_kode' => 'TRX010', 'penjualan_tanggal' => now()],
        ]);
    }
}
