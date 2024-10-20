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
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'PKN',
                'kategori_nama' => 'Pakaian',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KDN',
                'kategori_nama' => 'Kendaraan',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'FNB',
                'kategori_nama' => 'Food & Beverages',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'GDT',
                'kategori_nama' => 'Gadget',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'HNB',
                'kategori_nama' => 'Health & Beauty',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
