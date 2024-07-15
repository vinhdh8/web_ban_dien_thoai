<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BinhluanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('binh_luans')->insert(
            [
                [
                    'tai_khoan_id' => 11,
                    'san_pham_id' => 52,
                    'noi_dung' => 'Sản phẩm đẹp!',
                    'ngay_binh_luan' => '2024-11-07 00:00:00',
                ],
                [
                    'tai_khoan_id' => 12,
                    'san_pham_id' => 53,
                    'noi_dung' => 'Chất lượng tuyệt vời!',
                    'ngay_binh_luan' => '2024-11-08 00:00:00',
                ],
                [
                    'tai_khoan_id' => 13,
                    'san_pham_id' => 54,
                    'noi_dung' => 'Rất hài lòng với sản phẩm này.',
                    'ngay_binh_luan' => '2024-11-09 00:00:00',
                ],
                [
                    'tai_khoan_id' => 14,
                    'san_pham_id' => 55,
                    'noi_dung' => 'Sản phẩm đáng tiền!',
                    'ngay_binh_luan' => '2024-11-10 00:00:00',
                ],
                [
                    'tai_khoan_id' => 15,
                    'san_pham_id' => 56,
                    'noi_dung' => 'Tôi sẽ mua lại!',
                    'ngay_binh_luan' => '2024-11-11 00:00:00',
                ],
                [
                    'tai_khoan_id' => 16,
                    'san_pham_id' => 57,
                    'noi_dung' => 'Thiết kế rất đẹp.',
                    'ngay_binh_luan' => '2024-11-12 00:00:00',
                ],
                [
                    'tai_khoan_id' => 17,
                    'san_pham_id' => 58,
                    'noi_dung' => 'Mình rất thích sản phẩm này!',
                    'ngay_binh_luan' => '2024-11-13 00:00:00',
                ],
                [
                    'tai_khoan_id' => 18,
                    'san_pham_id' => 59,
                    'noi_dung' => 'Sản phẩm tuyệt vời!',
                    'ngay_binh_luan' => '2024-11-14 00:00:00',
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 60,
                    'noi_dung' => 'Thời gian giao hàng rất nhanh.',
                    'ngay_binh_luan' => '2024-11-15 00:00:00',
                ],
                [
                    'tai_khoan_id' => 19,
                    'san_pham_id' => 61,
                    'noi_dung' => 'Sẽ giới thiệu cho bạn bè.',
                    'ngay_binh_luan' => '2024-11-16 00:00:00',
                ]
            ]
          );
    }
}
