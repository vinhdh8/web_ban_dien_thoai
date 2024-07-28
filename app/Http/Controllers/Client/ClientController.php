<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){
        // $listDanhMuc = Danhmuc::all();
        $listsanpham = SanPham::all();
        $sanphamHot = SanPham::limit(12)->get();
        return view('client.index', compact('listsanpham', 'sanphamHot'));
    }
    
    public function allSanPham(){
        $listDanhMuc = DanhMuc::query()->get();
        $listsanpham = SanPham::paginate(6); // Phân trang với 10 sản phẩm mỗi trang    
        return view('client.sanpham.allsanpham',compact('listsanpham','listDanhMuc'));
    }
}
