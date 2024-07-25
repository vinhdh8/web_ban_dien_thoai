<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\DanhMuc;
use Faker\Extension\Helper;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class DanhMucController extends Controller
{
    public $danh_muc;

    public function __construct()
    {
        $this->danh_muc = new DanhMuc();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd('Danh sách danh mục');
        $listDanhMuc = $this->danh_muc->getAll();
        return view('admin.danhmuc.index', ['danh_mucs'=>$listDanhMuc]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        DanhMuc::query()->create($request->all());
        return redirect()->route('danhmuc.index')->with('success', 'Thao tác thành công');
        //   dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
