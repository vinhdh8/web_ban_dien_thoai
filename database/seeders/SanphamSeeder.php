<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('san_phams')->insert(
            [
                [
                    'ten_san_pham' => 'Iphone 15',
                    'gia' => '15000000',
                    'hinh_anh' => '1.jpg',
                    'so_luong' => '10',
                    'mo_ta' => 'Qua chat luong',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Samsung Galaxy S23',
                    'gia' => '20000000',
                    'hinh_anh' => '2.jpg',
                    'so_luong' => '15',
                    'mo_ta' => 'Màn hình đẹp',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Oppo Find X3',
                    'gia' => '18000000',
                    'hinh_anh' => '3.jpg',
                    'so_luong' => '20',
                    'mo_ta' => 'Camera ấn tượng',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Redmi Note 10',
                    'gia' => '12000000',
                    'hinh_anh' => '4.jpg',
                    'so_luong' => '25',
                    'mo_ta' => 'Giá cả phải chăng',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Xiaomi Mi 11',
                    'gia' => '17000000',
                    'hinh_anh' => '5.jpg',
                    'so_luong' => '30',
                    'mo_ta' => 'Hiệu năng mạnh mẽ',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Vertu Signature S',
                    'gia' => '80000000',
                    'hinh_anh' => '6.jpg',
                    'so_luong' => '5',
                    'mo_ta' => 'Sang trọng và đẳng cấp',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Iphone 14',
                    'gia' => '14000000',
                    'hinh_anh' => '7.jpg',
                    'so_luong' => '12',
                    'mo_ta' => 'Công nghệ tiên tiến',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Samsung Galaxy S22',
                    'gia' => '19000000',
                    'hinh_anh' => '8.jpg',
                    'so_luong' => '18',
                    'mo_ta' => 'Thiết kế hiện đại',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Oppo Reno6',
                    'gia' => '16000000',
                    'hinh_anh' => '9.jpg',
                    'so_luong' => '22',
                    'mo_ta' => 'Hiệu suất tốt',
                    'danh_muc_id' => '1'
                ],
                [
                    'ten_san_pham' => 'Redmi Note 9',
                    'gia' => '11000000',
                    'hinh_anh' => '10.jpg',
                    'so_luong' => '28',
                    'mo_ta' => 'Pin lâu',
                    'danh_muc_id' => '1'
                ],
            ]
         );
    }
}
