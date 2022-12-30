<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\Parcours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ParcoursController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        if(!Gate::allows('admin')){
            return abort(403);
        }
        $filieres = Filiere::all();
        return view('admin.mention.parcours.create', compact('filieres'));
    }

    public function store(Request $request){
        if(!Gate::allows('admin')){
            return abort(403);
        }

        $request->validate([
            'name' => ['required', 'unique:parcours,name'],
            'description' => 'required',
            'filiere_id' => 'required',
        ]);

        $parcours = new Parcours();
        $parcours->name = $request->name;
        $parcours->description = $request->description;
        $parcours->filiere_id = $request->filiere_id;

        $parcours->save();

        return redirect(route('admin.filiere.index'))->with('success', "Parcours créé avec succès");

    }

    public function edit($id){
         if(!Gate::allows('admin')){
            return abort(403);
        }

        $parcours = Parcours::findOrFail($id);
        $filieres = Filiere::all();
        return view('admin.mention.parcours.update', [
            'parcours' => $parcours,
            'filieres' => $filieres
        ]);

    }

    public function update(Request $request, $id){
        if(!Gate::allows('admin')){
            return abort(403);
        }

        $data = $request->validate([
            'name' => ['required'],
            'description' => 'required',
            'filiere_id' => 'required',
        ]);

        Parcours::whereid($id)->update($data);
        return redirect(route('admin.filiere.index'))->with('success', "Parcours créé avec succès");
    }

    public function destroy($id){

        if(!Gate::allows('admin')){
            return abort(403);
        }

        Parcours::findOrFail($id)->delete();

        return back()->with('success', "Le parcours à été supprimé avec succès");

    }
}
