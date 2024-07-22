<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\confirm;

class SanPhamController extends Controller
{
    public $san_pham;

    public function __construct()
    {
        $this->san_pham = new SanPham();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listSanPham = $this->san_pham->getAll();
        // dd($listSanPham);
        // Gọi đến view
        return view('admin.sanpham.index', ['san_phams' => $listSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $danh_mucs = DanhMuc::all();
        return view('admin.sanpham.add', compact('danh_mucs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'ten_san_pham' => 'required|string|max:255|unique:san_phams,ten_san_pham',
                'gia' => 'required|numeric|max:999999999',
                'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,web|max:2048',
                'so_luong' => 'required|integer|min:0',
                'mo_ta' => 'required|string',
                'danh_muc_id' => 'required|exists:danh_mucs,id'
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
                'ten_san_pham.unique' => 'Tên sản phẩm đã tồn tại.',

                'gia.required' => 'Giá là bắt buộc.',
                'gia.numeric' => 'Giá phải là số.',
                'gia.max' => 'Giá không được vượt quá 999999999.',

                'hinh_anh.required' => 'Hình ảnh là bắt buộc.',
                'hinh_anh.image' => 'Hình ảnh phải là một tập tin ảnh.',
                'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc web.',
                'hinh_anh.max' => 'Hình ảnh không được vượt quá 2048 KB.',

                'so_luong.required' => 'Số lượng là bắt buộc.',
                'so_luong.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',

                'mo_ta.required' => 'Mô tả là bắt buộc.',
                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                'danh_muc_id.required' => 'Danh mục là bắt buộc.',
                'danh_muc_id.exists' => 'Danh mục không hợp lệ.',
            ]
        );

        // Xử lý hình ảnh
        $imagePath = null;
        if ($request->hasFile('hinh_anh')) {
            $image = $request->file('hinh_anh');
            $imagePath = $image->store('uploads/images', 'public');
        }

        // Lưu sản phẩm
        SanPham::create([
            'ten_san_pham' => $request->ten_san_pham,
            'gia' => $request->gia,
            'hinh_anh' => $imagePath,
            'so_luong' => $request->so_luong,
            'mo_ta' => $request->mo_ta,
            'danh_muc_id' => $request->danh_muc_id,
        ]);

        return redirect()->route('sanpham.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sanpham = SanPham::findOrFail($id);
        $danh_mucs = DanhMuc::all();
        return view('admin.sanpham.edit', compact('sanpham', 'danh_mucs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'ten_san_pham' => 'required|string|max:255|unique:san_phams,ten_san_pham,' .$id, // Thêm id để loại trừ tên sản phẩm đang sửa không nó sẽ hiểu tên sản phẩm đã tồn tại và bắt tạo tên mới 
                'gia' => 'required|numeric|max:999999999',
                'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,web|max:2048', //để nullable để không bị bắt buộc đổi ảnh nếu mình không muốn, nếu để required thì bắt buộc mình phải đổi ảnh
                'so_luong' => 'required|integer|min:0',
                'mo_ta' => 'required|string',
                'danh_muc_id' => 'required|exists:danh_mucs,id'
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
                'ten_san_pham.unique' => 'Tên sản phẩm đã tồn tại.',

                'gia.required' => 'Giá là bắt buộc.',
                'gia.numeric' => 'Giá phải là số.',
                'gia.max' => 'Giá không được vượt quá 999999999.',

                'hinh_anh.image' => 'Hình ảnh phải là một tập tin ảnh.',
                'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc web.',
                'hinh_anh.max' => 'Hình ảnh không được vượt quá 2048 KB.',

                'so_luong.required' => 'Số lượng là bắt buộc.',
                'so_luong.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',

                'mo_ta.required' => 'Mô tả là bắt buộc.',
                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                'danh_muc_id.required' => 'Danh mục là bắt buộc.',
                'danh_muc_id.exists' => 'Danh mục không hợp lệ.',
            ]
        );

      // Tìm sản phẩm cần sửa
    $sanpham = SanPham::findOrFail($id);

    // Xử lý hình ảnh
    $imagePath = null;
        if ($request->hasFile('hinh_anh')) {
            if ($sanpham->hinh_anh && Storage::disk('public')->exists($sanpham->hinh_anh)) {
                Storage::disk('public')->delete($sanpham->hinh_anh);
            }
          $imagePath= $request->file('hinh_anh')->store('uploads/images', 'public') ;
        }
        else{
            $imagePath=$sanpham->hinh_anh; // Giữ lại hình ảnh hiện tại nếu không có hình ảnh mới
        }
       // Cập nhật thông tin sản phẩm
    $sanpham->update([
        'ten_san_pham' => $request->ten_san_pham,
        'gia' => $request->gia,
        'hinh_anh' => $imagePath,
        'so_luong' => $request->so_luong,
        'mo_ta' => $request->mo_ta,
        'danh_muc_id' => $request->danh_muc_id,
    ]);

    // Redirect về danh sách sản phẩm với thông báo thành công
    return redirect()->route('sanpham.index')->with('success', 'Sửa sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanpham = SanPham::query()->findOrFail($id);

        //Xóa hình ảnh
        if ($sanpham->hinh_anh && Storage::disk('public')->exists($sanpham->hinh_anh)) {
            Storage::disk('public')->delete($sanpham->hinh_anh);
        }
        $sanpham->delete();

        return redirect()->route('sanpham.index')->with('success', 'Xóa thành công');
    }
}
