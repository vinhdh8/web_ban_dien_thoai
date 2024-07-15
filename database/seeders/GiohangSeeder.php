<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GiohangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('gio_hangs')->insert(
            [
                [
                    'tai_khoan_id' => 11,
                    'san_pham_id' => 52,
                    'so_luong' => 1,
                    'thanh_tien' => 80000000
                ],
                [
                    'tai_khoan_id' => 12,
                    'san_pham_id' => 53,
                    'so_luong' => 1,
                    'thanh_tien' => 14000000
                ],
                [
                    'tai_khoan_id' => 13,
                    'san_pham_id' => 54,
                    'so_luong' => 1,
                    'thanh_tien' => 19000000
                ],
                [
                    'tai_khoan_id' => 14,
                    'san_pham_id' => 55,
                    'so_luong' => 1,
                    'thanh_tien' => 16000000
                ],
                [
                    'tai_khoan_id' => 15,
                    'san_pham_id' => 56,
                    'so_luong' => 1,
                    'thanh_tien' => 11000000
                ],
                [
                    'tai_khoan_id' => 16,
                    'san_pham_id' => 57,
                    'so_luong' => 1,
                    'thanh_tien' => 15000000
                ],
                [
                    'tai_khoan_id' => 17,
                    'san_pham_id' => 58,
                    'so_luong' => 1,
                    'thanh_tien' => 20000000
                ],
                [
                    'tai_khoan_id' => 18,
                    'san_pham_id' => 59,
                    'so_luong' => 1,
                    'thanh_tien' => 18000000
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 60,
                    'so_luong' => 1,
                    'thanh_tien' => 12000000
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 61,
                    'so_luong' => 1,
                    'thanh_tien' => 17000000
                ]
            ],
         );
    }
}
