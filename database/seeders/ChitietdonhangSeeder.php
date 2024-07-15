<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChitietdonhangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chi_tiet_don_hangs')->insert(
            [
                [
                    'don_hang_id' => 18,
                    'san_pham_id' => 27,
                    'so_luong' => 2,
                    'dong_gia' => 15000000,
                    'thanh_tien' => 30000000
                ],
                [
                    'don_hang_id' => 19,
                    'san_pham_id' => 28,
                    'so_luong' => 1,
                    'dong_gia' => 20000000,
                    'thanh_tien' => 20000000
                ],
                [
                    'don_hang_id' => 20,
                    'san_pham_id' => 29,
                    'so_luong' => 3,
                    'dong_gia' => 18000000,
                    'thanh_tien' => 54000000
                ],
                // [
                //     'don_hang_id' => 21,
                //     'san_pham_id' => 30,
                //     'so_luong' => 1,
                //     'dong_gia' => 12000000,
                //     'thanh_tien' => 12000000
                // ],
                // [
                //     'don_hang_id' => 22,
                //     'san_pham_id' => 31,
                //     'so_luong' => 2,
                //     'dong_gia' => 17000000,
                //     'thanh_tien' => 34000000
                // ],
                // [
                //     'don_hang_id' => 23,
                //     'san_pham_id' => 32,
                //     'so_luong' => 4,
                //     'dong_gia' => 80000000,
                //     'thanh_tien' => 320000000
                // ],
                // [
                //     'don_hang_id' => 24,
                //     'san_pham_id' => 33,
                //     'so_luong' => 1,
                //     'dong_gia' => 14000000,
                //     'thanh_tien' => 14000000
                // ],
                // [
                //     'don_hang_id' => 25,
                //     'san_pham_id' => 34,
                //     'so_luong' => 2,
                //     'dong_gia' => 19000000,
                //     'thanh_tien' => 38000000
                // ],
                // [
                //     'don_hang_id' => 26,
                //     'san_pham_id' => 35,
                //     'so_luong' => 3,
                //     'dong_gia' => 16000000,
                //     'thanh_tien' => 48000000
                // ],
                // [
                //     'don_hang_id' => 27,
                //     'san_pham_id' => 36,
                //     'so_luong' => 2,
                //     'dong_gia' => 11000000,
                //     'thanh_tien' => 22000000
                // ]
            ]
          );
    }
}
