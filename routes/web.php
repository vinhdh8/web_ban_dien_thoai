<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\ClientController;
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
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/tat-ca-sanpham', [ClientController::class, 'allSanPham'])->name('sanpham.all');
    Route::get('/chi-tiet-san-pham/{id}', [ClientSanPhamController::class, 'detailSanPham'])->name('sanpham.chitiet');
    Route::get('/gio-hang', [GioHangController::class, 'listGioHang'])->name('giohang.list');
    Route::post('/add-gio-hang', [GioHangController::class, 'addGioHang'])->name('giohang.add');
    Route::post('/update-gio-hang', [GioHangController::class, 'updateGioHang'])->name('giohang.update');
    Route::resource('profile', ClientUserController::class);
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
    Route::get('/taikhoanTV', [UserController::class, 'thanhVien'])->name('thanhVien');
});

// Auth
Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
