<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Giohang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('gio_hangs')->insert(
            [
                'tai_khoan_id'=>1,
                'san_pham_id'=>1,
                'so_luong'=>2,
                'thanh_tien'=>15000000
            ],
         );
    }
}
