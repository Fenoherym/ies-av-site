<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PersonnelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $personnels = Personnel::all();

        return view('admin.personnel.index', compact('personnels'));
    }

    public function search(Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }
        $q = $request->q;
        $personnels = Personnel::where('name', 'like', "%$q%")
                            ->orWhere('grade', 'like', "%$q%")
                            ->orWhere('role', 'like', "%$q%")->get();
        return view('admin.personnel.index', compact('personnels'));
    }

    public function create(){
        return view('admin.personnel.create');
    }

    public function store(Request $request){
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
        $request->validate([
            'name' => ['required', 'min:5', 'unique:personnels'],
            'grade' => ['required'],
            'role' => ['required'],
            'sex' => ['required'],
            'telephone' => ['numeric'],
            'telephone' => 'nullable|numeric'
        ]);



        $personnel = new Personnel();
        $personnel->name = $request->name;
        $personnel->grade = $request->grade;
        $personnel->role = $request->role;
        $personnel->sex = $request->sex;
        $personnel->telephone = $request->telephone;
        $personnel->photoUrl = $path;

        $personnel->save();

        return redirect()->route('admin.personnel.index')->with('success', 'Personnel Admnistratif ajouté avec succès');

    }

    public function edit($id){
        $personnel = Personnel::findOrFail($id);

        return view('admin.personnel.edit', compact('personnel'));
    }

    public function update(Request $request){

        $data = $request->validate([
            'name' => ['required', 'min:5', 'unique:personnels'],
            'grade' => ['required'],
            'role' => ['required'],
            'sex' => ['required'],
            'telephone' => 'nullable|numeric'
        ]);

        Personnel::find($request->id)->update($data);

        return redirect()->route('admin.personnel.index')->with('success', 'Personnel Admnistratif modifié avec succès');
    }

    public function destroy($id){
        $personnel = Personnel::findOrFail($id);
        Storage::disk('public')->delete($personnel->photoUrl);

        $personnel->delete();

        return back()->with('success', 'Personnel Admnistratif suprimé avec succès');
    }
}
