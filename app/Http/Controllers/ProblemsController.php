<?php

namespace App\Http\Controllers;

use App\Problem;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index()
    {
        return view('pages.problems');
    }

    public function show(Problem $problem)
    {
        return view('pages.problem',compact('problem'));
    }
}
