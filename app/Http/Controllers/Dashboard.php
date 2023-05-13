<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index(){
        $admin = AdminModel::whereNo(Auth::guard('admin')->id())->get()->first();

        $urunler = ProductModel::get();
        $toplamurun = $urunler->count();  

        $kullanici = UserModel::get();
        $toplamuser = $kullanici->count();    

        return view("back.dashboard",compact('admin','toplamurun','toplamuser'));
    }
    public function hakkimizda()
    {
        return view("user.hakkimizda");
    }
    public function iletisim()
    {
        return view("user.iletisim");
    }
}
