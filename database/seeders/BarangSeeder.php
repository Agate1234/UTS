<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 2,
                'barang_kode' => 'CVC',
                'barang_nama' => 'Honda Civic',
                'harga_beli' => 375000000,
                'harga_jual' => 425000000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 2,
                'barang_kode' => 'CRV',
                'barang_nama' => 'Honda CR-V',
                'harga_beli' => 450000000,
                'harga_jual' => 475000000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'PCX',
                'barang_nama' => 'Honda PCX',
                'harga_beli' => 60000000,
                'harga_jual' => 70000000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'CBR',
                'barang_nama' => 'Honda CBR500R',
                'harga_beli' => 160000000,
                'harga_jual' => 170000000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'JZZ',
                'barang_nama' => 'Honda Jazz',
                'harga_beli' => 225000000,
                'harga_jual' => 300000000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'NSC',
                'barang_nama' => 'Nescafe',
                'harga_beli' => 32500,
                'harga_jual' => 40000,
            ],
            [
               'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'KKT',
                'barang_nama' => 'KitKat',
                'harga_beli' => 27000,
                'harga_jual' => 30000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => 'MLO',
                'barang_nama' => 'Milo',
                'harga_beli' => 50000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => 'NST',
                'barang_nama' => 'Nestea Lemon Tea',
                'harga_beli' => 60000,
                'harga_jual' => 65000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 3,
                'barang_kode' => 'NPL',
                'barang_nama' => 'Nestle Pure Life',
                'harga_beli' => 50000,
                'harga_jual' => 52000,
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 4,
                'barang_kode' => 'MCB',
                'barang_nama' => 'MacBook Air M2',
                'harga_beli' => 20000000,
                'harga_jual' => 21000000,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 4,
                'barang_kode' => 'IPD',
                'barang_nama' => 'iPad Pro',
                'harga_beli' => 17800000,
                'harga_jual' => 18000000,
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 4,
                'barang_kode' => 'IPH',
                'barang_nama' => 'Iphone 15 Pro',
                'harga_beli' => 18000000,
                'harga_jual' => 19000000,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 4,
                'barang_kode' => 'AW9',
                'barang_nama' => 'Apple Watch Series 9',
                'harga_beli' => 8000000,
                'harga_jual' => 8500000,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 4,
                'barang_kode' => 'APP',
                'barang_nama' => 'AirPods Pro Gen 2',
                'harga_beli' => 4000000,
                'harga_jual' => 4500000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
