<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeLog;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $timelogs = TimeLog::where('user_id', Auth::user()->id)->get();
        return view('home')->with('timelogs', $timelogs);
    }
}
