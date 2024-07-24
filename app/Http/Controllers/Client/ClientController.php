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
        $listDanhMuc = Danhmuc::all();
        $listsanpham=SanPham::all();
        $sanpham=SanPham::limit(8)->get();
        return view('client.index', ['danhmuc'=>$listDanhMuc,'sanpham'=>$listsanpham,'listsanpham'=>$sanpham]);
    }
    
    public function sanphamclient(){
        $listDanhMuc = Danhmuc::all();
        $listsanpham = SanPham::paginate(6); // Phân trang với 10 sản phẩm mỗi trang    
        return view('client.sanpham.sanpham',['danhmuc'=>$listDanhMuc,'sanpham'=>$listsanpham]);
    }
}
