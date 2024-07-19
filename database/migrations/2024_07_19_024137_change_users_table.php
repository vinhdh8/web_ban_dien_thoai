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
        Schema::table('users', function (Blueprint $table) {
            $table->string('ten_dang_nhap')->nullable()->unique()->change();
            $table->string('so_dien_thoai')->nullable()->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('ten_dang_nhap')->nullable()->unique()->change();
            $table->string('so_dien_thoai')->nullable()->unique()->change();
        });
    }
};
