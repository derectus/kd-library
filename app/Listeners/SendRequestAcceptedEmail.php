<?php

namespace App\Listeners;

use App\Events\RequestAccepted;
use App\Notifications\RequestInformation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRequestAcceptedEmail
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
     * @param RequestAccepted $event
     * @return void
     */
    public function handle(RequestAccepted $event)
    {
        $event->user->notify(new RequestInformation($event->user, $event->barrow));
    }
}
