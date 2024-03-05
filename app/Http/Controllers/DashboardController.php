<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Twittah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
   public function index()
   {
       // Test - Sends a test mail
       // Mail::to(auth()->user())
       //     ->send(new WelcomeMail(auth()->user()));

       // Test - Shows the mail view
       // return new WelcomeMail(auth()->user());

       // Check for a search
       // If there is, search the value on db
       $twits = Twittah::latest();

       if(request()->has('search')){
           $searchParam = "%" . request()->get('search', '') . "%";

           $twits = $twits->where('content', 'like' , $searchParam);
       }

       return view('dashboard', [
           'twits' => $twits->paginate(3)
       ]);
   }
}
