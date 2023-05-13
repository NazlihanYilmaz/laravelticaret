<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\CategoriesModel;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
       
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
       

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $yonet = AdminModel::whereNo(Auth::guard('admin')->id())->get()->first();
        return view("back.yonetim.edit",compact('yonet'));
    }

    public function update(Request $request, $id)
    {
        $admin = AdminModel::findOrFail($id);
        $admin->adsoyad=$request->adsoyad;
        $admin->kuladi=$request->kuladi;
        $admin->email=$request->email;
        $admin->save();
        toastr()->success("Başarılı","Bilgiler başarıyla güncellendi.");
        return redirect()->route('yonetim.edit',$id);
    }
    public function switch(Request $request)
    {
       

    }
    public function delete($id)
    {
       
    }
   
  
}
