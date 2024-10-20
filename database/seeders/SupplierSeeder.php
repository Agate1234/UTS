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
                'supplier_id' => 1,
                'supplier_kode' => 'HND',
                'supplier_name' => 'Honda',
                'supplier_alamat' => 'Jakarta',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'NST',
                'supplier_name' => 'Nestle',
                'supplier_alamat' => 'Surabaya',
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'APL',
                'supplier_name' => 'Apple',
                'supplier_alamat' => 'Jakarta',
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
