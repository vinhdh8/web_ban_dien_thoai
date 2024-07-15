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
            'hinh_anh'=>'1.jpg',
            'ngay_dang'=>'2024-11-07 00:00:00',
            'noi_dung'=>'Sự kiện liên quan đến công nghệ hiện đại diễn ra vào tháng 11 năm 2024. Các chuyên gia hàng đầu sẽ thảo luận về những phát triển mới nhất trong lĩnh vực trí tuệ nhân tạo, học máy và Internet of Things.',
            'tai_khoan_id'=>1
            ]
          );
    }
}
