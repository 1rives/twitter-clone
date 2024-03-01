<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();

        // Adds the follower to the table
        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'User followed successfully');
    }

    public function unfollow(User $user){
        $follower = auth()->user();

        // Removes the follower from the table
        $follower->followings()->detach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'User unfollowed successfully');
    }
}
