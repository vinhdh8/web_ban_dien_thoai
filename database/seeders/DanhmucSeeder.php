<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DanhmucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('danh_mucs')->insert(
            [
                ['ten_danh_muc' => 'Iphone'],
                ['ten_danh_muc' => 'Samsung'],
                ['ten_danh_muc' => 'Oppo'],
                ['ten_danh_muc' => 'Readme'],
                ['ten_danh_muc' => 'Xiomi'],
                ['ten_danh_muc' => 'Vertu'],
            ]
         );
    }
}
