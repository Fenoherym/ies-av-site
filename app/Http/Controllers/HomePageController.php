<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $personnels = Personnel::all();
        $data= [];
        $k = 0;
        for ($i=0; $i < intval(count($personnels)/3) ; $i++) {
            for ($j=0; $j <3 ; $j++) {
                 $data[$i][] = $personnels[$k];
                 $k++;
            }

        }
        return view('welcome', compact('data'));
    }
}
