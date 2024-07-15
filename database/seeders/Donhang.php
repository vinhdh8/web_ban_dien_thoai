<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Donhang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('don_hangs')->insert(
           [
            'ten_nguoi_nhan'=>'Vinh',
            'ngay_dat_hang'=>'2024-11-07 00:00:00',
            'dia_chi_nhan'=>'Nam Từ Liêm Hà Nội',
            'so_dien_thoai'=>'0868215098',
            'phuong_thuc_thanh_toan'=>'1',
            'trang_thai'=>'1',
            'thanh_toan'=>'1',
            'tai_khoan_id'=>'1'
           ]
         );
    }
}
