<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    use HasFactory;
    protected $table = "pages";
    protected $fillable = ["id","title","image","content","slug","order","created_at","updated_at"];
}
