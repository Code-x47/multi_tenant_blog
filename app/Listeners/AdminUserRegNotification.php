<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\userRegisteredEvent;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AdminUserREgNotification
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
        $admins = User::where('role',"admin")->get();
        foreach ($admins as $admin) {
        Mail::to($admin->email)->send(new AdminNotification($event->users->email));
        }
    }
}
