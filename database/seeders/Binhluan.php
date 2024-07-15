<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Binhluan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('binh_luans')->insert(
            [
            'tai_khoan_id'=>1,
            'san_pham_id'=>1,
            'noi_dung'=>'san pham dep',
            'ngay_binh_luan'=>'2024-11-07 00:00:00', 
            ]
          );
    }
}
