<?php

namespace App\Http\Controllers;

use App\Models\Concours;
use Illuminate\Http\Request;

class ConcoursController extends Controller
{
     public function index(){
        $annee_scolaire = getActiveAnnee();
        $concours = Concours::where('annee_scolaire_id', $annee_scolaire->id)->get();
        return view('concours.index', compact('concours'));
     }
}
