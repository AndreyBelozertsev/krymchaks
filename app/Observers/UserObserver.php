<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * Handle the User "saving" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function saving(User $user)
    {
        if(! (User::where('id', $user->id)->where('password', $user->password)->first()) ){
            $user->password = Hash::make($user->password );
        }
    }
}
