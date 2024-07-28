<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\DanhMuc;
use Faker\Extension\Helper;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class DanhMucController extends Controller
{
    public $danh_muc;

    public function __construct()
    {
        $this->danh_muc = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('Danh sách danh mục');
        $listDanhMuc = $this->danh_muc->getAll();
        return view('admin.danhmuc.index', ['danh_mucs'=>$listDanhMuc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        return view(('admin.danhmuc.add'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255|unique:danh_mucs,ten_danh_muc',
        ],
        [
            'ten_danh_muc.required' => 'Tên danh mục không được trống',
            'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',
            'ten_danh_muc.unique'=>'Tên danh mục đã có'
        ]
    );
        // $this->danh_muc->addDanhMuc($request-> ten_danh_muc); //làm theo cách models
        DanhMuc::create([
            'ten_danh_muc' => $request->ten_danh_muc,
        ]);

        return redirect()->route('admin.danhmuc.index')->with('success', 'Danh mục đã được thêm.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        return view('admin.danhmuc.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten_danh_muc' => 'required|string|max:255',
        ],
        [
            'ten_danh_muc.required' => 'Tên danh mục không được trống',
            'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',
        ]
    );
       $editdanhmuc =DanhMuc::findOrFail($id);
       $editdanhmuc->update([
        'ten_danh_muc' =>$request->ten_danh_muc
       ]);
       
       return redirect()->route('admin.danhmuc.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    //c1
    public function destroy(string $id)
    {
        $danhmuc=DanhMuc::findOrFail($id);
        $danhmuc->delete();
        return redirect()->route('admin.danhmuc.index')->with('success','Xóa thành công');
    }
    // c2
    // public function destroy(string $id)
    // {
    //    $this->danh_muc->deleteDanhMuc($id);
    //     return redirect()->route('danhmuc.index')->with('success', 'Xóa danh mục thành công');
    // }
}
