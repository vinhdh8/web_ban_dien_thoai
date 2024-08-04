<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreTinTucRequest;
use App\Models\Tintuc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $listTinTuc = Tintuc::all();
        return view('admin.tintuc.index', compact('listTinTuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.tintuc.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreTinTucRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token'); // lấy tất cả dữ liệu trừ token
            // Xử lý hình ảnh
            if ($request->hasFile('hinh_anh')) {
                $params['hinh_anh'] = $request->file('hinh_anh')->store('uploads/tintucs', 'public');
            } else {
                $params['hinh_anh'] = null;
            }
            $params['ngay_dang'] = Carbon::now(); //cho thành ngày hiện tại

            Tintuc::query()->create($params);
            return redirect()->route('admin.tintuc.index')->with('success', 'Thêm thành công tin tức.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $tinTuc = Tintuc::query()->findOrFail($id);
        return view('admin.tintuc.edit', compact('tinTuc'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'tieu_de.required' => 'Tiêu đề là không được trống.',
                'noi_dung.required' => 'Nội dung là không được trống.',
                'hinh_anh.required' => 'Tải file ảnh lên',
                'hinh_anh.image' => 'Hình ảnh phải là tệp hình ảnh.',
                'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, webp.',
                'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB.',
            ],
            [
                'tieu_de.required' => 'Tiêu đề là không được trống.',
                'noi_dung.required' => 'Nội dung là không được trống.',
                'hinh_anh.required' => 'Tải file ảnh lên',
                'hinh_anh.image' => 'Hình ảnh phải là tệp hình ảnh.',
                'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, webp.',
                'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB.',
            ]
        );

        $tinTuc= Tintuc::query()->findOrFail($id);
         // Xử lý hình ảnh
         $imagePath = null;
         if ($request->hasFile('hinh_anh')) {
             if ($tinTuc->hinh_anh && Storage::disk('public')->exists($tinTuc->hinh_anh)) {
                 Storage::disk('public')->delete($tinTuc->hinh_anh);// xoa hinh anh cu
             }
             $imagePath= $request->file('hinh_anh')->store('uploads/images', 'public') ;
         }
         else{
             $imagePath=$tinTuc->hinh_anh; // Giữ lại hình ảnh hiện tại nếu không có hình ảnh mới
         }
        
         $tinTuc->update([
            'hinh_anh' => $imagePath,
            'tieu_de'=>$request->tieu_de,
            'noi_dung'=>$request->noi_dung,
            'ngay_dang'=>now(),
            'created_at'=>now(),
            'updated_at'=>now(),
         ]);

         return redirect()->route('admin.tintuc.index')->with('success','Sửa thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $delTinTuc = Tintuc::query()->findOrFail($id);
         //Xóa hình ảnh
         if ($delTinTuc->hinh_anh && Storage::disk('public')->exists($delTinTuc->hinh_anh)) {
            Storage::disk('public')->delete($delTinTuc->hinh_anh);
        }
        $delTinTuc->delete();

        return redirect()->route('admin.tintuc.index')->with('Xóa thành công');

    }
}
