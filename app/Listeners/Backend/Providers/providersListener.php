<?php

namespace App\Listeners\Backend\Providers;

use App\Events\Backend\Providers\providers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class providersListener
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
     * @param  providers  $event
     * @return void
     */
    public function handle(providers $event)
    {
        //
    }
}
