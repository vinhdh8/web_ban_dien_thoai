<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function listGioHang(){
        $gioHang = session()->get('cart', []);
        // dd($gioHang);
        $total = 0;
        $subTotal = 0;
        foreach($gioHang as $item){
            $subTotal += $item['gia'] *$item['so_luong'];
        }
        $shipping = 0;
        $total = $subTotal+$shipping;
        return view('client.giohang.giohang', compact('gioHang', 'subTotal', 'shipping', 'total'));
    }
    public function addGioHang(Request $request){
        $sanPhamId = $request->input('sanPhamId');
        $soLuong = $request->input('soLuong');
        $sanPham = SanPham::query()->findOrFail($sanPhamId);
        // Khởi tạo 1 mảng chứa thông tin giỏ hàng trên session
        $gioHang = session()->get('cart', []);
        if(isset($gioHang[$sanPhamId])){
            // Sản phẩm đã tồn tại trong giỏ hàng
            $gioHang[$sanPhamId]['so_luong'] += $soLuong;
        }else{
            // Sản phẩm chưa có
            $gioHang[$sanPhamId] = [
                'ten_san_pham' => $sanPham->ten_san_pham,
                'so_luong' => $soLuong,
                'gia' => ($sanPham->gia_khuyen_mai==0) ? $sanPham->gia : $sanPham->gia_khuyen_mai,
                'hinh_anh' => $sanPham->hinh_anh,
            ];
        }
        session()->put('cart', $gioHang);
        return redirect()->back();
    }
    public function updateGioHang(Request $request){
        $cartNew = $request->input('giohang', []);
        session()->put('cart', $cartNew);
        return redirect()->back();
    }
}