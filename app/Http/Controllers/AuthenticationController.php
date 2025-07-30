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
// return $request;
     $request->validate([
    'email' => 'required',
    'password' => 'min:6',
]);


// return $request->email;
   $response=User::where("email",$request->email)->first();

   if($response){
        if($response->role==="user"){
            $user=auth()->guard('user')->attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            if($user){
                
                return redirect()->route('clienthomepage');
            }
            else{
         return redirect()->route("auth.loginpage")->with('danger',"Enter Correct Credentails");

            }
            


        }
        elseif($response->role==="admin"){
   $user=auth()->guard('admin')->attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ]);
            if($user){
                
                return redirect()->route('welcome');
            }
            else{
         return redirect()->route("auth.loginpage")->with('danger',"Enter Correct Credentails");

            }
        }





   }
else{
             return redirect()->route("auth.loginpage")->with('danger',"Enter Correct Credentails ");

}

    }
}
