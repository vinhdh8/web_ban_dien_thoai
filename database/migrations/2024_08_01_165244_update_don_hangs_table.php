<?php

use App\Models\DonHang;
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
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->string('ma_don_hang')->unique()->after('id');
            $table->string('trang_thai')->default(DonHang::CHO_XAC_NHAN)->change();
            $table->string('thanh_toan')->default(DonHang::CHUA_THANH_TOAN)->change();
            $table->double('tien_hang')->after('thanh_toan');
            $table->double('tien_ship')->after('tien_hang');
            $table->double('tong_tien')->after('tien_ship');
            $table->dropColumn('ngay_dat_hang');
            $table->dropColumn('phuong_thuc_thanh_toan');
            $table->string('email_nguoi_nhan')->after('dia_chi_nhan');
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
