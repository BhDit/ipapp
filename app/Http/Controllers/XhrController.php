<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XhrController extends Controller
{
    public function problems()
    {
        return \App\Problem::all();
    }
}
