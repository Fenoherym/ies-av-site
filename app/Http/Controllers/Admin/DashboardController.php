<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Enseignant;
use App\Models\Filiere;
use App\Models\Parcours;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $filieres = Filiere::all();
        $etudiant_cont = Etudiant::all()->count();
        $enseignant_count = Enseignant::all()->count();
        $parcours_count = Parcours::all()->count();

        $filiere_count = $filieres->count();

        return view('admin.dashboard.index', [
            'filiere_count' => $filiere_count,
            'etudiant_count' => $etudiant_cont,
            'enseignant_count' => $enseignant_count,
            'parcours_count' => $parcours_count,
            'filieres' => $filieres
        ]);
    }
}
