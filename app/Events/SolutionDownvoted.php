<?php

namespace App\Events;

use App\Solution;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SolutionDownvoted
{
    use InteractsWithSockets, SerializesModels;


    public $solution;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Solution $solution)
    {
        $this->solution = $solution;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
