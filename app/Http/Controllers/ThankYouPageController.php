<?php

namespace App\Http\Controllers;

use App\thankyoupage;

class ThankYouPageController extends Controller
{
    public function index()
    {
        return view('pages.thankyoupage');
    }
   
}
