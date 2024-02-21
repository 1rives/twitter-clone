<?php

namespace App\Http\Controllers;

use App\Models\Twittah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
       // Check for a search
       // If there is, search the value on db

       $twits = Twittah::orderBy('created_at', 'DESC');

       if(request()->has('search')){
           $searchParam = "%" . request()->get('search', '') . "%";

           $twits = $twits->where('content', 'like' , $searchParam);
       }

       return view('dashboard', [
           'twits' => $twits->paginate(3)
       ]);
   }
}
