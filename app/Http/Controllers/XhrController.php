<?php

namespace App\Http\Controllers;

use App\Exceptions\Problem\IncorrectAnswer;
use App\Problem;
use Illuminate\Http\Request;

class XhrController extends Controller
{
    public function problems()
    {
        return Problem::all();
    }

    public function checkAnswer(Problem $problem,Request $request)
    {
        $this->validate($request,[
            'answer' => 'required|min:1'
        ]);
        try{
            $request->user()->solve($problem,$request->input('answer'));
            $valid = true;
        }
        catch (IncorrectAnswer $e){
            $valid = false;
        }

        return response()->json(['valid' => $valid],200);
    }
}
