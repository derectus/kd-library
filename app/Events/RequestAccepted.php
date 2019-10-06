<?php

namespace App\Events;

use App\Models\Barrow;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class RequestAccepted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User.
     *
     * @var User
     */
    public $user;

    /**
     * Barrow.
     *
     * @var Barrow
     */
    public $barrow;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $barrow
     *
     * @return void
     */
    public function __construct($user, $barrow)
    {
        $this->user = $user;
        $this->barrow = $barrow;
    }
}
