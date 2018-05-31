<?php

namespace App\Events;

// use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Auth;

class TaskCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
    public $chanId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($task, $chanId)
    {
        $this->task = $task;
        $this->chanId = $chanId;
        $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('task-channel');
        // return new PrivateChannel('channel-name');
        

        // return new PrivateChannel('tasks.' . $this->task->project_id);

        // $projectId = md5(Auth::user()->id);

        logger("$this->chanId");
        return new PrivateChannel($this->chanId);
    }
}
