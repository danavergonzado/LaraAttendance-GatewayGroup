<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeLog;
use App\User;
use App\Task;
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
        $log = TimeLog::where([
            'user_id'   =>  Auth::user()->id,
            'date'  =>  date('Y-m-d')
            ])->get();
        
        $timein = ($log[0]->timein) ? $log[0]->timein->format('h:i A') : null;             
        $timeout = ($log[0]->timeout) ? $log[0]->timeout->format('h:i A') : null;

        $task = Task::where('user_id', Auth::user()->id)->get();
        
        return view('home')->with([
            'timein' => $timein,
            'timeout' => $timeout,
            'task'  =>  $task      
        ]);
    }

    public function hr()
    {
        return view('page.hr');
    }
}
