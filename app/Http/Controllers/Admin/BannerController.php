<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\SanPham;
use Faker\Extension\Helper;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $listBan = Banner::all();
        return view('admin.banner.index', compact('listBan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listsanpham = SanPham::all();
        return view('admin.banner.add',['san_phams' => $listsanpham]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            // Xử lý hình ảnh
            if($request->hasFile('hinh_anh')){
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/banners', 'public');
            }else{
                $params['hinh_anh'] = null;
            }
            Banner::query()->create($params);
            return redirect()->route('admin.banner.index')->with('success', 'Banner đã được thêm thành công.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        $san_phams = SanPham::all();
        return view('admin.banner.edit', compact('banner', 'san_phams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ngay_dang' => 'required|date|before_or_equal:today',
            'san_pham_id' => 'required|exists:san_phams,id',
        ],
        [   
            'hinh_anh.image' => 'Hình ảnh phải là một tập tin ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc webp.',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá 2048 KB.',

            'ngay_dang.required' => 'Ngày đăng là bắt buộc.',
            'ngay_dang.date' => 'Ngày đăng phải là một ngày hợp lệ.',
            'ngay_dang.before_or_equal' => 'Ngày đăng không được lớn hơn ngày hiện tại.',

            'san_pham_id.required' => 'Danh mục là bắt buộc.',
            'san_pham_id.exists' => 'Danh mục không hợp lệ.',
        ]
    );
           // Tìm sản phẩm cần sửa
    $banner = Banner::findOrFail($id);

    // Xử lý hình ảnh
        $imagePath = null;
        if ($request->hasFile('hinh_anh')) {
            if ($banner->hinh_anh && Storage::disk('public')->exists($banner->hinh_anh)) {
                Storage::disk('public')->delete($banner->hinh_anh);
            }
            $imagePath= $request->file('hinh_anh')->store('uploads/images', 'public') ;
        }
        else{
            $imagePath=$banner->hinh_anh; // Giữ lại hình ảnh hiện tại nếu không có hình ảnh mới
        }
       // Cập nhật thông tin sản phẩm
    $banner->update([
        'hinh_anh' => $imagePath,
        'san_pham_id'=>$request->san_pham_id,
        'ngay_dang'=>$request->ngay_dang,
    ]);

    // Redirect về danh sách sản phẩm với thông báo thành công
    return redirect()->route('admin.banner.index')->with('success', 'Sửa sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delBan = Banner::query()->findOrFail($id);

        //Xóa hình ảnh
        if ($delBan->hinh_anh && Storage::disk('public')->exists($delBan->hinh_anh)) {
            Storage::disk('public')->delete($delBan->hinh_anh);
        }
        $delBan->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Xóa thành công');
    }
}
