<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Solution;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index()
    {
        return view('pages.problems');
    }

    public function show(Problem $problem, Request $request)
    {
        $problem->load('solutions');
        $loggedin = auth()->check();
        $user_problem_stats = [
            "solved" => ($loggedin) ? $problem->isSolvedBy($request->user()) : false,
            "posted" => ($loggedin) ? $request->user()->postedSolutionTo($problem->id) : false,
            "cheated" => false,
            "solution" => Solution::where('user_id', $request->user()->id)->where('problem_id', $problem->id)->first()??null,
        ];
        return view('pages.problem', compact('problem', 'loggedin','user_problem_stats'));
    }
}
