<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiDanhMucRequest;
use App\Http\Resources\DanhMucResource;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class ApiDanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DanhMuc::query();

        if($request->has('ten_danh_muc')){
            $query->where('ten_danh_muc', 'like' ,'%' .$request->input('ten_danh_muc').'%');
        }

        $danhmucs =$query->paginate(2);

        return DanhMucResource::collection($danhmucs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiDanhMucRequest $request)
    {
        $params = $request->all();

        $danhmucs = DanhMuc::query()->create($params);

        return response()->json([
           'data'=>new DanhMucResource($danhmucs),
           'status'=>true,
           'message'=>'Danh mục thêm thành công'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $danhmucs = DanhMuc::query()->findOrFail($id);
        return new DanhMucResource($danhmucs);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiDanhMucRequest $request, string $id)
    {
        $danhmucs= DanhMuc::query()->findOrFail($id);

        $params = $request->all();
           
        $danhmucs->update($params);

        return response()->json([
            'data'=>new DanhMucResource($danhmucs),
            'status'=>true,
            'message'=>'Danh mục đã sửa thành công'
         ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhmucs = DanhMuc::query()->findOrFail($id);

        $danhmucs->delete();
        return response()->json([
            'status'=>true,
            'message'=>' Xóa danh mục thành công'
         ], 200);

    }
}
