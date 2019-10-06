<?php

namespace App\Listeners;

use App\Models\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Molayli\CloudflareRealIpServiceProvider;

class CreateUserLoginLog
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'ip_address' => CloudflareRealIpServiceProvider::ip()
        ]);
    }
}
