<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Solution;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index()
    {
        return view('pages.problems');
    }

    public function show($id, Request $request)
    {
        $problem = Problem::with('solutions')->find($id);
        $loggedin = auth()->check();

        $user_problem_stats = $this->getUserStats($request, $loggedin, $problem);

        return view('pages.problem', compact('problem', 'loggedin', 'user_problem_stats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'level' => 'required|in:low,medium,hard',
            'answer' => 'required',
            'score' => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        $problem = Problem::create($request->all());

        return $problem;
    }
    /**
     * @param Request $request
     * @param $loggedin
     * @param $problem
     * @return array
     */
    private function getUserStats(Request $request, $loggedin, $problem): array
    {
        $user_problem_stats = [
            "solved" => ($loggedin) ? $problem->isSolvedBy($request->user()) : false,
            "posted" => ($loggedin) ? $request->user()->postedSolutionTo($problem->id) : false,
            "solution" => ($loggedin) ? $request->user()->solutions()->whereProblemId(1)->first() : null,
        ];
        return $user_problem_stats;
    }
}
