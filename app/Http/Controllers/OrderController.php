<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\CategoriesModel;
use App\Models\ProductModel;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $siparisler = OrderModel::get();
        return view("back.siparisler.index",compact('siparisler'));
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
        
    }

    public function update(Request $request,$id)
    {
       
       
    }
    public function delete($id)
    {
        OrderModel::where("Siparis_no",$id)->delete();
        toastr()->success("Başarılı","Sipariş Silindi.");
        return redirect()->route('siparisler.index');
    }
    public function guncelle($id)
    {
        $siparis = OrderModel::findOrFail($id);
        $siparis->siparis_durum += 1;
        $siparis->save();
        toastr()->success("Başarılı","Sipariş başarıyla güncellendi.");
        return redirect()->route('siparisler.index');
    }
    public function guncelle2($id)
    {
        $siparis = OrderModel::findOrFail($id);
        $siparis->siparis_durum += 1;
        $siparis->save();
        toastr()->success("Başarılı","Sipariş başarıyla güncellendi.");
        return redirect()->route('siparis');
    }
    public function siparis(){
        $data["siparisgoster"] = OrderModel::where("uye_id",Auth::guard('user')->id())->get();
        $data["siparisay"] = OrderModel::where("uye_id",Auth::guard('user')->id())->get()->count();
        return view("user.order",$data);
    }
    public function siparisil(Request $request)
    {
       
        OrderModel::where("urun_id",$request->urunid)->where("uye_id",$request->uyeid)->delete();
        $urun = ProductModel::findOrFail($request->urunid);
        $urun->Miktar += $request->sadet;
        $urun->save();
        toastr()->success("Başarılı","Sipariş silindi.");
        return redirect()->route("siparis");
    }
    public function siparisgoster(){
        $data["siparisgoster"] = OrderModel::where("uye_id",Auth::guard('user')->id())->get();
        return view("user.siparis",$data);
    }
    public function odeme(){
        $sepetkontrol = CartModel::where("UyeID",Auth::guard('user')->id())->get()->count();
        if($sepetkontrol != null)
        {
            return view("user.odeme");
        }
        else{
            toastr()->error("Başarısız","Sepetinizde ürün yok.");
            return redirect()->back();
        }
        
    }
  
}
