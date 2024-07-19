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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten'); 
            $table->string('ten_dang_nhap')->nullable()->unique(); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('so_dien_thoai')->nullable()->unique(); 
            $table->string('dia_chi')->nullable();
            $table->boolean('vai_tro')->default(0);
            $table->boolean('trang_thai')->default(0)->comment('0.Tốt, 1.Đã khóa');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
