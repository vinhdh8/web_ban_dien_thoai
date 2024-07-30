<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $listDanhMuc = SanPham::query()->get();
        View::share('listDanhMuc', $listDanhMuc);
   
    }
}
