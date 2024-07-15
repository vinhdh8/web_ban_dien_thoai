<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Banner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert(
            [
            'san_pham_id'=>1,
            'hinh_anh'=>'1.jpg',
            'ngay_dang'=>'2024-11-07 00:00:00',
            ]
          );
    }
}
