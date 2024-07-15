<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;

    public function getAll(){
        $danh_muc = DB::table('danh_mucs')
        ->select('danh_mucs.*')
        ->orderBy('danh_mucs.id', 'DESC')
        ->get();
        return $danh_muc;
    }
}
