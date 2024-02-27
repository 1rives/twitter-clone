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

        $validated = request()->validate([
            'content' => 'required|min:10|max:280'
        ]);

        // Save current logged-in user
        $validated['user_id'] = auth()->user()->id;

        // Save twit
        Twittah::create($validated);

        return redirect()->route('dashboard')->with('success', 'Twit create successfully');
    }

    public function edit(Twittah $twit) {

        if(auth()->id() !== $twit->user_id) {
            abort(404);
        }

        $editing = true;

        return view('twits.show', compact('twit', 'editing'));
    }

    public function update(Twittah $twit) {

        if(auth()->id() !== $twit->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:10|max:280'
        ]);

        $twit->update($validated);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Twit updated successfully');
    }

    // Route model binding
    public function destroy(Twittah $id) {

        if(auth()->id() !== $id->user_id) {
            abort(404);
        }

        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Twit deleted successfully');
    }
}
