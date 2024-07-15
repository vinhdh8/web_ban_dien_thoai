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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->double('gia', 10, 2);
            $table->string('hinh_anh')->nullable();
            $table->unsignedInteger('so_luong');
            $table->text('mo_ta');
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade'); //Khóa ngoại
            // references xác định mà khóa ngoại tham chiếu
            // on xác định bảng đc tham chiếu
            // onDelete Nếu cái danh mục bị xóa thì sẽ tiến hành xóa toàn bộ sản phẩm của danh mục đấy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
