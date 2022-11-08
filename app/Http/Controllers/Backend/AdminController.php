<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        //validate the form data 
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        //passing in credentials
        $credentials = array(
                            'email' => $request->email, 
                            'password' => $request->password
                        );

        //Attempt to login user
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            //redirect user to the dashboard if successful
            Admin::where('email', $request->email)->update(['log_ip' => $request->ip()]);
            return redirect()->intended(route('admin.dashboard'));
        }
         

        //if unsuccessful login
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Invalid credentials');
    }
}
