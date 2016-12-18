<?php

namespace App\Http\Controllers;

use App\Problem;

class ProblemsController extends Controller
{
    public function index()
    {
        return view('pages.problems');
    }

    public function show(Problem $problem)
    {
        (\Auth::check()) ? $posted = \Auth::user()->postedSolutionTo($problem->id) : $posted = false;
        $loggedin = \Auth::check();
        return view('pages.problem', compact('problem', 'posted','loggedin'));
    }
}
