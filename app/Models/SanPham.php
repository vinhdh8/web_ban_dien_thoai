<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_san_pham',
        'gia',
        'hinh_anh',
        'so_luong',
        'mo_ta',
        'danh_muc_id',
        'gia_khuyen_mai'
    ];
    

    public function getAll(){
        $san_pham = DB::table('san_phams')
        ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
        ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
        ->orderBy('san_phams.id', 'ASC')->paginate(5);
        return $san_pham;
    }

    public function danhMuc(){
        return $this->belongsTo(DanhMuc::class);
    }

    public function banners()
    {
        return $this->hasMany(Banner::class, 'san_pham_id'); // Specify the foreign key
    }

}
