<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Twittah;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Twittah $twit)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['twittah_id'] = $twit->id;

        Comment::create($validated);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Comment posted successfully');
    }
}
