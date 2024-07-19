<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Model
{
    use HasFactory;

    function getAll($vai_tro)
    {
        $tai_khoan = DB::table('users')
        ->select('*');
        if ($vai_tro == 1 || $vai_tro == 0) {
            $tai_khoan
            ->where('vai_tro', $vai_tro)
            ->where('trang_thai', 0);
        }
        return $tai_khoan->orderBy('id', 'asc')->get();
    }
}
