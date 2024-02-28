<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Twittah;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Twittah $twit){

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $twit->id;

        Comment::create($validated);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Comment posted successfully');
    }
}
