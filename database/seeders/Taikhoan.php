<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Taikhoan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tai_khoans')->insert(
            [
            'ho_va_ten'=>'Đặng Hồng Vinh',
            'ten_dang_nhap'=>'link8phut123',
            'mat_khau'=>'123456789',
            'email'=>'vinhd768@gmail.com',
            'so_dien_thoai'=>'0868215098',
            'dia_chi'=>'Nam Từ Liêm, Hà Nội',
            'vai_tro'=>1,
            'trang_thai'=>1
            ]
          );
    }
}
