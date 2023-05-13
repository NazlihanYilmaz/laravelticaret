<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function adminlogin(){
        return view("back.login");
    }
    public function adminloginpost(Request $request){ 
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
        {      
            toastr()->success("Başarılı","Giriş Başarılı.");
            return redirect()->route("admin");
        }
        else
        {
            return redirect()->route("adminlogin")->withErrors("Email adresi veya şifre hatalı");
        }
        
    }        
       
   
    
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route("adminlogin");
    }
    
}
