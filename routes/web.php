<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserControl;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserForgotPasswordController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::get('admin/giris', [AuthController::class,'adminlogin'])->name('adminlogin');
Route::post('admin/giris', [AuthController::class,'adminloginpost'])->name('adminloginpost');

Route::prefix("admin")->middleware('isAdmin')->group(function(){

Route::get('panel', [Dashboard::class,'index'])->name('admin');

// MAKALE ROUTE'S
Route::resource("urunler",ProductController::class);
Route::get("switch",[ProductController::class,'switch'])->name('switch');
Route::get("urunsil/{id}",[ProductController::class,'delete'])->name('urunsilme');

// USER ROUTE'S
Route::resource("kullanicilar",UserController::class);
Route::get("switchKullanici",[UserController::class,'switch'])->name('switchKullanici');
Route::get("kullanicisil/{id}",[UserController::class,'delete'])->name('kullanicisilme');

// ADMİN ROUTE'S
Route::resource("yonetim",AdminController::class);

// ORDER ROUTE'S
Route::resource("siparisler",OrderController::class);
Route::get("siparisdurum/{id}",[OrderController::class,'guncelle'])->name('siparisguncelle');

Route::get("siparisil/{id}",[OrderController::class,'delete'])->name('siparisil');

Route::get('cikis', [AuthController::class,'logout'])->name('adminlogout');

});

Route::prefix("admin")->middleware('isLogin')->group(function(){


Route::get('giris', [AuthController::class,'adminlogin'])->name('adminlogin');
Route::post('giris', [AuthController::class,'adminloginpost'])->name('adminloginpost');

    });

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductControllers::class,'index'])->name('homepage');
Route::get('/login', [UserController::class,'showlogin'])->name('userlogin');
Route::resource("uyeler",UserControl::class);
Route::post('/loginpost', [UserController::class,'loginpost'])->name('loginpost');
Route::get('/register', [UserController::class,'showregister'])->name('useregister');
Route::post('/registerpost', [UserController::class,'registerpost'])->name('registerpost');
Route::get('/urun/{id}', [ProductControllers::class,'selectDetail'])->name('urundetay');
Route::get('cikis', [UserController::class,'logout'])->name('userlogout');

Route::get('userforget-password', [UserForgotPasswordController::class, 'showForgetPasswordForm'])->name('userforget.password.get');
Route::post('userforget-password', [UserForgotPasswordController::class, 'submitForgetPasswordForm'])->name('userforget.password.post'); 
Route::get('userreset-password/{token}', [UserForgotPasswordController::class, 'showResetPasswordForm'])->name('userreset.password.get');
Route::post('userreset-password', [UserForgotPasswordController::class, 'submitResetPasswordForm'])->name('userreset.password.post');

Route::get('/sepetekle/{urunid}/{uyeid}', [CartController::class,'sepetekle2'])->name('sepetekle2');
Route::get('/sepetekle3', [CartController::class,'sepetekle3'])->name('sepetekle3');
Route::get('/sepetsil', [CartController::class,'sepetsil'])->name('sepetsil');
Route::get('/sepetekle', [CartController::class,'sepetekle'])->name('sepetekle');
Route::get('/sepet', [CartController::class,'sepet'])->name('sepet');
Route::get('/hakkimizda', [Dashboard::class,'hakkimizda'])->name('hakkimizda');
Route::get('/iletisim', [Dashboard::class,'iletisim'])->name('iletisim');
Route::get('/sepetonayla', [CartController::class,'sepetonayla'])->name('sepetonayla');
Route::get('/siparis', [OrderController::class,'siparis'])->name('siparis');
Route::get('/odeme', [OrderController::class,'odeme'])->name('odeme');
Route::get('/siparisil', [OrderController::class,'siparisil'])->name('siparisil');
Route::get('/siparisgoster', [OrderController::class,'siparisgoster'])->name('siparisgoster');
Route::get("siparisdurum2/{id}",[OrderController::class,'guncelle2'])->name('siparisguncelle2');

