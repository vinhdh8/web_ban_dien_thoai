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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nguoi_nhan');
            $table->date('ngay_dat_hang');
            $table->string('dia_chi_nhan');
            $table->string('so_dien_thoai', 10);
            $table->boolean('phuong_thuc_thanh_toan');
            $table->boolean('trang_thai');
            $table->boolean('thanh_toan');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
