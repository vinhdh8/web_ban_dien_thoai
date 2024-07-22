<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                [
                    'ho_va_ten' => 'Đặng Hồng Vinh',
                    'ten_dang_nhap' => 'Vinhdh8',
                    'password' => Hash::make('123456789'),
                    'email' => 'vinhdh8@gmail.com',
                    'so_dien_thoai' => '0868215097',
                    'dia_chi' => 'Nam Từ Liêm, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 0
                ],
                [
                    'ho_va_ten' => 'Nguyễn Thiện Giáp',
                    'ten_dang_nhap' => 'sunkenvalley',
                    'password' => Hash::make('Thiengiap_2004'),
                    'email' => 'thiengiapnguyen04@gmail.com',
                    'so_dien_thoai' => '0357864779',
                    'dia_chi' => 'Nam Từ Liêm, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 0
                ],
                [
                    'ho_va_ten' => 'Nguyễn Lan Anh',
                    'ten_dang_nhap' => 'lananh',
                    'password' => Hash::make('123456789'),
                    'email' => 'anhttlph34075@fpt.edu.vn',
                    'so_dien_thoai' => '0912345677',
                    'dia_chi' => 'Ba Đình, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 0
                ],
                [
                    'ho_va_ten' => 'Trần Đức Bảo',
                    'ten_dang_nhap' => 'baotd',
                    'password' => Hash::make('123456789'),
                    'email' => 'baotdph31838@fpt.edu.vn',
                    'so_dien_thoai' => '0912345674',
                    'dia_chi' => 'Ba Đình, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 0
                ],
            ]
          );
    }
}
