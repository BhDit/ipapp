<?php

namespace App\Http\Controllers;

use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    
}
