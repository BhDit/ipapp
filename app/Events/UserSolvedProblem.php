<?php

namespace App\Events;

use App\Problem;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSolvedProblem
{
    use InteractsWithSockets, SerializesModels;

    public $user;
    public $problem;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Problem $problem
     */
    public function __construct(User $user, Problem $problem)
    {
        $this->user = $user;
        $this->problem = $problem;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("App.user.{$this->user->id}");
    }
}
