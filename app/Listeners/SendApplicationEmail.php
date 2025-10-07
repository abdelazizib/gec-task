<?php

namespace App\Listeners;

use App\Events\ApplicationSubmitted;
use App\Mail\ApplicationSubmitted as ApplicationSubmittedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendApplicationEmail implements ShouldQueue
{
    public function handle(ApplicationSubmitted $event): void
    {
    }
}


