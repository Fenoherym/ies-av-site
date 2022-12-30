<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function index(){
        $admissions = Admission::all();
        return view('admission.index', compact('admissions'));
    }
}
