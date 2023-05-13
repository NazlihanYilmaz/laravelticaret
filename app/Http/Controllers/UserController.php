<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\CategoriesModel;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        
        
        $uyeler = UserModel::get();
        return view("back.kullanicilar.index",compact('uyeler'));
        
    }

    public function create()
    {
        return view("back.kullanicilar.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email"=>"required|email|unique:uyeler",
            "name" => "required",
            "surname" => "required",
            "username" => "required|unique:uyeler",
            "password" => "required|confirmed",
            "password_confirmation"=>"required",
        ]);

        $uye = new UserModel;
        $uye->ad=$request->name;
        $uye->soyad=$request->surname;
        $uye->username=$request->username;
        $uye->password=bcrypt($request->password);
        $uye->email=$request->email;
        $uye->durum=0;
        
       
        $uye->save();
        toastr()->success("Başarılı","Üye başarıyla oluşturuldu.");
        return redirect()->route('kullanicilar.index');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $uyeler = UserModel::where("no",$id)->first();
        return view("back.kullanicilar.edit",compact('uyeler'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "email"=>"email",
        ]);

        $uye = UserModel::findOrFail($id);
        $uye->ad=$request->name;
        $uye->soyad=$request->surname;
        $uye->username=$request->username;
        $uye->email=$request->email;
        $uye->durum=0;
        
       
        $uye->save();
        toastr()->success("Başarılı","Üye başarıyla güncellendi.");
        return redirect()->route('kullanicilar.index');

      
      
        
      
    }
    public function switch(Request $request)
    {
        $uye = UserModel::findOrFail($request->id);
        $uye->durum = $request->statu=="true" ? 1 : 0;
        $uye->save();

    }
    public function delete($id)
    {
        UserModel::where("no",$id)->delete();
        toastr()->success("Başarılı","Kullanıcı Silindi.");
        return redirect()->route('kullanicilar.index');
    }
    public function showlogin()
    {
        return view("user.login");
    }
    public function showregister()
    {
        return view("user.register");
    }
    public function registerpost(Request $request)
    {
        
            $request->validate([
                "email"=>"email|unique:uyeler",
                "username"=>"unique:uyeler",
            ]);
    
            $uye = new UserModel;
            $uye->ad=$request->name;
            $uye->soyad=$request->surname;
            $uye->username=$request->username;
            $uye->password=bcrypt($request->password);
            $uye->email=$request->email;
            $uye->durum=0;
            
           
            $uye->save();

            toastr()->success("Başarılı","Kayıt Başarılı.");
            return redirect()->route('userlogin');
    
        
    }
    public function loginpost(Request $request)
    {
        if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]))
        {     
            if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password,'durum' => 1]))  
            {
                toastr()->success("Başarılı","Giriş Başarılı.");
                return redirect()->route("homepage");
            }
            else{
                Auth::guard('user')->logout();
                return redirect()->route("userlogin")->withErrors("Üyeliğiniz aktif değil.");
            }
           
        }

    else
        {
            return redirect()->route("userlogin")->withErrors("Email adresi veya şifre hatalı");
        }
    }
    public function logout(){
        Auth::guard('user')->logout();
        toastr()->info("Başarılı","Çıkış yapıldı.");
        return redirect()->route("userlogin");
    }
}
