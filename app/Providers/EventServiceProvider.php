<?php

namespace App\Providers;

use App\Events\RequestAccepted;
use App\Listeners\CreateUserLoginLog;
use App\Listeners\SendRequestAcceptedEmail;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RequestAccepted::class => [
            SendRequestAcceptedEmail::class
        ],
        'Illuminate\Auth\Events\Login' => [
            CreateUserLoginLog::class,
        ],
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
