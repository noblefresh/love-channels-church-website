<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // } 

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
