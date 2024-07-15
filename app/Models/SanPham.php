<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    public function getAll(){
        $san_pham = DB::table('san_phams')
        ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
        ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
        ->orderBy('san_phams.id', 'DESC')
        ->get();
        return $san_pham;
    }
}
