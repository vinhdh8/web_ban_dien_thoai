<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){
        $listsanpham = SanPham::all();
        $sanphamHot = SanPham::limit(12)->get();
        $listBanner= Banner::with('sanPham')->get();
        return view('client.index', compact('listsanpham', 'sanphamHot', 'listBanner'));
    }
    
    public function allSanPham(){
        $listsanpham = SanPham::paginate(6); // Phân trang với 16 sản phẩm mỗi trang    
        return view('client.sanpham.allsanpham',compact('listsanpham'));
    }

    public function detailSanPham($id){
        $sanpham= SanPham::query()->findOrFail($id);
        return view('client.sanpham.chitietsanpham', compact('sanpham'));
    }
}
