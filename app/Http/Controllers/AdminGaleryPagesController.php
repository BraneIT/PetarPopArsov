<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Gallery;

class AdminGaleryPagesController extends Controller
{
    public function index(){
        $gallery = Gallery::all();
        return view('admin_views.gallery.index', compact('gallery'));
    }
    public function store(){
        return view('admin_views.gallery.add_photos');
    }
}
