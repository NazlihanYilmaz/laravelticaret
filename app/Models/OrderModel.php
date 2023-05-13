<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderModel extends Model
{
    use HasFactory;
    protected $table = "siparis";
    protected $primaryKey = "Siparis_no";
    protected $fillable = ["Siparis_no","uye_id","urun_id","adet","toplam","siparis_durum","updated_at","created_at"];

    function getUser()
    {
        return $this->hasOne("App\Models\UserModel","no","uye_id");
    }
    function getProduct()
    {
        return $this->hasOne("App\Models\ProductModel","UrunlerID","urun_id");
    }
    }


