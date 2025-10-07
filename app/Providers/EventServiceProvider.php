<?php

namespace App\Providers;

use App\Events\ApplicationSubmitted;
use App\Listeners\SendApplicationEmail;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ApplicationSubmitted::class => [
            SendApplicationEmail::class,
        ],
    ];
}


