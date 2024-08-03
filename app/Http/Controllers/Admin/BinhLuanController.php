<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Binhluan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //c1
        // $binhluans = Binhluan::select('binh_luans.*', 'users.ten_dang_nhap as user_name', 'san_phams.ten_san_pham as san_pham_name') // as cho phép gọi ten_dang_nhap từ user bằng tên khác để duyệt mảng cho dễ
        //     ->join('users', 'binh_luans.user_id', '=', 'users.id') // liên kết 2 khóa ngoại user_id của bình luận và id của users
        //     ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id') // liên kết 2 khóa ngoại san_pham_id của bình luận và id của san_phams
        //     ->get();

        // return view('admin.binhluan.index', compact('binhluans'));
        //c2
        $binhluans = Binhluan::with(['user','sanpham'])->get();
        return view('admin.binhluan.index',compact('binhluans'));
    }
    public function toggleHide($id)
    {
        $binhluan = BinhLuan::findOrFail($id);
        $binhluan->trang_thai = !$binhluan->trang_thai; // thay đổi trạng thái khi ấn 
        // !$binhluan->trang_thai để thay đổi trạng thái nếu ấn ẩn trạng thái đang true sẽ đổi sang false
        $binhluan->save();
    
        return redirect()->route('admin.binhluan.index')->with('success', 'Bình luận đã được cập nhật.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
