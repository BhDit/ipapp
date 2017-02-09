<?php

namespace App\Http\Controllers;

use App\Events\SolutionDownvoted;
use App\Events\SolutionUpvoted;
use App\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * @param Solution $solution
     * @return \Illuminate\Http\JsonResponse
     */
    public function vote(Solution $solution)
    {
        $this->handleVote($solution);
        return response()->json(['upvotes' => (int)$solution->likeCount]);
    }

    /**
     * @param Solution $solution
     */
    private function handleVote(Solution $solution)
    {
        if ($solution->liked()) {
            $solution->unlike();
            event(new SolutionDownvoted($solution->load('owner')));
        } else {
            $solution->like();
            event(new SolutionUpvoted($solution->load('owner')));
        }
    }
}
