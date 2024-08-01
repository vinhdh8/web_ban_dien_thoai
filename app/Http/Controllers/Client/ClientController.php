<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Binhluan;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){
        $listDanhMuc = Danhmuc::all();
        $listsanpham = SanPham::all();
        $sanphamHot = SanPham::limit(12)->get();
        $listBanner= Banner::with('sanPham')->get();
        return view('client.index', compact('listsanpham', 'sanphamHot','listDanhMuc', 'listBanner'));
    }
    
    public function allSanPham(){
        $listDanhMuc = DanhMuc::query()->get();
        $listsanpham = SanPham::paginate(6); // Phân trang với 16 sản phẩm mỗi trang    
        return view('client.sanpham.allsanpham',compact('listsanpham','listDanhMuc'));
    }

    public function detailSanPham($id){
        $sanpham= SanPham::query()->findOrFail($id);
        return view('client.sanpham.chitietsanpham', compact('sanpham'));
    }

    
    public function storeReview(Request $request)
    {
        $request->validate([
            'noi_dung' => 'required|string|max:1000',
        ],
        [
            'noidung.required'=>'Nội dung không được trống',
            'noi_dung.max'=>'Nội dung không quá 1000 từ'
        ]
    );
        BinhLuan::create([
            'san_pham_id' => $request->san_pham_id,
            'user_id' => auth()->id(), 
            'noi_dung' => $request->noi_dung,
            'ngay_binh_luan'=>now(),
            'created_at' => now(), 
        ]); 

        return redirect()->route('client.sanpham.chitiet', $request->san_pham_id)->with('success', 'Đánh giá đã được gửi thành công.');
    }
}
