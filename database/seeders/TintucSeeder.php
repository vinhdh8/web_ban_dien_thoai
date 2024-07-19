<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TintucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tin_tucs')->insert(
            [
                [
                    'hinh_anh' => '1.jpg',
                    'ngay_dang' => '2024-11-07 00:00:00',
                    'noi_dung' => 'Sự kiện liên quan đến công nghệ hiện đại diễn ra vào tháng 11 năm 2024. Các chuyên gia hàng đầu sẽ thảo luận về những phát triển mới nhất trong lĩnh vực trí tuệ nhân tạo.',
                    'user_id' => 1
                ],
                [
                    'hinh_anh' => '2.jpg',
                    'ngay_dang' => '2024-11-08 00:00:00',
                    'noi_dung' => 'Hội thảo về sự phát triển của 5G và ảnh hưởng của nó đến các lĩnh vực khác.',
                    'user_id' => 2
                ],
                [
                    'hinh_anh' => '3.jpg',
                    'ngay_dang' => '2024-11-09 00:00:00',
                    'noi_dung' => 'Cuộc thi lập trình dành cho sinh viên với nhiều phần thưởng hấp dẫn.',
                    'user_id' => 3
                ],
                [
                    'hinh_anh' => '4.jpg',
                    'ngay_dang' => '2024-11-10 00:00:00',
                    'noi_dung' => 'Triển lãm công nghệ hàng năm với sự tham gia của nhiều công ty lớn.',
                    'user_id' => 1
                ],
                [
                    'hinh_anh' => '5.jpg',
                    'ngay_dang' => '2024-11-11 00:00:00',
                    'noi_dung' => 'Chương trình đào tạo về phát triển ứng dụng di động.',
                    'user_id' => 2
                ],
                [
                    'hinh_anh' => '6.jpg',
                    'ngay_dang' => '2024-11-12 00:00:00',
                    'noi_dung' => 'Hội nghị thảo luận về bảo mật thông tin trong kỷ nguyên số.',
                    'user_id' => 3
                ],
                [
                    'hinh_anh' => '7.jpg',
                    'ngay_dang' => '2024-11-13 00:00:00',
                    'noi_dung' => 'Chương trình khởi nghiệp công nghệ cho thanh niên.',
                    'user_id' => 1
                ],
                [
                    'hinh_anh' => '8.jpg',
                    'ngay_dang' => '2024-11-14 00:00:00',
                    'noi_dung' => 'Diễn đàn công nghệ xanh và phát triển bền vững.',
                    'user_id' => 2
                ],
                [
                    'hinh_anh' => '9.jpg',
                    'ngay_dang' => '2024-11-15 00:00:00',
                    'noi_dung' => 'Khóa học miễn phí về trí tuệ nhân tạo và máy học.',
                    'user_id' => 3
                ],
                [
                    'hinh_anh' => '10.jpg',
                    'ngay_dang' => '2024-11-16 00:00:00',
                    'noi_dung' => 'Cuộc thi phát triển sản phẩm công nghệ sáng tạo.',
                    'user_id' => 1
                ]
            ]
          );
    }
}
