<?php

namespace App\Jobs;

use App\Mail\WelcomeUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels, InteractsWithQueue;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle(): void
    {
        Mail::to($this->user->email)
            ->queue(new WelcomeUserMail($this->user));
    }
}
