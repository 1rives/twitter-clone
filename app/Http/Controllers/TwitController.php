<?php

namespace App\Http\Controllers;

use App\Models\Twittah;
use Illuminate\Http\Request;

class TwitController extends Controller
{
    public function show(Twittah $twit) {
        return view('twits.show', compact('twit'));
    }

    public function store() {

        $validated                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   = request()->validate([
            'content' => 'required|min:10|max:280'
        ]);

        Twittah::create($validated);

        return redirect()->route('dashboard')->with('success', 'Twit create successfully');
    }

    public function edit(Twittah $twit) {

        $editing = true;

        return view('twits.show', compact('twit', 'editing'));
    }

    public function update(Twittah $twit) {

        request()->validate([
            'content' => 'required|min:10|max:280'
        ]);

        $twit->content
        $twit->save(); = request()->get('content', '');

        return redirect()->route('twits.show',$twit->id)->with('success', 'Twit updated successfully');
    }

    // Route model binding
    public function destroy(Twittah $id) {

        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Twit deleted successfully');
    }
}
