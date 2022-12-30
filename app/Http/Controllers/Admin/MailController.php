<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function send(Request $request)
    {

        Mail::to($request->email)->send(new SendMail($request));

        return back();
    }
}
