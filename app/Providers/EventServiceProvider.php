<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\UserSolvedProblem::class => [
            \App\Listeners\AddProblemScoreToUserPoints::class,
        ],
        \App\Events\SolutionUpvoted::class => [
            \App\Listeners\RecordUpvotesAndReward::class
        ],
        \App\Events\SolutionDownvoted::class => [
            \App\Listeners\RecordDownvotesAndPunish::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
