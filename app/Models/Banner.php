<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;
    protected $table='banners';

    protected $fillable= [
      'id',
      'san_pham_id',
      'hinh_anh',
      'ngay_dang',
      'created_at',
      'updated_at'
    ];
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id'); // Specify the foreign key
    }  
}
