<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHang extends Model
{
    use HasFactory;

    // public function getAll(){
    //     $don_hang = DB::table('chi_tiet_don_hangs')
    //     ->join('don_hangs', 'chi_tiet_don_hangs.don_hang_id', '=', 'don_hangs.id')
    //     ->join('users', 'don_hangs.user_id', '=', 'users.id')
    //     ->select('don_hangs.id AS id_don_hang', 'don_hangs.user_id', 'don_hangs.ten_nguoi_nhan',
    //     'don_hangs.ngay_dat_hang', 'don_hangs.dia_chi_nhan', 'don_hangs.so_dien_thoai',
    //     'don_hangs.phuong_thuc_thanh_toan', 'don_hangs.trang_thai', 'don_hangs.thanh_toan',
    //     DB::raw('SUM(chi_tiet_don_hangs.so_luong) AS chi_tiet_so_luong'),
    //     DB::raw('SUM(chi_tiet_don_hangs.thanh_tien) AS thanh_tien'),
    //     'users.id AS id_tai_khoan', 'users.ho_va_ten', 'users.ten_dang_nhap',
    //     'users.password', 'users.email', 'users.so_dien_thoai', 'users.dia_chi')
    //     // ->whereIn('don_hangs.trang_thai', '1','2','3')
    //     ->groupBy('chi_tiet_don_hangs.don_hang_id')
    //     ->orderBy('id_don_hang', 'DESC')
    //     ->get();
    //     return $don_hang;
    // }

    const TRANG_THAI_DON_HANG = [
        'cho_xac_nhan' => 'Chờ xác nhận',
        'da_xac_nhan'=> 'Đã xác nhận',
        'dang_chuan_bi'=> 'Đang chuẩn bị',
        'dang_van_chuyen'=> 'Đang vận chuyển',
        'da_giao_hang'=> 'Đã giao hàng',
        'huy_don_hang'=> 'Đã hủy đơn',
    ];

    const TRANG_THAI_THANH_TOAN = [
        'chua_thanh_toan' => 'Chưa thanh toán',
        'da_thanh_toan'=> 'Đã thanh toán',
    ];

    const CHO_XAC_NHAN = 'cho_xac_nhan';

    const DA_XAC_NHAN = 'da_xac_nhan';

    const DANG_CHUAN_BI = 'dang_chuan_bi';

    const DANG_VAN_CHUYEN = 'dang_van_chuyen';

    const DA_GIAO_HANG = 'da_giao_hang';

    const HUY_DON_HANG = 'huy_don_hang';

    const CHUA_THANH_TOAN = 'chua_thanh_toan';

    const DA_THANH_TOAN = 'da_thanh_toan';

    protected $fillable = [
        'ma_don_hang',
        'ten_nguoi_nhan',
        'dia_chi_nhan',
        'email_nguoi_nhan',
        'so_dien_thoai',
        'trang_thai',
        'thanh_toan',
        'tien_hang',
        'tien_ship',
        'tong_tien',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chiTietDonHang(){
        return $this->hasMany(ChiTietDonHang::class);
    }
}
