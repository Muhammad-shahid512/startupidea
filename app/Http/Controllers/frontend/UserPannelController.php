<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\workingcategory;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserPannelController extends Controller
{
    public function index(){
        return view('Frontend.userpannel.Dashboard');
    }

    public function logoutuser(){
            Auth::guard('user')->logout();
            return redirect()->route('auth.loginpage');
    }

    public function getid(){
         return Auth::guard('user')->user()->name; 
    }


     public function profileupdate(Request $request){
      if($request->hasfile('profile'))
        {
            $oldImage = auth()->guard('user')->user()->profile;
        $destination = public_path('images/thumbnail/' . $oldImage);
            if(File::exists($destination))
            {
                File::delete($destination);
            }
                 $image = $request->file('profile');
        $imageName = time().'.'.$image->extension();
        $destinationPathThumbnail = public_path('images/thumbnail');
        $img = Image::read($image->path());
        $img->resize(130, 130, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
            $id=auth()->guard('user')->user()->id;
                  User::where('id', $id)->update(['profile' => $imageName]);
        }
       }


        public function accountsetting(){
            $cate=workingcategory::select("name","id")->get();
            return view('Frontend.userpannel.accountsetting',compact("cate"));
        }


public function accountupdate(Request $request){
    User::where("id",auth()->guard('user')->user()->id)->update([
        'name'=>$request->name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'working'=>$request->working,
        'working_category'=>$request->working_category,

    ]);
return redirect()->back()->with("success", "Profile updated! Your changes have been saved.");
}


public function removeprofile(){
      $user = auth()->guard('user')->user();

      if($user->profile){
                $destination = public_path('images/thumbnail/' . $user->profile);
                  if (File::exists($destination)) {
            File::delete($destination);
        }

      }
       $user->profile = null;
               $user->save();
    
            return redirect()->back()->with('success',"Update profile image");
}
}
