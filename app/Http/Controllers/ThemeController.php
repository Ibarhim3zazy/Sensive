<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index() {
        $blogs = Blog::orderBy('id', 'desc')->paginate('4');
        $sliderBlogs = Blog::latest()->take('5')->get();
        return view('theme.index', compact('blogs', 'sliderBlogs'));
    }
    public function category($id) {
        $blogs = Blog::where('category_id', $id)->orderBy('id', 'desc')->paginate('8');
        return view('theme.category', compact('blogs'));
    }
}
