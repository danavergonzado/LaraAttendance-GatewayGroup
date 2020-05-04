<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;


class UserController extends Controller
{
    //
    public function index()
    {
        if($user = Auth::user()){
           redirect('/home');
        }
        return view('auth.register');
    }

    public function register(Request $request){
        User::create([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'position' => $request->position,
            'branch_id' => $request->branch_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        redirect('/user/register');
    }

    
}
