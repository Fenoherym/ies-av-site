<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request){
        $contact  = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        return response()->json(['success'=>'Votre message a été envoyé avec succès.']);
    }
}
