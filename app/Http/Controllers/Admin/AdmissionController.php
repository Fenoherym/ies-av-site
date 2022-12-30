<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\FiliereCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $admissions = Admission::all();

        return view('admin.admission.index', compact('admissions'));
    }

    public function search(Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $q = $request->q;
        $admissions = Admission::where('title', 'like', "%$q%")->get();

        return view('admin.admission.index', compact('admissions'));
    }

    public function create(){
        $filiere_categories = FiliereCategory::all();
        return view('admin.admission.create', compact('filiere_categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required'],
            'filiere_category_id' => ['required']
        ]);

        $admission  = new Admission();
        $admission->title = $request->title;
        $admission->description  = nl2br($request->description, false);
        $admission->filiere_category_id = $request->filiere_category_id;

        $admission->save();

        return redirect()->route('admin.admission.index')->with('success', "condition d'admission créé avec succès");
    }

    public function edit($id){
        $admission = Admission::findOrFail($id);
        $filiere_categories = FiliereCategory::all();
        return view('admin.admission.edit', [
            'admission' => $admission,
            'filiere_categories' => $filiere_categories
        ]);

    }

    public function update(Request $request){
        $data = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'description' => ['required'],
            'filiere_category_id' => ['required']
        ]);

        Admission::find($request->id)->update($data);

        return redirect()->route('admin.admission.index')->with('success', "condition d'admission créé avec succès");
    }

    public function destroy($id){
        Admission::findOrFail($id)->delete();

        return back()->with('success', "condition d'admission supprimé avec succès");
    }
}
