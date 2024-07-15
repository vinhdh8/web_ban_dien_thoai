<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Chitietdonhang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chi_tiet_don_hangs')->insert(
            [
             'don_hang_id'=>'1',
             'san_pham_id'=>'1',
             'so_luong'=>'2',
             'dong_gia'=>'1500000',
             'thanh_tien'=>'3000000'
            ]
          );
    }
}
