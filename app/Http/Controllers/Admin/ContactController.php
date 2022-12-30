<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        $messages = Contact::latest()->get();

        return view('admin.contact.index', compact('messages'));
    }

    public function show($id){
        $message = Contact::findOrFail($id);
        $isLooking = [
            'isLooking' => 1
        ];
        $message->update($isLooking);
        return view('admin.contact.show', compact('message'));
    }
}
