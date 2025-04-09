<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\userRegisteredEvent;
use App\Mail\useRegisteredMail;
use Illuminate\Support\Facades\Mail;

class sendWecomeEmail
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
    public function handle(userRegisteredEvent $event): void
    {
        Mail::to($event->users->email)->send(new userRegisteredMail()); //This Will Send a Welcome Mail To The Registered User
    }
}
