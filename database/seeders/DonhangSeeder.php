<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DonhangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('don_hangs')->insert(
            [
            [
                'ten_nguoi_nhan' => 'Vinh',
                'ngay_dat_hang' => '2024-11-07 00:00:00',
                'dia_chi_nhan' => 'Nam Từ Liêm, Hà Nội',
                'so_dien_thoai' => '0868215098',
                'phuong_thuc_thanh_toan' => '1',
                'trang_thai' => '1',
                'thanh_toan' => '1',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Nguyen Van An',
                'ngay_dat_hang' => '2024-11-08 00:00:00',
                'dia_chi_nhan' => 'Ba Đình, Hà Nội',
                'so_dien_thoai' => '0912345678',
                'phuong_thuc_thanh_toan' => '2',
                'trang_thai' => '0',
                'thanh_toan' => '0',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Tran Thi Bich',
                'ngay_dat_hang' => '2024-11-09 00:00:00',
                'dia_chi_nhan' => 'Cầu Giấy, Hà Nội',
                'so_dien_thoai' => '0987654321',
                'phuong_thuc_thanh_toan' => '1',
                'trang_thai' => '1',
                'thanh_toan' => '1',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Le Van Cuong',
                'ngay_dat_hang' => '2024-11-10 00:00:00',
                'dia_chi_nhan' => 'Hoàn Kiếm, Hà Nội',
                'so_dien_thoai' => '0934567890',
                'phuong_thuc_thanh_toan' => '2',
                'trang_thai' => '0',
                'thanh_toan' => '0',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Pham Thi Duyen',
                'ngay_dat_hang' => '2024-11-11 00:00:00',
                'dia_chi_nhan' => 'Đống Đa, Hà Nội',
                'so_dien_thoai' => '0923456789',
                'phuong_thuc_thanh_toan' => '1',
                'trang_thai' => '1',
                'thanh_toan' => '1',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Hoang Van Em',
                'ngay_dat_hang' => '2024-11-12 00:00:00',
                'dia_chi_nhan' => 'Hai Bà Trưng, Hà Nội',
                'so_dien_thoai' => '0912345678',
                'phuong_thuc_thanh_toan' => '2',
                'trang_thai' => '0',
                'thanh_toan' => '0',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Vu Thi Phuong',
                'ngay_dat_hang' => '2024-11-13 00:00:00',
                'dia_chi_nhan' => 'Hà Đông, Hà Nội',
                'so_dien_thoai' => '0987654321',
                'phuong_thuc_thanh_toan' => '1',
                'trang_thai' => '1',
                'thanh_toan' => '1',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Do Van Giang',
                'ngay_dat_hang' => '2024-11-14 00:00:00',
                'dia_chi_nhan' => 'Tây Hồ, Hà Nội',
                'so_dien_thoai' => '0934567890',
                'phuong_thuc_thanh_toan' => '2',
                'trang_thai' => '0',
                'thanh_toan' => '0',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Nguyen Thi Hien',
                'ngay_dat_hang' => '2024-11-15 00:00:00',
                'dia_chi_nhan' => 'Thanh Xuân, Hà Nội',
                'so_dien_thoai' => '0923456789',
                'phuong_thuc_thanh_toan' => '1',
                'trang_thai' => '1',
                'thanh_toan' => '1',
                'user_id' => '1'
            ],
            [
                'ten_nguoi_nhan' => 'Phan Van Hung',
                'ngay_dat_hang' => '2024-11-16 00:00:00',
                'dia_chi_nhan' => 'Long Biên, Hà Nội',
                'so_dien_thoai' => '0912345678',
                'phuong_thuc_thanh_toan' => '2',
                'trang_thai' => '0',
                'thanh_toan' => '0',
                'user_id' => '1'
            ]
        ]
         );
    }
}
