<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\ArticleModel;
use App\Models\PageModel;
use App\Models\ContactModel;
use Validator;

class HomePage extends Controller
{
    public function __construct(){
       // view()->share('pages',PageModel::orderBy("order","ASC")->get());
       // view()->share('categories',CategoriesModel::inRandomOrder()->get());
    }
    public function select()
    {
        return view("user.dashboard");
    }
    public function iletisim()
    {
        return view("user.iletisim");
    }
    public function iletisimKaydet(Request $request)
    {
        $rules = [
            "name" => "required|min:5",
            "email" => "required|email",
            "topic" => "required",
            "message" => "required|min:10"
        ];
        $validate = Validator::make($request->post(),$rules);

        if($validate->fails())
        {
           return redirect()->route('iletisim')->withErrors($validate)->withInput();
        }


        $contact = new ContactModel;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('iletisim')->with('success','İletişim mesajınız bize iletildi.Teşekkür Ederiz');
    }
}
