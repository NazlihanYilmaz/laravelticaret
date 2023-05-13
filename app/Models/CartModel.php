<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartModel extends Model
{
    use HasFactory;
    protected $table = "sepet";
    protected $primaryKey = "SepetID";
    protected $fillable = ["SepetID","UrunID","UyeID","Adet","created_at","updated_at"];

    function getUser()
    {
        return $this->hasOne("App\Models\UserModel","no","UyeID");
    }
    function getProduct()
    {
        return $this->hasOne("App\Models\ProductModel","UrunlerID","UrunID");
    }
    }


