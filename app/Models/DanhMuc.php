<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;

    protected $fillable= [
        'ten_danh_muc'
    ];

    public function getAll(){
        $danh_muc = DB::table('danh_mucs')
        ->select('danh_mucs.*')
        ->orderBy('danh_mucs.id', 'ASC')
        ->get();
        return $danh_muc;
    }

    public function sanphams()
    {
        return $this->hasMany(SanPham::class, 'danh_muc_id'); // hàm tính số sản phẩm trong danh mục
    }
    //Sử dụng model
    // public function addDanhMuc($ten_danh_muc){
    //       return DB::table('danh_mucs')
    //       ->insert([
    //         'ten_danh_muc' => $ten_danh_muc,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //       ]);
    // }
    //c1
    // public function deleteDanhMuc($id){
    //     return DB::table('danh_mucs')
    //         ->where('id', $id)
    //         ->delete();
    // }
}
