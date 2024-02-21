<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Twittah;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Twittah $twit){

        $comment = new Comment();
        $comment->twittah_id = $twit->id;
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('twits.show',$twit->id)->with('success', 'Comment posted successfully');
    }
}
