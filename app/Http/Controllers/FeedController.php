<?php

namespace App\Http\Controllers;

use App\Models\Twittah;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingIDs = auth()->user()->followings()->pluck('user_id');

        $twits = Twittah::when(request()->has('search'), function($query) {
            $query->searchTwit(request('search'));
        })
            ->whereIn('user_id', $followingIDs)
            ->latest()
            ->paginate(3);

        return view('dashboard', [
            'twits' => $twits
        ]);
    }
}
