<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\LienHeController;
use App\Http\Controllers\Admin\TinTucController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\DonHangController as ClientDonHangController;
use App\Http\Controllers\Client\GioHangController;
use App\Http\Controllers\Client\SanPhamController as ClientSanPhamController;
use App\Http\Controllers\Client\UserController as ClientUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('client.index');
// });
Route::prefix('/')->as('client.')->group(function(){
    Route::get('/', [ClientController::class, 'index'])->name('index');
    Route::get('/tat-ca-sanpham', [ClientController::class, 'allSanPham'])->name('sanpham.all');
    Route::get('/danhmucsanpham/{id}',[ClientController::class,'danhMucSanPham'])->name('sanpham.danhmucsanpham');
    Route::get('/chi-tiet-san-pham/{id}', [ClientSanPhamController::class, 'detailSanPham'])->name('sanpham.chitiet');
    Route::post('/store-review', [ClientController::class, 'storeReview'])->name('review.store');
    Route::get('/gio-hang', [GioHangController::class, 'listGioHang'])->name('giohang.list');
    Route::post('/add-gio-hang', [GioHangController::class, 'addGioHang'])->name('giohang.add');
    Route::post('/update-gio-hang', [GioHangController::class, 'updateGioHang'])->name('giohang.update');
    Route::middleware('auth')->prefix('donhangs')->as('donhang.')->group(function(){
        Route::resource('donhang', ClientDonHangController::class);
    });
    Route::resource('profile', ClientUserController::class);
    Route::get('/lienhe',[ClientController::class,'hienLienHe'])->name('lienhe.hienLienHe');
    Route::post('/lienhe',[ClientController::class,'storeLienHe'])->name('lienhe.storeLienHe');
    Route::get('/gioithieu',[ClientController::class,'hienGioiThieu'])->name('gioithieu.hienGioiThieu');
    Route::get('/tintuc',[ClientController::class,'hienTinTuc'])->name('tintuc.hienTinTuc');
});


// controller
Route::middleware('auth.admin')->prefix('admin')->as('admin.')->group(function(){
    Route::get('/admin', function(){
        return view('admin.index');
    })->name('admin');
    Route::resource('danhmuc', DanhMucController::class);
    Route::resource('sanpham', SanPhamController::class);
    Route::resource('donhang', DonHangController::class);
    Route::resource('taikhoan', UserController::class);
    Route::resource('tintuc',TinTucController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('binhluan',BinhLuanController::class);
    Route::get('/binhluan/toggle-hide/{id}', [BinhLuanController::class, 'toggleHide'])->name('binhluan.toggleHide');
    Route::get('/lienhe',[LienHeController::class,'index'])->name('lienhe.index');
    Route::get('/taikhoanTV', [UserController::class, 'thanhVien'])->name('thanhVien');
    Route::get('/khoaTK/{id}',[UserController::class,'lock'])->name('taikhoan.lock');
    Route::post('/openTK/{id}',[UserController::class,'openTK'])->name('taikhoan.openTK');
    Route::get('/listkhoaTK',[UserController::class,'listkhoaTK'])->name('taikhoan.listkhoaTK');
});

// Auth
Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
