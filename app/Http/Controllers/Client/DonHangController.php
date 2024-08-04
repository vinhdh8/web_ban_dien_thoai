<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonHangRequest;
use App\Mail\DonHangConfirm;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donHangs = Auth::user()->donHang;
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $typeChoXacNhan = DonHang::CHO_XAC_NHAN;
        $typeDangVanChuyen = DonHang::DANG_VAN_CHUYEN;
        return view('client.donhang.index', compact('donHangs', 'trangThaiDonHang', 'typeChoXacNhan', 'typeDangVanChuyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cart = session()->get('cart', []);
        if(!empty($cart)){
            $total=0;
            $subtotal=0;
            foreach($cart as $item){
                $subtotal += $item['gia'] * $item['so_luong'];
            }
            $shipping = 0;
            $total = $subtotal + $shipping;
            return view('client.donhang.create', compact('cart', 'subtotal', 'total', 'shipping'));
        }
        return redirect()->route('client.giohang.list');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DonHangRequest $request)
    {
        if($request->isMethod('POST')){
            DB::beginTransaction();
            try {
                $params = $request->except('_token');
                $params['ma_don_hang'] = $this->dataMaDonHang();
                $donHang = DonHang::query()->create($params);
                $donHangId = $donHang->id;
                $gioHang = session()->get('cart', []);
                foreach($gioHang as $key => $item){
                    $thanhTien = $item['gia'] * $item['so_luong'];
                    $donHang->chiTietDonHang()->create([
                        'don_hang_id' => $donHangId,
                        'san_pham_id' => $key,
                        'so_luong' => $item['so_luong'],
                        'dong_gia' => $item['gia'],
                        'thanh_tien' => $thanhTien,
                    ]);
                }
                DB::commit();
                // Gửi mail khi đặt hàng thành công
                Mail::to($donHang->email_nguoi_nhan)->queue(new DonHangConfirm($donHang));
                session()->put('cart', []);
                return redirect()->route('client.donhang.donhang.index')->with('success', 'Đơn hàng đã được tạo thành công');
            } catch (\Exception $error) {
                DB::rollBack();
                return redirect()->route('client.giohang.list')->with('error', 'Có lỗi khi tạo đơn hàng vui lòng thử lại sau');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;
        return view('client.donhang.show', compact('donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);
        DB::beginTransaction();
        try {
            if($request->has('huy_don_hang')){
                $donHang->update(['trang_thai'=> DonHang::HUY_DON_HANG]);
            }elseif($request->has('da_giao_hang')){
                $donHang->update(['thanh_toan'=> DonHang::DA_THANH_TOAN]);
                $donHang->update(['trang_thai'=> DonHang::DA_GIAO_HANG]);
            }
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function dataMaDonHang(){
        do {
            $maDonHang = 'GT-' . Auth::id() . '-' . now()->timestamp;
        } while (DonHang::where('ma_don_hang', $maDonHang)->exists());
        return $maDonHang;
    }
}
