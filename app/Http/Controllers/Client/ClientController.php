<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LienHeRequest;
use App\Models\Banner;
use App\Models\Binhluan;
use App\Models\DanhMuc;
use App\Models\LienHe;
use App\Models\SanPham;
use App\Models\Tintuc;
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
        $listDanhMuc = DanhMuc::query()->withCount('sanphams')->get();
        $listsanpham = SanPham::paginate(6); // Phân trang với 6 sản phẩm mỗi trang    
        return view('client.sanpham.allsanpham',compact('listsanpham','listDanhMuc'));
    }

    public function danhMucSanPham($id){
        $listDanhMuc = DanhMuc::query()->withCount('sanphams')->get();
        $danhMuc = DanhMuc::query()->findOrFail($id);
        $listSanPham =SanPham::where('danh_muc_id',$id)->paginate(6);
        return view('client.sanpham.danhmucsanpham',compact('danhMuc','listSanPham','listDanhMuc'));
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

    public function hienLienHe(){
        return view('client.lienhe.lienhe');
    }

    public function storeLienHe(Request $request)
    {
        $request->validate([
            'ho_va_ten' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[\w\.-]+@(fpt\.edu\.vn|gmail\.com)$/',
            ],
            'so_dien_thoai' => 'required|regex:/^0\d{9}$/',
            'noi_dung' => 'required|string',
            'ngay_gui' => 'required|date|before_or_equal:today',
        ],
        [
            'ho_va_ten.required' => 'Họ và tên không được trống',
            'ho_va_ten.max' => 'Họ và tên không quá 255 ký tự',


            'email.required' => 'Email không được trống',
            'email.regex' => 'Email không hợp lệ',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không quá 255 ký tự',

            'so_dien_thoai.required' => 'Số điện thoại không được trống',
            'so_dien_thoai.regex' => 'Số điện thoại phải là số và 10 chữ số  bắt đầu bằng số 0.',

            'noi_dung.required' => 'Nội dung không được trống',
            'ngay_gui.required' => 'Ngày đăng là bắt buộc.',
            'ngay_gui.date' => 'Ngày đăng phải là một ngày hợp lệ.',
            'ngay_gui.before_or_equal' => 'Ngày đăng không được lớn hơn ngày hiện tại.',

        ]
    );

        LienHe::create([
          'ho_va_ten' => $request->ho_va_ten,
          'email' => $request->email,
          'so_dien_thoai' => $request->so_dien_thoai,
          'noi_dung' => $request->noi_dung,
          'ngay_gui'=>$request->ngay_gui,
          'created_at' =>now(),
          'updated_at' =>now(),
        ]);

    return redirect()->route('client.lienhe.hienLienHe')->with('success','Gửi thành công');
    }
    public  function hienGioiThieu()
    {
        return view('client.gioithieu.gioithieu');
    }
    public  function hienTinTuc()
    {

        $listTintuc = Tintuc::paginate(3);
        return view('client.tintuc.tintuc',compact('listTintuc'));
    }


}
