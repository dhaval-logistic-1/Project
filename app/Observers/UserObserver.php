<?php

namespace App\Observers;

use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function creating(User $user): void
    {
        $user->remember_token = Str::random(6);
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Mail::raw('you register , Please Login using Email,Password', function ($msg) use ($user) {
            $msg->to($user->email)->subject('Register Successfully');
        });
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
