<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPannelController extends Controller
{
    public function index(){
        return view('Frontend.userpannel.Dashboard');
    }

    public function logoutuser(){
            Auth::guard('user')->logout();
            return redirect()->route('auth.loginpage');
    }
}
