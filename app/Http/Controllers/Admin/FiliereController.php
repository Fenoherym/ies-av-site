<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FiliereController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        if(!Gate::allows('admin')){
            return view('home');
        }

        $filieres = Filiere::all();

        return view('admin.mention.index', compact('filieres'));
    }

    public function search(Request $request){
        if(!Gate::allows('admin')){
            return view('home');
        }
        $q = $request->q;

        $filieres = Filiere::where('name', 'like', "%$q%")->get();
        return view('admin.mention.index', compact('filieres'));

    }

    public function create(){
        return view('admin.mention.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'min:5', 'unique:filieres,name'],
            'filiere_category_id' => ['required'],
            'description' => ['required']
        ]);

        $filiere = new Filiere();
        $filiere->name = $request->name;
        $filiere->filiere_category_id = $request->filiere_category_id;
        $filiere->description = $request->description;
        $filiere->save();

        return redirect('/admin/mentions')->with('success', 'Mention ajoutée avec succès');

    }

    public function edit($id){

        $filiere = Filiere::findOrFail($id);

        return view('admin.mention.update', compact('filiere'));

    }

    public function update(Request $request, $id){

        if(!Gate::allows('admin')){
            return view('home');
        }
        $data =  $request->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required']
        ]);

       filiere::whereId($id)->update($data);

       return redirect('/admin/mentions')->with('success', 'Mention modifiée avec succès');

    }

    public function destroy($id){

        if(!Gate::allows('admin')){
            return view('home');
        }
        Filiere::findOrFail($id)->delete();

        return back()->with('success', 'Mention supprimée avec succes');

    }
}
