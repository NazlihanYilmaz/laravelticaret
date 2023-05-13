<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\CartModel;
use App\User;


class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            $admingenel = AdminModel::whereNo(Auth::guard('admin')->id())->get()->first();
            View::share("admingenel",$admingenel); 
            $usergenel = UserModel::whereNo(Auth::guard('user')->id())->get()->first();
            View::share("usergenel",$usergenel); 

            if(Auth::guard('user')->check())
            {
                $stoplam = 0;
                $sepetoplam = CartModel::where("UyeID",Auth::guard('user')->id())->get();
                $sepetsay = CartModel::where("UyeID",Auth::guard('user')->id())->get()->count();
                foreach($sepetoplam as $sepet)
                {
                    $stoplam += $sepet->getProduct->UrunFiyat * $sepet->Adet;
                }
                
                View::share("stoplam",$stoplam);
                View::share("sepetsay",$sepetsay);
            }
        });  
        
    }
}
