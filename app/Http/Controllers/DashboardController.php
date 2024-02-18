<?php

namespace App\Http\Controllers;

use App\Models\Twittah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
//       $twit = New Twittah([
//           'content' => 'test'
//       ]);
//       $twit->save();

       dump(Twittah::all());

       return view('dashboard', [
           'twits' => Twittah::all()
       ]);
   }
}
