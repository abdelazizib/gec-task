<?php

namespace App\Listeners;

use App\Events\ApplicationSubmitted;
use App\Mail\ApplicationSubmitted as ApplicationSubmittedMail;
use Illuminate\Support\Facades\Mail;

class SendApplicationEmail
{
    public function handle(ApplicationSubmitted $event): void
    {
        Mail::to(config('mail.admin_address'))
            ->send(new ApplicationSubmittedMail($event->application));
    }
}


