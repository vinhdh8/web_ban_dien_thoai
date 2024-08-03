<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Binhluan;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function detailSanPham(string $id){
        $chiTietSanPham = SanPham::query()->findOrFail($id);
        $listSanPham = SanPham::query()->get();
        $binhluans = Binhluan::with('user')->where('san_pham_id', $id)->where('trang_thai', true)->get();
        return view('client.sanpham.chitietsanpham', compact('chiTietSanPham','listSanPham','binhluans'));
    }
}
