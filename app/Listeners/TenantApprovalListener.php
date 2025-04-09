<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TenantApprovalEvent;
use App\Mail\TenantApprovalMail;
use Illuminate\Support\Facades\Mail;


class TenantApprovalListener
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
    public function handle(TenantApprovalEvent $event): void
    {
        Mail::to($event->user->email)->send(new TenantApprovalMail()); //Notification Email To Notify User Of Their Approval Status
    }
}
