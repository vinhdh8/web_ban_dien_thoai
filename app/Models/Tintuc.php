<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tintuc extends Model
{
    use HasFactory;
    protected $table='tin_tucs';

    protected $fillable = [
        'hinh_anh',
        'ngay_dang',
        'tieu_de',
        'noi_dung',
        'user_id',
        'created_at',
        'updated_at'
    ];


    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
