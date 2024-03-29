<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        $twits = $user->twits()->paginate(5);

        return view('users.show', compact('user', 'twits'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $editing = true;
        $twits = $user->twits()->paginate(5);

        return view('users.edit', compact('user', 'editing', 'twits'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        // Process image
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route('profile');
    }

    /**
     * Update the specified user in storage.
     */
    public function profile()
    {
        $user = auth()->user();
        return $this->show(auth()->user());
    }

}
