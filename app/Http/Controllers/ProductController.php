<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $urunler = ProductModel::get();
        return view("back.urunler.index",compact('urunler'));
    }

    public function create()
    {
        $categories = CategoriesModel::get();
        return view("back.urunler.create",compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "image"=>"required|image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $urun = new ProductModel;
        $urun->UrunlerAdi=$request->title;
        $urun->kat_id=$request->kategori;
        $urun->UrunAciklama=$request->content;
        $urun->Miktar=$request->peace;
        $urun->UrunFiyat=$request->price;
        $urun->UrunRenk=$request->color;
        $urun->indirim=$request->discount;
        $urun->durum=0;
        
        if($request->hasFile('image'))
        {
            $imageName=Str::slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('user/img/product/'),$imageName);
            $urun->UrunResim = $imageName;
        }
        $urun->save();
        toastr()->success("Başarılı","Ürün başarıyla oluşturuldu.");
        return redirect()->route('urunler.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $urunler = ProductModel::where("UrunlerID",$id)->first();
        $categories = CategoriesModel::get();
        return view("back.urunler.edit",compact('urunler','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "image"=>"image|mimes:jpeg,png,jpg|max:2048",
        ]);

        $urun = ProductModel::findOrFail($id);
        $urun->UrunlerAdi=$request->title;
        $urun->kat_id=$request->kategori;
        $urun->UrunAciklama=$request->content;
        $urun->Miktar=$request->peace;
        $urun->UrunFiyat=$request->price;
        $urun->UrunRenk=$request->color;
        $urun->indirim=$request->discount;
        
        if($request->hasFile('image'))
        {
            $imageName=Str::slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img'),$imageName);
            $urun->UrunResim = "assets/img/".$imageName;
        }
        $urun->save();
        toastr()->success("Başarılı","Ürün başarıyla güncellendi.");
        return redirect()->route('urunler.index');
    }
    public function switch(Request $request)
    {
        $urun = ProductModel::findOrFail($request->id);
        $urun->durum = $request->statu=="true" ? 1 : 0;
        $urun->save();

    }
    public function delete($id)
    {
        ProductModel::where("UrunlerID",$id)->delete();
        toastr()->success("Başarılı","Ürün Silindi.");
        return redirect()->route('urunler.index');
    }
   
  
}
