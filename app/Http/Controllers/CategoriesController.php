<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = CategoriesModel::get();
        return view("back.kategoriler.index",compact('categories'));
    }
    public function categoryswitch(Request $request)
    {
        $article = CategoriesModel::findOrFail($request->id);
        $article->status = $request->statu=="true" ? 1 : 0;
        $article->save();

    }
}
