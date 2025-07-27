<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;

class FeedbackViewController extends Controller
{
    public function viewfeedback($slug){
         $idea=idea::where("slug",$slug)->with(["ideacate","getfeedback.getuser","getuser"])
           ->first();
        //    return $idea;
        return view('Frontend.FeedBackView',compact('idea'));


    }
}
