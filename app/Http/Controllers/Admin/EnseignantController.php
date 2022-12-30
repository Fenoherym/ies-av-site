<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnseignantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $enseignants = Enseignant::all();

        return view('admin.enseignants.index', compact('enseignants'));
    }

    public function search(Request $request){
        $enseignants = Enseignant::where('name', 'like', "%$request->q%")->get();
        return view('admin.enseignants.index', compact('enseignants'));
    }

    public function show($id){
        $enseignant = Enseignant::findOrFail($id);
        return view('admin.enseignants.show', compact('enseignant'));
    }

    public function create(){
        $filieres = Filiere::all();
        return view('admin.enseignants.create', compact('filieres'));
    }

    public function store(Request $request){
         $request->validate([
                'name' => ['required', 'min:5', 'max:255'],
                'adress' => ['required'],
                'email' => ['email'],
                'filiere_id' => ['required'],
                'photoUrl' => ['image']

         ]);

         if($request->photoUrl != ""){
            $file_name = time() . '.' .$request->photoUrl->extension();
            $path = $request->photoUrl->storeAs(
                'enseignants',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }

        $enseignant = new Enseignant();
        $enseignant->name = $request->name;
        $enseignant->adress = $request->adress;
        $enseignant->telephone = $request->telephone;
        $enseignant->photoUrl = $path;
        $enseignant->filiere_id = $request->filiere_id;

        if(isset($request->isChef)){
            $enseignant->isChefMention = true;
        }else{
            $enseignant->isChefMention = false;
        }

        $enseignant->save();

        return redirect()->route('admin.enseignant.index')->with('success', 'Enseignant ajouté avec succès');
    }

    public function edit($id){
        $enseignant = Enseignant::findOrFail($id);
        $filieres = Filiere::all();
        return view('admin.enseignants.edit', [
            'enseignant' => $enseignant,
            'filieres' => $filieres
        ]);
    }

    public function update(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'adress' => ['required'],
            'email' => ['email'],
            'filiere_id' => ['required'],
            'photoUrl' => ['image']

     ]);

     if(isset($request->isChef)){
        $chef = true;
    }else{
        $chef = false;
    }
     $data['telephone'] = $request->telephone;
     $data['isChefMention'] = $chef;

     Enseignant::findOrFail($request->id)->update($data);

     return redirect()->route('admin.enseignant.index')->with('success', 'Enseignant modifié avec succès');

    }

    public function destroy($id){
        $enseignant = Enseignant::findOrFail($id);       ;
        Storage::disk('public')->delete($enseignant->photoUrl);
        $enseignant->delete();
        return back()->with('success', 'Suppresion réussie');
    }
}
