<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Twittah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
   public function index()
   {
       $twits = Twittah::when(request()->has('search'), function($query){
            $query->searchTwit(request('search', ''));
       })
           ->orderBy('created_at', 'DESC')
           ->paginate(5);;

       return view('dashboard', [
           'twits' => $twits
       ]);
   }
}
