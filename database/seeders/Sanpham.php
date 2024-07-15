<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Sanpham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('san_phams')->insert(
            [
               'ten_san_pham'=> 'Iphone 15',
               'gia'=>'15000000',
               'hinh_anh'=>'1.jpg',
               'so_luong'=>'10',
               'mo_ta'=>'qua chat luong',
               'danh_muc_id'=>'1'
            ]
         );
    }
}
