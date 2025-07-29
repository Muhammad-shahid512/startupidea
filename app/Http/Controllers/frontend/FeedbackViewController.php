<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackViewController extends Controller
{
    public function viewfeedback($slug){
         $idea=idea::where("slug",$slug)->with(["ideacate","getfeedback.getuser","getuser"])
           ->first();
        //    return $idea;
        return view('Frontend.FeedBackView',compact('idea'));


    }

    public function postcomment(Request $request){
           $name = $request->input('name');
$user_id = Auth::guard('user')->user()->id;
           $idea_id = $request->input('idea_id');
             DB::table("feedback")->insert([
      'user_id'=>$user_id,
      'idea_id'=>$idea_id,
      'feedback'=>$name,
    ]);
    return response()->json(['message' => 'Hello, ' . $name . '!'.$idea_id.$user_id]);
  
    }
}
