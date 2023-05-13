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
        $urunler = ProductModel::whereDurum(1)->get();
        return view("user.dashboard",compact('urunler'));
    }

   
   
  
}
