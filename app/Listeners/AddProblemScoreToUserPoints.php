<?php

namespace App\Listeners;

use App\Events\UserSolvedProblem;
use App\Notifications\PointsReceivedFromProblemSolving;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddProblemScoreToUserPoints
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserSolvedProblem  $event
     * @return void
     */
    public function handle(UserSolvedProblem $event)
    {
        $event->user->addPoints($event->problem->score);

        $event->user->notify(new PointsReceivedFromProblemSolving($event->problem));
    }
}
