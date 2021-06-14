<?php

namespace App\Listeners;

use App\Models\AccessLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginActivity
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
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        AccessLog::record(
            request()->ip(),
            request()->email,
            request()->userAgent(),
            request()->getContent(),
            $event->user ? true : false
        );
    }
}
