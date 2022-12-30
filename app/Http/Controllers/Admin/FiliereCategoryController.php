<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FiliereCategory;
use Illuminate\Http\Request;

class FiliereCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $filiere_categories = FiliereCategory::all();
        return view('admin.mention.category.index', compact('filiere_categories'));
    }

    public function store(Request $request){
        $filiere_category = new FiliereCategory();
        $filiere_category->name = $request->name;

        $filiere_category->save();

        return back()->with('success', 'Insertion réussie');
    }

    public function update(Request $request){
        $data = $request->validate([
            'name' => ['required']
        ]);

        FiliereCategory::find($request->id)->update($data);

        return back()->with('success', 'Modification réussie');
    }

    public function destroy($id){
        FiliereCategory::findOrFail($id)->delete();

        return back()->with('success', 'Suppression réussie');
    }



}
