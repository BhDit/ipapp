<?php

namespace App\Http\Controllers;

use App\Events\UserSolvedProblem;
use App\Exceptions\Problem\IncorrectAnswer;
use App\Problem;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class XhrController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:5,1',['only'=>['checkAnswer']]);
    }
    public function problems()
    {
        return Problem::all();
    }

    public function checkAnswer(Problem $problem, Request $request)
    {
        $this->validate($request, [
            'answer' => 'required|min:1'
        ]);
        try {
            $request->user()->solve($problem, $request->input('answer'));
            $valid = true;
        } catch (IncorrectAnswer $e) {
            $valid = false;
        }

        return response()->json(['valid' => $valid], 200);
    }

    public function storeSolution(Problem $problem, Request $request)
    {
        $this->validate($request,[
            'body' => 'required|min:10',
        ]);
        try {
            $solution = $problem->solutions()->create([
                'body' => $request->input('body'),
                'user_id' => $request->user()->id
            ]);
            event(new UserSolvedProblem($request->user(),$problem));

        }catch (\Exception $e){
            return response()->json(['body' => ['You have already submitted a solution']],401);
        }

        return $solution->load('owner');
    }

    public function getSolutions(Problem $problem)
    {
        return $problem->solutions;
    }
}
