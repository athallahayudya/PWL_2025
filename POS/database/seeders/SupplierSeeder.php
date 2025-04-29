<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode'  => 'SUP001',
                'supplier_nama'   => 'PT Maju Mundur',
                'supplier_alamat' => 'Jl. Mawar No. 12, Surabaya'
            ],

            [
                'supplier_kode'  => 'SUP002',
                'supplier_nama'   => 'PT Jaya Makmur',
                'supplier_alamat' => 'Jl. Kawi No. 06, Malang'
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
