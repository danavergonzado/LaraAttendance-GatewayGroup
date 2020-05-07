<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\TimeLog;
use App\User;
use Auth;
use Session;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    // stuff to do after user logs in
    protected function authenticated()
    {
        $dateToday = date('Y-m-d');

        DB::beginTransaction();

        try{

            // check if user has already logged in
            // if Auth::user()->is_logged_in
            $log = TimeLog::where(['user_id'=> Auth::user()->id,'date' =>  $dateToday])->get();

            // If no log recorded
            if(count($log) == 0){
                $log = TimeLog::create([
                    'user_id'       => Auth::user()->id,
                    'session_id'    => Session::getId(),
                    'employee_id'   => Auth::user()->employee_id, 
                    'date'          => $dateToday
                ]);
            }

            if($log){
                DB::commit();
                return redirect()->back();
            }
        }
        catch(Exception $ex){
            DB::rollback();
            return redirect('/login');
        }
    }

}
