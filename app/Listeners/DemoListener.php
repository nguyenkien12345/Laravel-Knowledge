<?php

namespace App\Listeners;

use App\Events\DemoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class DemoListener
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
     * @param  \App\Events\DemoEvent  $event
     * @return void
     */
    public function handle(DemoEvent $event)
    {
        Log::info('Mình là ' . $event->name . '. Năm nay mình ' . $event->age);
    }
}
