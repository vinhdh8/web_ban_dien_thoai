<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $listDonHang = DonHang::query()->orderByDesc('id')->get();
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        $trangThaiHuyDon = DonHang::HUY_DON_HANG;
        $trangThaiDaThanhToan = DonHang::DA_THANH_TOAN;
        $trangThaiDaGiaoHang = DonHang::DA_GIAO_HANG;
        return view('admin.donhang.index', compact('listDonHang', 'trangThaiDonHang', 'trangThaiHuyDon', 'trangThaiThanhToan', 'trangThaiDaThanhToan', 'trangThaiDaGiaoHang'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        return view('admin.donhang.show', compact('donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $curdentTrangThai = $donHang->trang_thai;
        $newTrangThai = $request->input('trang_thai');
        $trangThai = array_keys(DonHang::TRANG_THAI_DON_HANG);
        // Kiển tra nếu đơn hàng đã hủy thì ko được thay đổi
        if ($curdentTrangThai === DonHang::HUY_DON_HANG) {
            return redirect()->route('admin.donhang.index')->with('error', 'Đơn hàng đã bị hủy không thể thay đổi được trạng thái');
        }
        // Kiểm tra nếu trạng thái mới không được nằm sau trạng thái hiện tại
        if (array_search($newTrangThai, $trangThai) < array_search($curdentTrangThai, $trangThai)) {
            return redirect()->route('admin.donhang.index')->with('error', 'Không thể cập nhật ngược lại trạng thái');
        }
        $donHang->trang_thai = $newTrangThai;
        $donHang->save();
        return redirect()->route('admin.donhang.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        if ($donHang && $donHang->trang_thai == DonHang::HUY_DON_HANG) {
            $donHang->chiTietDonHang()->delete();
            $donHang->delete();
            return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
        }
        return redirect()->back()->with('error', 'Xóa đơn hàng thất bại');
    }
}
