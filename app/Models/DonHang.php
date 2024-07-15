<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    use HasFactory;

    public function getAll(){
        $don_hang = DB::table('chi_tiet_don_hangs')
        ->join('don_hangs', 'chi_tiet_don_hangs.don_hang_id', '=', 'don_hangs.id')
        ->join('tai_khoans', 'don_hangs.tai_khoan_id', '=', 'tai_khoans.id')
        ->select('don_hangs.id AS id_don_hang', 'don_hangs.tai_khoan_id', 'don_hangs.ten_nguoi_nhan',
        'don_hangs.ngay_dat_hang', 'don_hangs.dia_chi_nhan', 'don_hangs.so_dien_thoai',
        'don_hangs.phuong_thuc_thanh_toan', 'don_hangs.trang_thai', 'don_hangs.thanh_toan',
        DB::raw('SUM(chi_tiet_don_hangs.so_luong) AS chi_tiet_so_luong'),
        DB::raw('SUM(chi_tiet_don_hangs.thanh_tien) AS thanh_tien'),
        'tai_khoans.id AS id_tai_khoan', 'tai_khoans.ho_va_ten', 'tai_khoans.ten_dang_nhap',
        'tai_khoans.mat_khau', 'tai_khoans.email', 'tai_khoans.so_dien_thoai', 'tai_khoans.dia_chi')
        // ->whereIn('don_hangs.trang_thai', '1','2','3')
        ->groupBy('chi_tiet_don_hangs.don_hang_id')
        ->orderBy('id_don_hang', 'DESC')
        ->get();
        return $don_hang;
    }
}
