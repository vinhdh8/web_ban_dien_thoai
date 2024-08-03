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
        Schema::create('lien_hes', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->string('noi_dung');
            $table->date('ngay_gui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lien_hes');
    }
};
