<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public $danh_muc;

    public function __construct()
    {
        $this->danh_muc = new DanhMuc();
    }
    public function index(){
        $listDanhMuc = $this->danh_muc->getAll();
        return view('client.index', ['danh_mucs'=>$listDanhMuc]);
    }
}
