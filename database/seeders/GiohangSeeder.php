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
                    'san_pham_id' => 27,
                    'so_luong' => 2,
                    'thanh_tien' => 30000000
                ],
                [
                    'tai_khoan_id' => 12,
                    'san_pham_id' => 28,
                    'so_luong' => 1,
                    'thanh_tien' => 20000000
                ],
                [
                    'tai_khoan_id' => 13,
                    'san_pham_id' => 29,
                    'so_luong' => 3,
                    'thanh_tien' => 54000000
                ],
                [
                    'tai_khoan_id' => 14,
                    'san_pham_id' => 30,
                    'so_luong' => 1,
                    'thanh_tien' => 12000000
                ],
                [
                    'tai_khoan_id' => 15,
                    'san_pham_id' => 31,
                    'so_luong' => 2,
                    'thanh_tien' => 34000000
                ],
                [
                    'tai_khoan_id' => 16,
                    'san_pham_id' => 32,
                    'so_luong' => 4,
                    'thanh_tien' => 320000000
                ],
                [
                    'tai_khoan_id' => 17,
                    'san_pham_id' => 33,
                    'so_luong' => 1,
                    'thanh_tien' => 14000000
                ],
                [
                    'tai_khoan_id' => 18,
                    'san_pham_id' => 34,
                    'so_luong' => 2,
                    'thanh_tien' => 38000000
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 35,
                    'so_luong' => 3,
                    'thanh_tien' => 48000000
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 36,
                    'so_luong' => 2,
                    'thanh_tien' => 22000000
                ]
            ],
         );
    }
}
