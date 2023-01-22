<?php

namespace App\Listeners;

use App\Constants\CartStatus;
use App\Events\ChangeCartStatusToCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeCartStatusToCompletedFired implements ShouldQueue
{  
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 120;
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
     * @param  \App\Events\ChangeCartStatusToCompleted  $event
     * @return void
     */
    public function handle(ChangeCartStatusToCompleted $event)
    {
        $event->cart->update(['cart_status_id' => CartStatus::COMPLETED]);
    }
}
