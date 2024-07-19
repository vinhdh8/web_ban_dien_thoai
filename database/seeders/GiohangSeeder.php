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
                    'user_id' => 1,
                    'san_pham_id' => 1,
                    'so_luong' => 1,
                    'thanh_tien' => 80000000
                ],
                [
                    'user_id' => 2,
                    'san_pham_id' => 2,
                    'so_luong' => 1,
                    'thanh_tien' => 14000000
                ],
                [
                    'user_id' => 3,
                    'san_pham_id' => 3,
                    'so_luong' => 1,
                    'thanh_tien' => 19000000
                ],
                [
                    'user_id' => 1,
                    'san_pham_id' => 4,
                    'so_luong' => 1,
                    'thanh_tien' => 16000000
                ],
                [
                    'user_id' => 2,
                    'san_pham_id' => 5,
                    'so_luong' => 1,
                    'thanh_tien' => 11000000
                ],
                [
                    'user_id' => 3,
                    'san_pham_id' => 6,
                    'so_luong' => 1,
                    'thanh_tien' => 15000000
                ],
                [
                    'user_id' => 1,
                    'san_pham_id' => 7,
                    'so_luong' => 1,
                    'thanh_tien' => 20000000
                ],
                [
                    'user_id' => 2,
                    'san_pham_id' => 8,
                    'so_luong' => 1,
                    'thanh_tien' => 18000000
                ],
                [
                    'user_id' => 3,
                    'san_pham_id' => 9,
                    'so_luong' => 1,
                    'thanh_tien' => 12000000
                ],
                [
                    'user_id' => 1,
                    'san_pham_id' => 10,
                    'so_luong' => 1,
                    'thanh_tien' => 17000000
                ]
            ],
         );
    }
}
