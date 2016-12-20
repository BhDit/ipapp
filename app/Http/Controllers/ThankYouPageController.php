<?php

namespace App\Http\Controllers;

use App\thankyoupage;

class thankyoupageController extends Controller
{
    public function index()
    {
        return view('pages.thankyoupage');
    }
   
}
