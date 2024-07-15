<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TaikhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tai_khoans')->insert(
            [
                [
                    'ho_va_ten' => 'Đặng Hồng Vinh',
                    'ten_dang_nhap' => 'Vinhdh88',
                    'mat_khau' => '123456789',
                    'email' => 'vinhd768@gmail.com',
                    'so_dien_thoai' => '0868215098',
                    'dia_chi' => 'Nam Từ Liêm, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Nguyễn Thiện Giáp',
                    'ten_dang_nhap' => 'Giapnt66',
                    'mat_khau' => '123456789',
                    'email' => 'giapnt768@gmail.com',
                    'so_dien_thoai' => '0868888888',
                    'dia_chi' => 'Nam Từ Liêm, Hà Nội',
                    'vai_tro' => 1,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Nguyễn Văn An',
                    'ten_dang_nhap' => 'nguyenvana123',
                    'mat_khau' => 'password123',
                    'email' => 'nguyenvana@gmail.com',
                    'so_dien_thoai' => '0912345678',
                    'dia_chi' => 'Ba Đình, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Trần Thị Bích',
                    'ten_dang_nhap' => 'tranthibich',
                    'mat_khau' => 'password456',
                    'email' => 'tranthibich@gmail.com',
                    'so_dien_thoai' => '0987654321',
                    'dia_chi' => 'Cầu Giấy, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Lê Văn Cường',
                    'ten_dang_nhap' => 'levancuong',
                    'mat_khau' => 'password789',
                    'email' => 'levancuong@gmail.com',
                    'so_dien_thoai' => '0934567890',
                    'dia_chi' => 'Hoàn Kiếm, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Phạm Thị Duyên',
                    'ten_dang_nhap' => 'phamthiduyen',
                    'mat_khau' => 'password101',
                    'email' => 'phamthiduyen@gmail.com',
                    'so_dien_thoai' => '0923456789',
                    'dia_chi' => 'Đống Đa, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Hoàng Văn Em',
                    'ten_dang_nhap' => 'hoangvanem',
                    'mat_khau' =>'password202',
                    'email' => 'hoangvanem@gmail.com',
                    'so_dien_thoai' => '0912345678',
                    'dia_chi' => 'Hai Bà Trưng, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Vũ Thị Phương',
                    'ten_dang_nhap' => 'vuthiphuong',
                    'mat_khau' => 'password303',
                    'email' => 'vuthiphuong@gmail.com',
                    'so_dien_thoai' => '0987654321',
                    'dia_chi' => 'Hà Đông, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Đỗ Văn Giang',
                    'ten_dang_nhap' => 'dovangiang',
                    'mat_khau' => 'password404',
                    'email' => 'dovangiang@gmail.com',
                    'so_dien_thoai' => '0934567890',
                    'dia_chi' => 'Tây Hồ, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Nguyễn Thị Hiền',
                    'ten_dang_nhap' => 'nguyenthihien',
                    'mat_khau' => 'password505',
                    'email' => 'nguyenthihien@gmail.com',
                    'so_dien_thoai' => '0923456789',
                    'dia_chi' => 'Thanh Xuân, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
                [
                    'ho_va_ten' => 'Phan Văn Hùng',
                    'ten_dang_nhap' => 'phanvanhung',
                    'mat_khau' => 'password606',
                    'email' => 'phanvanhung@gmail.com',
                    'so_dien_thoai' => '0912345678',
                    'dia_chi' => 'Long Biên, Hà Nội',
                    'vai_tro' => 0,
                    'trang_thai' => 1
                ],
            ]
          );
    }
}
