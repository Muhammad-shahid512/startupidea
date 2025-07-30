<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function welcome(){
        $totalusers=DB::table('users')->where("role","user")->count();
        // return $totalusers;     
           $totalideas=DB::table('ideas')->count();
        // return $totalideas;      
          $totalfeedback=DB::table('feedback')->count();
        // return $totalfeedback.$totalideas.$totalusers;
return view('adminpannel.dashboard.Welcome', compact('totalusers', 'totalideas', 'totalfeedback'));
    }

    public function showadmin(){
        $showadmin=DB::table("users")->where('role',"admin")->get();
        // return $showadmin;
        return view('adminpannel.adminmgmt.Adminshow',compact('showadmin'));
    }

    public function addadmin(){
    return view('adminpannel.adminmgmt.add');
    }



    public function adminpost(Request $request){
    DB::table("users")->insert([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'role'=>"admin"
    ]);


    return redirect()->route('showadmin');
    }


    public function admindelete($id){
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    
    
    }


    public function logoutadmin(){
          Auth::guard('admin')->logout();
            return redirect()->route('auth.loginpage');
    }
}
