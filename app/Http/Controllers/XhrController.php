<?php

namespace App\Http\Controllers;

use App\Events\UserSolvedProblem;
use App\Exceptions\Problem\IncorrectAnswer;
use App\Problem;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class XhrController extends Controller
{
    /**
     * XhrController constructor.
     */
    public function __construct()
    {
        $this->middleware('throttle:5,1',['only'=>['checkAnswer']]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function problems()
    {
        return Problem::all();
    }

    /**
     * @param Problem $problem
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

        return response()->json(['valid' => $valid,'points' => (int) $problem->score], 200);
    }

    /**
     * @param Problem $problem
     * @param Request $request
     * @return $this|\Illuminate\Http\JsonResponse
     */
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

        return response()->json($solution->load('owner'));
    }

    /**
     * @param Problem $problem
     * @return mixed
     */
    public function getSolutions(Problem $problem)
    {
        return $problem->solutions;
    }

    /**
     * @param Problem $problem
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cheat(Problem $problem, Request $request)
    {
        if($request->user()->points < \IPAPP::$cheatPoints){
            return response()->json('Not enough points',401);
        }
        try{
            $caught = $request->user()->cheatOn($problem);
        }catch(\Exception $e){
            return response()->json('Whoops.. I made a bubu',500);
        }

        return response()->json(['caught' => $caught,'lostPoints' => ($caught)?\IPAPP::$cheatPoints:0]);
    }

}
