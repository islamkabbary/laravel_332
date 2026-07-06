<?php

namespace App\Listeners;

use App\Events\RegisterUserEvent;
use App\Mail\RegisterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWelcomUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterUserEvent $event): void
    {
        // dd($event);
        Mail::to($event->user->email)->queue(new RegisterMail($event->user));
    }
}
