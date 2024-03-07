<?php

namespace App\Http\Controllers;

use App\Http\Requests\Twittah\CreateTwitRequest;
use App\Http\Requests\Twittah\UpdateTwitRequest;
use App\Models\Twittah;
use Illuminate\Http\Request;

class TwitController extends Controller
{
    public function show(Twittah $twit) {
        return view('twits.show', compact('twit'));
    }

    public function store(CreateTwitRequest $request) {

        $validated = $request->validated();

        // Save current logged-in user
        $validated['user_id'] = auth()->user()->id;

        // Save twit
        Twittah::create($validated);

        return redirect()->route('dashboard')->with('success', 'Twit create successfully');
    }

    public function edit(Twittah $twit) {

        $this->authorize('update', $twit);

        $editing = true;

        return view('twits.show', compact('twit', 'editing'));
    }

    public function update(UpdateTwitRequest $request ,Twittah $twit) {

        $this->authorize('update', $twit);

        $validated = $request->validated();

        $twit->update($validated);

        return redirect()->route('twits.show',$twit->id)->with('success', 'Twit updated successfully');
    }

    // Route model binding
    public function destroy(Twittah $twit) {

        $this->authorize('delete', $twit);

        $twit->delete();

        return redirect()->route('dashboard')->with('success', 'Twit deleted successfully');
    }
}
