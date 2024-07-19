<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('ten_dang_nhap');
            $table->string('mat_khau');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->boolean('vai_tro');
            $table->boolean('trang_thai');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
//Đặng Hồng Vinh