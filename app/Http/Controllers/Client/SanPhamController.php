<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function detailSanPham(string $id){
        $chiTietSanPham = SanPham::query()->findOrFail($id);
        $listSanPham = SanPham::query()->get();
        return view('client.sanpham.chitietsanpham', compact('chiTietSanPham','listSanPham'));
    }
}
