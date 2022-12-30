<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        $galeries = Galery::latest()->get();
        return view('admin.galery.index', compact('galeries'));
    }

    public function search(Request $request){
        $galeries = Galery::where('title', 'like', "%$request->q%")->get();

        return view('admin.galery.index', compact('galeries'));
    }

    public function create(){
        return view('admin.galery.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'img_url' => ['required', 'image']
        ]);

        if($request->img_url != ""){
            $file_name = time() . '.' .$request->img_url->extension();
            $path = $request->img_url->storeAs(
                'galeries',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }

        $galery = new Galery();
        $galery->title = $request->title;
        $galery->img_url = $path;

        $galery->save();

        return redirect()->route('admin.galery.index')->with('success', 'Galery inséré avec succès');
    }

    public function destroy($id){
        $galery = Galery::findOrFail($id);
        Storage::disk('public')->delete($galery->img_url);

        $galery->delete();
        return redirect()->route('admin.galery.index')->with('success', 'Galery inséré avec succès');
    }
}
