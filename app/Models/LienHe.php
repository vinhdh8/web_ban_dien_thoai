<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'ho_va_ten',
     'email',
     'so_dien_thoai',
     'noi_dung',
     'ngay_gui',
    ];
}
