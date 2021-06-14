<?php

namespace App\Listeners;

use App\Models\AccessLog;
use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginFailedActivity
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        AccessLog::record(
            request()->ip(),
            request()->email,
            request()->userAgent(),
            request()->getContent()
        );
    }
}
