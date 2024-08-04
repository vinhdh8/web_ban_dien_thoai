<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DanhMucResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return parent::toArray($request);
        // dùng để quy định bạn muốn trả ra dữ liệu gì thì nó trả ra dữ liệu đó
        // return [
        //     "id"=>$this->id,
        //     "ten_danh_muc"=>$this->ten_danh_muc
        // ];

    }
}
