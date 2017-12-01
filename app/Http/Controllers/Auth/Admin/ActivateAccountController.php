<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class ActivateAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function ActivateAccountView()
    {
        return view('activate-account');
    }
    public function ActivateAccount($email,$token)
    {
        $admin = Admin::where('email_token',$token)
                            ->where('verified' ,0)
                            ->where('email',$email)
                            ->first();
        if($admin)
        {
            $admin['email_token']= null;
            $admin['verified']= 1;
            $admin->save();
            return redirect('/admin');
        }
        
        return "<h1 align='center' style='margin-top:40vh'>
                    Your Account Is Already Activated
                </h1>";   

    }
}
