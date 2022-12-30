<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partenariat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenariatController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $partenariats = Partenariat::all();
        return view('admin.partenariat.index', compact('partenariats'));
    }

    public function create()
    {
        return view('admin.partenariat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'url' => ['url'],
            'logoImg' => ['required', 'image']
        ]);

        if ($request->logoImg != "") {
            $file_name = time() . '.' . $request->logoImg->extension();
            $path = $request->logoImg->storeAs(
                'partenariats',
                $file_name,
                'public'
            );
        } else {
            $path = "";
        }

        $partenariat = new Partenariat();
        $partenariat->name = $request->name;
        $partenariat->url = $request->url;
        $partenariat->logoImg = $path;

        $partenariat->save();

        return redirect()->route('admin.partenariat.index')->with('success', 'Partenariat ajouté avec succès');
    }

    public function edit($id)
    {
        $partenariat = Partenariat::findOrFail($id);
        return view('admin.partenariat.edit', compact('partenariat'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'url' => ['url'],
        ]);

        $partenariat = Partenariat::find($id);

        if ($request->logoImg != "") {
            Storage::disk('public')->delete($partenariat->logoImg);
            $file_name = time() . '.' . $request->logoImg->extension();
            $path = $request->logoImg->storeAs(
                'partenariats',
                $file_name,
                'public'
            );

            $data['logoImg'] = $path;
        }

        $partenariat->update($data);

        return redirect()->route('admin.partenariat.index')->with('success', 'Partenariat modifié avec succès');
    }

    public function destroy($id)
    {
        $partenariat = Partenariat::findOrFail($id);
        Storage::disk('public')->delete($partenariat->logoImg);
        $partenariat->delete();

        return back()->with('success', 'Parteneriat supprimé avec succès');
    }
}
