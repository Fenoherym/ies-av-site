<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $blogs = Blog::latest()->paginate(20);

        return view('admin.blog.index', compact('blogs'));
    }

    public function search(Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $q = $request->q;
        $blogs = Blog::where('title', 'like', "%$q%")->paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $categories = Category::all();
        return view('admin.blog.create' , compact('categories'));
    }

    public function store(Request $request){

        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $request->validate([
            'title' => ['required', 'max:255', 'min:5', 'unique:blogs'],
            'content' => ['required'],
             'category_id' => ['required'],
            'img_url' => 'image'
        ]);

        if($request->img_url != ""){
            $file_name = time() . '.' .$request->img_url->extension();
            $path = $request->img_url->storeAs(
                'blogs',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }



        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = nl2br($request->content, false);
        $blog->category_id = $request->category_id;
        $blog->img_url = $path;

        $blog->save();

        return back()->with('success', "Blog créé avec succès");

    }

    public function edit($id){
        $blog = Blog::findOrFail($id);
        $categories = Category::all();

        return view('admin.blog.update', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $data = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'category_id' => ['required'],
            'content' => ['required'],
        ]);

        Blog::whereId($id)->update($data);

        return redirect('/admin/blogs')->with('success', 'Blog modifié avec succès');

    }

    public function delete($id){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $blog = Blog::findOrFail($id);
        $blog->delete();
        Storage::disk('public')->delete($blog->photoUrl);
        return back()->with('success', 'Blog supprimé avec succès');
    }
}
