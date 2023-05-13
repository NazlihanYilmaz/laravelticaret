<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use Illuminate\Support\Str;
use Validator;


class ProductControllers extends Controller
{
    public function index()
    {
        $urunler = ProductModel::whereDurum(1)->where('Miktar', '>', 0)->get();
        return view("user.dashboard",compact('urunler'));
    }
    public function selectDetail($id)
    {
        $detay = ProductModel::where("UrunlerID",$id)->first() ?? abort(403,'Böyle Bir Ürün Bulunamadı');
        return view("user.detay",compact('detay'));
    }

   
   
  
}
