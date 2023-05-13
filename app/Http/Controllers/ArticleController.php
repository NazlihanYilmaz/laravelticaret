<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;
use App\Models\CategoriesModel;
use App\Models\PageModel;

class ArticleController extends Controller
{
    public function __construct(){
       // view()->share('pages',PageModel::orderBy("order","ASC")->get());
       // view()->share('categories',CategoriesModel::inRandomOrder()->get());
    }
    public function urunDetay($kategori,$slug)
    {
        $kategori = CategoriesModel::whereSlug($kategori)->first() ?? abort(403,'Böyle Bir Kategori Bulunamadı');
        $article = ArticleModel::whereSlug($slug)->whereCategoryId($kategori->id)->first() ?? abort(403,'Böyle Bir Yazı Bulunamadı');
        $article->increment('hit');
        $data["article"] = $article;

        return view("user.detay",$data);
    }
    public function selectDetailCategory($slug)
    {
        $kategori = CategoriesModel::whereSlug($slug)->first() ?? abort(403,'Böyle Bir Kategori Bulunamadı');
        $article = ArticleModel::whereCategoryId($kategori->id)->paginate(1);
        $data["category"] = $kategori;
        $data["articles"] = $article;


        return view("user.kategori",$data);
    }
    public function page($slug)
    {
        $page = PageModel::whereSlug($slug)->first() ?? abort(403,'Böyle Bir Kategori Bulunamadı');
        $data["page"] = $page;
        return view("user.page",$data);

    }
}
