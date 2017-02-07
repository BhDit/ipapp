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
        $user_problem_stats = [
            "solved" => ($loggedin) ? $problem->isSolvedBy($request->user()) : false,
            "posted" => ($loggedin) ? $request->user()->postedSolutionTo($problem->id) : false,
            "solution" => ($loggedin) ? Solution::where('user_id', $request->user()->id)->where('problem_id', $problem->id)->first():null,
        ];

        $nr1 = Problem::with('solutions')->where('level','low')->count();
        $nr2 = Problem::with('solutions')->where('level','medium')->count();
        $nr3 = Problem::with('solutions')->where('level','hard')->count();

        $chart = Charts::create('donut', 'morris')
            // ->view('custom.line.chart.view') // Use this if you want to use your own template
            ->title('My solved problems')
            ->labels(['Low', 'Medium', 'Hard'])
            ->values([$nr1,$nr2,$nr3])
            ->dimensions(300,300)
            ->responsive(false);


        return view('pages.problem', compact('problem', 'loggedin','user_problem_stats','chart'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'level' => 'required|in:low,medium,hard',
            'answer' => 'required',
            'score' => 'required|numeric|min:1',
            'description' => 'required'
        ]);

        $problem = Problem::create($request->all());

        return $problem;
    }
}
