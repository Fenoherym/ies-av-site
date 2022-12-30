<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index(){
        $galeries = Galery::latest()->get();

        return view('gallery.index', compact('galeries'));
    }
}
