<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // function getAll($vai_tro)
    // {
    //     $tai_khoan = DB::table('users')
    //     ->select('*');
    //     if ($vai_tro == 1 || $vai_tro == 0) {
    //         $tai_khoan
    //         ->where('vai_tro', $vai_tro)
    //         ->where('trang_thai', 0);
    //     }
    //     return $tai_khoan->orderBy('id', 'asc')->get();
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ho_va_ten',
        'ten_dang_nhap',
        'email',
        'password',
        'vai_tro',
        'so_dien_thoai',
        'dia_chi',
        'trang_thai'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function donHang(){
        return $this->hasMany(DonHang::class);
    }
}
