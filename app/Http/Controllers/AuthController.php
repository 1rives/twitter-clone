<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function register() {
        return view('auth.register');
    }

    /**
     * @return RedirectResponse
     */
    public function store() {
        $validated = request()->validate([
           'name' => 'required|min:3|max:40',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|min:8|max:50|confirmed',
        ]);

        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        Mail::to($user->email)
            ->send(new WelcomeMail($user));

        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function login() {
        return view('auth.login');
    }

    /**
     * @return RedirectResponse
     */
    public function authenticate() {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:50',
        ]);

        if(auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => "The provided mail does not exist or the password is incorrect."
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Redirects to last visited page
        return back();
    }
}
