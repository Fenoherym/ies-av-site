<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnneeScolaire;
use App\Models\Concours;
use App\Models\FiliereCategory;
use Illuminate\Http\Request;

class ConcoursController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        $concours = Concours::paginate(10);

        return view('admin.concours.index', compact('concours'));
    }

    public function create(){
        $annee_scolaires = AnneeScolaire::all();
        $filiere_categories = FiliereCategory::all();
        return view('admin.concours.create', [
            'annee_scolaires' => $annee_scolaires,
            'filiere_categories' => $filiere_categories
        ]);
    }

    public function store(Request $request){
        if($request->isConcours == 1){
            $request->validate([
                'depot' => ['required'],
                'date_concours' => ['required'],
                'convocation' => ['required'],
                'dossiers' => ['required'],
                'droit_concours' => ['required'],
                'annee_scolaire_id' => ['required'],
                'filiere_category_id' => ['required'],
            ]);

            $concours = new Concours();
            $concours->isConcours = $request->isConcours;
            $concours->depot = $request->depot;
            $concours->date_concours = $request->date_concours;
            $concours->convocation = $request->convocation;
            $concours->dossiers = $request->dossiers;
            $concours->droit_concours = $request->droit_concours;
            $concours->annee_scolaire_id = $request->annee_scolaire_id;
            $concours->filiere_category_id = $request->filiere_category_id;

            $concours->save();
        }else{
            $request->validate([
                'depot' => ['required'],
                'dossiers' => ['required'],
                'droit_concours' => ['required'],
                'annee_scolaire_id' => ['required'],
                'filiere_category_id' => ['required'],
            ]);

            $concours = new Concours();
            $concours->isConcours = $request->isConcours;
            $concours->depot = $request->depot;
            $concours->dossiers = $request->dossiers;
            $concours->droit_concours = $request->droit_concours;
            $concours->annee_scolaire_id = $request->annee_scolaire_id;
            $concours->filiere_category_id = $request->filiere_category_id;

            $concours->save();
        }

        return redirect()->route('admin.concours.index')->with('success', 'Toutes les informations sont ajoutées avec succès !');

    }

    public function edit($id){
        $concours = Concours::findOrFail($id);
        $annee_scolaires = AnneeScolaire::all();
        $filiere_categories = FiliereCategory::all();
        return view('admin.concours.edit', [
            'concours' => $concours,
            'annee_scolaires' => $annee_scolaires,
            'filiere_categories' => $filiere_categories
        ]);
    }

    public function update(Request $request){
        if($request->isConcours == 1){
            $data = $request->validate([
                'depot' => ['required'],
                'date_concours' => ['required'],
                'convocation' => ['required'],
                'dossiers' => ['required'],
                'droit_concours' => ['required'],
                'annee_scolaire_id' => ['required'],
                'filiere_category_id' => ['required'],
            ]);
        }else{
            $data = $request->validate([
                'depot' => ['required'],
                'dossiers' => ['required'],
                'droit_concours' => ['required'],
                'annee_scolaire_id' => ['required'],
                'filiere_category_id' => ['required'],
            ]);

        }

        Concours::find($request->id)->update($data);

        return redirect()->route('admin.concours.index')->with('success', 'Toutes les informations sont ajoutées avec succès !');


    }

    public function destroy($id){
        Concours::findOrFail($id)->delete();

        return back()->with('success', 'Suppression réussie !');
    }
}
