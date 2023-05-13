<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductModel extends Model
{
    use HasFactory;
    protected $table = "urunler";
    protected $primaryKey = 'UrunlerID';
    protected $fillable = ["UrunlerID","UrunResim","UrunlerAdi","UrunFiyat","UrunAciklama","Miktar","UrunRenk","indirim","kat_id","durum","updated_at","created_at"];

    function getCategory()
    {
        return $this->hasOne("App\Models\CategoriesModel","katID","kat_id");
    }
    }


