<?php

namespace App\Listeners;

use App\Events\SolutionDownvoted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class RecordDownvotesAndPunish
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
     * @param  SolutionDownvoted  $event
     * @return void
     */
    public function handle(SolutionDownvoted $event)
    {
        $votes = Cache::decrement($event->solution->id . '.votes');
    }
}
