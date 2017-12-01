<?php

namespace App\Listeners\Admin;

use App\Events\Admin\AdminCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\Auth\Admin\VerifyEmail;

class AdminCreatedEventListener
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
     * @param  AdminCreatedEvent  $event
     * @return void
     */
    public function handle(AdminCreatedEvent $event)
    {
        Mail::to($event->admin->email)->send(new VerifyEmail($event->admin));
        
    }
}
