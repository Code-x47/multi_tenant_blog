<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegisteredEvent;
use App\Listeners\SendWecomeEmail;
use App\Events\TenantApprovalEvent;
use App\Listeners\TenantApprovalListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(userRegisteredEvent::class, SendWelcomeEmail::class);
        Event::listen(userRegisteredEvent::class, AdminUserRegNotification::class);
        Event::listen(TenantApprovalEvent::class, TenantApprovalListener::class);
    }
}
