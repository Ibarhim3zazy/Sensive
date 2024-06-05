<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth::check()) {
            $blogs = Blog::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate('10');
            return view('theme.blogs.index', compact('blogs'));
        } else {
            return view('theme.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        // get image
        $image = $request->image;
        // change it's currant name
        $newImageName = time() . '-' . Hash::make($image->getClientOriginalName());
        // move image to my project
        $image->storeAs('images', $newImageName, 'public');
        // save new name to database record
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::user()->id;
        Blog::create($data);
        return back()->with('blogCreateStatus', 'your blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.blogs.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
        $categories = Category::all();
        return view('theme.blogs.edit', compact('blog', 'categories'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $image = $request->image;
            Storage::delete(['public/images'.$blog->image]);
            $newImageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('images', $newImageName, 'public');
            $data['image'] = $newImageName;
        }

        $blog->update($data);
        return back()->with('blogUpdateStatus', 'your blog has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id == Auth::user()->id) {
            Storage::delete(['public/images'.$blog->image]);
            $blog->delete();
            return back()->with('blogDeleteStatus', 'your blog has been Deleted');
        }
        abort(403);
    }
}
