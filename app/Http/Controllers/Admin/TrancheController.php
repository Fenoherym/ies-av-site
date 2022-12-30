<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tranche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrancheController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function editDroit($etudiant_id){

        if(!Gate::allows('admin')){
            abort(403);
        }

        $droit = Tranche::where('etudiant_id', $etudiant_id)->first();



        if($droit->isDroitOk == true){
            $isDroitOk = false;
        }
        else{
            $isDroitOk = true;
        }

        $droit->isDroitOk = $isDroitOk;
        $droit->save();

        return back();
    }

    public function editFirstTranche($etudiant_id){

        if(!Gate::allows('admin')){
            abort(403);
        }

        $tranche = Tranche::where('etudiant_id', $etudiant_id)->first();


        if($tranche->isFirstTrancheOk == true){
            $isFirstTrancheOk = false;
        }else{
            $isFirstTrancheOk = true;
        }

        $tranche->isFirstTrancheOk = $isFirstTrancheOk;
        $tranche->save();

        return back();
    }

    public function editSecondTranche($etudiant_id){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $tranche = Tranche::where('etudiant_id', $etudiant_id)->first();


        if($tranche->isSecondTrancheOk == true){
            $isSecondTrancheOk = false;
        }else{
            $isSecondTrancheOk = true;
        }

        $tranche->isSecondTrancheOk = $isSecondTrancheOk;
        $tranche->save();

        return back();

    }
    public function editThirdTranche($etudiant_id){
        if(!Gate::allows('admin')){
            abort(403);
        }

        $tranche = Tranche::where('etudiant_id', $etudiant_id)->first();


        if($tranche->isThirdTrancheOk == true){
            $isThirdTrancheOk = false;
        }else{
            $isThirdTrancheOk = true;
        }

        $tranche->isThirdTrancheOk = $isThirdTrancheOk;
        $tranche->save();

        return back();

    }
}
