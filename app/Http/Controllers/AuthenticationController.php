<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function loginform(){
        return view('authentication.loginpage');
    }

    public function authenticate(Request $request){

     $request->validate([
    'email' => 'required',
    'password' => 'min:6',
]);


   $response=User::where("email",$request->email)->first();
//    return $response;
   if($response){
        if($response->role==="user"){
            $user=auth()->guard('admin')->attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            if($user){
                return redirect()->route('dshboardhtml');
            }
            else{
         return redirect()->route("auth.loginpage")->with('danger',"Enter Correct Credentails");

            }
        }





   }


    }
}
