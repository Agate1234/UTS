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
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Fahmi',
                'penjualan_kode' => 'KD_1',
                'penjualan_tanggal' => '2024-11-01',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 2,
                'pembeli' => 'Faiz',
                'penjualan_kode' => 'KD_2',
                'penjualan_tanggal' => '2024-11-01',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 1,
                'pembeli' => 'Ian',
                'penjualan_kode' => 'KD_3',
                'penjualan_tanggal' => '2024-11-01',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Rio',
                'penjualan_kode' => 'KD_4',
                'penjualan_tanggal' => '2024-11-02',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli' => 'Alex',
                'penjualan_kode' => 'KD_5',
                'penjualan_tanggal' => '2024-11-02',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Hasan',
                'penjualan_kode' => 'KD_6',
                'penjualan_tanggal' => '2024-11-03',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 2,
                'pembeli' => 'Abi',
                'penjualan_kode' => 'KD_7',
                'penjualan_tanggal' => '2024-11-03',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Abiyu',
                'penjualan_kode' => 'KD_8',
                'penjualan_tanggal' => '2024-11-03',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Fabian',
                'penjualan_kode' => 'KD_9',
                'penjualan_tanggal' => '2024-11-03',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Atha',
                'penjualan_kode' => 'KD_10',
                'penjualan_tanggal' => '2024-11-04',
            ]
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
