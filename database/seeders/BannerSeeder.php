<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert(
            [
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '1.jpg',
                    'ngay_dang' => '2024-11-07 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '2.jpg',
                    'ngay_dang' => '2024-11-08 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '3.jpg',
                    'ngay_dang' => '2024-11-09 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '4.jpg',
                    'ngay_dang' => '2024-11-10 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '5.jpg',
                    'ngay_dang' => '2024-11-11 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '6.jpg',
                    'ngay_dang' => '2024-11-12 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '7.jpg',
                    'ngay_dang' => '2024-11-13 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '8.jpg',
                    'ngay_dang' => '2024-11-14 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '9.jpg',
                    'ngay_dang' => '2024-11-15 00:00:00',
                ],
                [
                    'san_pham_id' => 1,
                    'hinh_anh' => '10.jpg',
                    'ngay_dang' => '2024-11-16 00:00:00',
                ],
            ]
          );
    }
}
