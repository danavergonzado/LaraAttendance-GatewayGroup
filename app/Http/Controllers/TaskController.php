<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TimeLog;
use App\Task;
use Auth;
use DB;

class TaskController extends Controller
{
    public function store(Request $request){
        if($request->action == "edit"){
            return Task::where('id', $request->current_row)->update([
                'name' => $request->task
            ]);
        }else{
            return Task::create([
                'name' => $request->task,
                'category' => 'general',
                'user_id' => Auth::user()->id
            ]);
        }
       
    }
}
