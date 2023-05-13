<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;
    protected $table = "uyeler";
    protected $keyType="string";
    protected $primaryKey="no";
    protected $fillable = ["no","ad","soyad","username","password","email","created_at","updated_at"];
    protected $hidden = ["sifre"];
}
