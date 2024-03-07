<?php

namespace App\Policies;

use App\Models\Twittah;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TwittahPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Twittah $twit): bool
    {
        return ((bool) $user->is_admin || $user->is($twit->user));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Twittah $twit): bool
    {
        return ((bool) $user->is_admin || $user->is($twit->user));
    }
}
