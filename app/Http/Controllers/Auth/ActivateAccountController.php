<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class ActivateAccountController extends Controller
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

    public function ActivateAccountView()
    {
        return view('activate-account');
    }
    public function ActivateAccount($email,$token)
    {
        $user = User::where('email_token',$token)
                            ->where('verified' ,0)
                            ->where('email',$email)
                            ->first();
        if($user)
        {
            $user['email_token']= null;
            $user['verified']= 1;
            $user->save();
            return redirect('/home');
        }
        
        return "<h1 align='center' style='margin-top:40vh'>
                    Your Account Is Already Activated
                </h1>";   

    }
}
