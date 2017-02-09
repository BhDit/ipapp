<?php

namespace App\Listeners;

use App\Events\SolutionUpvoted;
use App\IPAPP;
use App\Notifications\PointsReceived;
use App\Notifications\XpReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cache;

class RecordUpvotesAndReward
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
     * @param  SolutionUpvoted $event
     * @return void
     */
    public function handle(SolutionUpvoted $event)
    {
        $owner = $event->solution->owner;
        $votes = Cache::increment($event->solution->id . '.votes');
        $rewardedWithPoints = Cache::get($event->solution->owner->id . '-p-r-' . $event->solution->id) ?? false;
        if ($votes == IPAPP::$votesCheckpointForReward && !$rewardedWithPoints) {
            $owner->addPoints(IPAPP::$solutionUpvotesReward);
            $owner->notify(new PointsReceived(
                [
                    'title' => 'Received Points +' . IPAPP::$solutionUpvotesReward,
                    'description' => "One of your solutions received " . IPAPP::$votesCheckpointForReward . " upvotes",
                ]
            ));
        }
        $owner->addXp(IPAPP::$upvoteXp);
        $owner->notify(new XpReceived(
            [
                'title' => 'Received XP +' . IPAPP::$solutionUpvotesReward,
                'description' => "One of your solutions received " . IPAPP::$votesCheckpointForReward . " upvotes",
            ]
        ));
    }
}
