<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeLog;
use Auth;
use Session;

class TimeLogController extends Controller
{
    public function timein(Request $request)
    {
        $session_id = Session::getID();

        if(!empty($session_id))
        {
             $log = TimeLog::where([
                 'user_id'   =>  Auth::user()->id,
                 'date'      =>  date('Y-m-d')
                 ])->get();
        
             if($request->comp_num == $log[0]->employee_id)
             {      
                $date = date('Y-m-d H:i:s');
                $att = (!$log[0]->timein) ? $log[0]->timein =  $date : $log[0]->timeout =  $date;

                return $log[0]->save();
        
             }
             else
             {
                 return 'Invalid Company ID.';
             }
        }
    }


}
