<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;
    protected $fillable = ['san_pham_id', 'user_id', 'noi_dung', 'ngay_binh_luan','trang_thai','created_at', 'updated_at'];

    protected $table = 'binh_luans';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }

}
