<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.show', compact('blog'));
    }

    public function search(Request $request)
    {
        $blogs = Blog::where('content', 'like', "%$request->q%")->orderBy('id', 'desc')->paginate(10);
        return view('blog.index', compact('blogs'));
    }
}
