<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class AdminNewsPagesController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = $this->getAllCategories();
    }

    public function getAllCategories()
    {
        return Category::all();
    }
    public function index(){
        $news = News::select('id', 'title')->orderBy('id', 'desc')->get();
        $categories = $this->getAllCategories();
        return view('admin_views.news.news',compact('news','categories'));

    }
    public function store(){
        $categories = $this->getAllCategories();
        return view('admin_views.news.add_news', compact('categories'));
    }
    public function edit($id){
        $news = News::findOrFail($id);
        $categories = $this->getAllCategories();
        return view('admin_views.news.edit_news', compact('news', 'categories'));
    }
}
