<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\CategoriesModel;
use Illuminate\Support\Str;
use Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function sepetekle()
    {
        if(!Auth::guard('user')->check())
        {
            toastr()->error("Sepete ürün eklemek için giriş yapın!");
            return redirect()->route("userlogin");
        }
       
    }
    public function sepetekle2(Request $request)
    {
        $sepet =  CartModel::where("UrunID",$request->urunid)->where("UyeID",$request->uyeid)->get()->first();
        if($sepet == null)
        {
            DB::table('sepet')->insert([
                "UrunID" => $request->urunid,
                "UyeID"  => $request->uyeid,
                "Adet"   => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
      else{
        $sepet->Adet += 1;
        $sepet->save();
      }


        $urun = ProductModel::findOrFail($request->urunid);
        $urun->Miktar -= 1;
        $urun->save();
        toastr()->success("Başarılı","Sepete ürün eklendi.");
        return redirect()->route("sepet");
    }
    public function sepet()
    {
        $data["sepetgoster"] = CartModel::where("UyeID",Auth::guard('user')->id())->get();
        $data["sepetsay"] = CartModel::where("UyeID",Auth::guard('user')->id())->get()->count();
        return view("user.cart",$data);
       
    }
  public function sepetsil(Request $request)
    {
       
        CartModel::where("UrunID",$request->urunid)->where("UyeID",$request->uyeid)->delete();
        $urun = ProductModel::findOrFail($request->urunid);
        $urun->Miktar += $request->sadet;
        $urun->save();
        toastr()->success("Başarılı","Sepetteki ürün silindi.");
        return redirect()->route("sepet");
    }


    public function sepetekle3(Request $request)
    {
        $sepet =  CartModel::where("UrunID",$request->urunid)->where("UyeID",$request->uyeid)->get()->first();
        if($sepet == null)
        {
            DB::table('sepet')->insert([
                "UrunID" => $request->urunid,
                "UyeID"  => $request->uyeid,
                "Adet"   => $request->adet,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
      else{
        $sepet->Adet += $request->adet;
        $sepet->save();
      }


        $urun = ProductModel::findOrFail($request->urunid);
        $urun->Miktar -= $request->adet;
        $urun->save();
        toastr()->success("Başarılı","Sepete ürün eklendi.");
        return redirect()->route("sepet");
    }
   public function sepetonayla(Request $request){
    $request->validate([
        "card-number"=>"required|min:19",
        "cvv"=>"required|min:3",
        "adsoyad" => "required|min:5",
        "month" => "required",
        "year" => "required",
    ]);
        $id = Auth::guard('user')->id();
        $sepeti = CartModel::where("UyeID",$id)->get();
        foreach($sepeti as $sepet){
            DB::table('siparis')->insert([
                "uye_id" => $sepet->UyeID,
                "urun_id"  => $sepet->UrunID,
                "adet"   => $sepet->Adet,
                'toplam' => $sepet->Adet * $sepet->getProduct->UrunFiyat,
                'siparis_durum' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        CartModel::where("UyeID",$id)->delete();
        toastr()->success("Başarılı","Siparişleriniz oluşturuldu.");
        return redirect()->route("siparis");
   }
   
  
}
