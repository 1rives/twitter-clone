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

        // Check for a search
        // If there is, search the value on db
        $twits = Twittah::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')){
            $searchParam = "%" . request()->get('search', '') . "%";

            $twits = $twits->where('content', 'like' , $searchParam);
        }

        return view('dashboard', [
            'twits' => $twits->paginate(3)
        ]);
    }
}
