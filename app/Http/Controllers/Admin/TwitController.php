<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Twittah;
use Illuminate\Http\Request;

class TwitController extends Controller
{
    public function index(){

        $twits = Twittah::latest()->paginate(5);

        return view('admin.twits.index', compact('twits'));
    }
}
