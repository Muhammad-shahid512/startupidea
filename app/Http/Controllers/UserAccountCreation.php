<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\workingcategory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountCreation extends Controller
{
    public function index(){
        return view('profilecreation.creation1');
    
    }
    public function postemailpassword(Request $request){
        // return $request;
    $request->validate([
    'email' => 'required',
    'password' => 'min:6',
    'password_confirmation' => 'required_with:password|same:password|min:6'
]);

$user=new User();
$user->name=$request->name;
$user->email=$request->email;
$user->password=Hash::make($request->password);
$user->role="user";
$user->save();


Session(["user_session_id"=>$user->id]);
return redirect()->route('user.personal_info_form');
        

    }
    
    public function personal_info_form(){
        return view('profilecreation.creation2');
    }

    public function personalinfo(Request $request){
                $request->validate([
    'name' => 'required',
    'last_name' => 'required',


]);
$userId = session('user_session_id');
$user=User::findOrFail($userId);
$user->name=$request->name;
$user->last_name=$request->last_name;

$user->save();
return redirect()->route('user.personal_working_form');


    }


    public function personal_working_form(){
        $working=workingcategory::all();
    
        return view('profilecreation.creation3',compact('working'));
    }


    public function workinginfo(Request $request){
        // return $request;

 $request->validate([
    'working_category' => 'required',
    'working' => 'required',
    ]);
    $userId = session('user_session_id');
$user=User::findOrFail($userId);
$user->working_category=$request->working_category;
$user->working=$request->working;

$user->save();
return redirect()->route('user.wrapperscreen')->with("success","You have Successfully create account on StartupIdea");
    }

    public function wrapperscreen(){
        return view('profilecreation.wrapper');
    }
}
