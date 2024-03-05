<?php

namespace App\Http\Controllers;

use App\Models\Twittah;
use Illuminate\Http\Request;

class TwittahLikeController extends Controller
{
    public function like(Twittah $twit){
        $liker = auth()->user();

        $liker->likes()->attach($twit);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Post liked successfully');
    }

    public function unlike(Twittah $twit){
        $liker = auth()->user();

        $liker->likes()->detach($twit);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Post unliked successfully');
    }
}
