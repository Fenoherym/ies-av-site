<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Parcours;
use App\Models\Tranche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EtudiantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if(!Gate::allows('admin')){
            return abort(403);
        }

        $parcours = Parcours::all();
        $niveaux = Niveau::all();
        return view('admin.etudiants.index', [
            'niveaux' => $niveaux,
            'parcours' => $parcours

        ]);
    }

    public function search(Request $request){

         if(!Gate::allows('admin')){
            return abort(403);
        }
        if($request->niveau_id != "" && $request->niveau_id){
            $etudiants = Etudiant::where([
                'niveau_id' => $request->niveau_id,
                'parcours_id' => $request->parcours_id,
                'annee_scolaire_id' => getActiveAnnee()->id
            ])->where('name' , 'like', "%$request->q%")->get();
        }else{
            $etudiants = Etudiant::where('name' , 'like', "%$request->q%")->get();
        }

        $niveaux = Niveau::all();
        $parcours = Parcours::all();
        return view('admin.etudiants.index', [
            'etudiants' => $etudiants,
            'niveaux' => $niveaux,
            'parcours' => $parcours
        ]);

    }

    public function show($id){

        if(!Gate::allows('admin')){
            return abort(403);
        }

        $etudiant = Etudiant::findOrFail($id);

        return view('admin.etudiants.show', compact('etudiant'));
    }

    public function create(){

        $parcours = Parcours::all();
        $niveaux = Niveau::all();

        return view('admin.etudiants.create', [
            'parcours' => $parcours,
            'niveaux' => $niveaux
        ]);
    }

    public function store(Request $request){

        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

         $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'numInscription' => ['required'],
            'datebirth' => ['required'],
            'adress' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'parcours_id' => ['required'],
            'niveau_id' => ['required'],
            'photoUrl' => ['required']
         ]);


         if($request->photoUrl != ""){
            $file_name = time() . '.' .$request->photoUrl->extension();
            $path = $request->photoUrl->storeAs(
                'etudiants',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }


         $etudiant = new Etudiant();
         $etudiant->name = $request->name;
         $etudiant->numInscription = $request->numInscription;
         $etudiant->datebirth = $request->datebirth;
         $etudiant->adress = $request->adress;
         $etudiant->telephone = $request->telephone;
         $etudiant->email = $request->email;
         $etudiant->parcours_id = $request->parcours_id;
         $etudiant->niveau_id = $request->niveau_id;
         $etudiant->annee_scolaire_id = getActiveAnnee()->id;
         $etudiant->photoUrl = $path;

         $etudiant->save();

         $tranche = new Tranche();
         $tranche->isDroitOk = 0;
         $tranche->isFirstTrancheOk = 0;
         $tranche->isSecondTrancheOk = 0;
         $tranche->isThirdTrancheOk = 0;
         $tranche->etudiant_id = $etudiant->id;

         $tranche->save();

         return back()->with('success', 'Etudiant ajouter avec succès');

    }

    public function destroy($id){

        if(!Gate::allows('admin')){
            abort(403);
        }

        $etudiant = Etudiant::findOrFail($id);
        Tranche::findOrFail($etudiant->tranche->id)->delete();
        Storage::disk('public')->delete($etudiant->photoUrl);

        $etudiant->delete();

        return back()->with('success', 'Etudiant supprimé avec succès');

    }

    public function edit($id){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $etudiant = Etudiant::findOrFail($id);
        $parcours = Parcours::all();
        $niveaux = Niveau::all();

        return view('admin.etudiants.edit', [
            'etudiant' => $etudiant,
            'parcours' => $parcours,
            'niveaux' => $niveaux
        ]);

    }

    public function update(Request $request,$id){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

         $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'numInscription' => ['required'],
            'datebirth' => ['required'],
            'adress' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'parcours_id' => ['required'],
            'niveau_id' => ['required'],
            'photoUrl' => ['required']
         ]);
         $etudiant = Etudiant::findOrFail($id);

         if(isset($request->photoUrl)){
            if (Storage::disk('public')->exists($etudiant->photoUrl)) {
                Storage::disk('public')->delete($etudiant->photoUrl);
            }

            $file_name = time() . '.' .$request->photoUrl->extension();
            $path = $request->photoUrl->storeAs(
                'etudiants',
                $file_name,
                'public'
            );
         }else{
            $path = $etudiant->photoUrl;
         }

        $etudiant->update([
                'name' => $request->name,
                'numInscription' => $request->numInscription,
                'datebirth' => $request->datebirth,
                'adress' => $request->adress,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'parcours_id' => $request->parcours_id,
                'niveau_id' => $request->niveau_id,
                'photoUrl' => $path
         ]);

         return back()->with('success', 'Etudiant modifié avec succès');

    }


}
