<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function show($id){
        $filiere = Filiere::find($id);
        $filieres = Filiere::all();

        return view('filiere.show', [
            'filiere' => $filiere,
            'filieres' => $filieres
        ]);
    }

    public function show_chef($id){
        $filiere = Filiere::findOrFail($id);
        foreach($filiere->enseignants as $enseignant){
            if($enseignant->isChefMention){
                $chefMention = Enseignant::findOrFail($enseignant->id);
            }
        }

        return view('filiere.chef.show-chef', compact('chefMention'));
    }
}
