<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\idea;
use App\Models\ideacategory;
use App\Models\workingcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdeaCrudMgmtController extends Controller
{
    
    public function index(){
        
        $ideacategory=ideacategory::select("name","id")->get();
        return view('Frontend.userpannel.postidea',compact('ideacategory'));
    }

    public function ideapost(Request $request){
     $request->validate([
    'title' => 'required',
    'description' => 'required',
    'idea_type' => 'required',
    ]);
        // return $request;
        $idea=new idea();
        $idea->title=$request->title;
        $idea->user_id=auth()->guard('user')->user()->id;
        $idea->description=$request->description;
        $idea->date=now();
        $idea->slug=generateSlug();
        $idea->idea_category=$request->idea_type;
        $idea->save();
        return redirect()->route('user.getidea')->with("success","You have sucessfully create idea");
    }

    public function getidea(Request $request){
 $get_id=auth()->guard('user')->user();

        if($request->query("show")==="all"){
          $idea = idea::where("user_id", $get_id->id)
           ->with("ideacate")
                      ->select(["title",'description',"id",'idea_category',"slug"])
                    ->latest()
           ->get();
        }
        else{
            $idea = idea::where("user_id", $get_id->id)
           ->with("ideacate")
           ->select(["title",'description',"id",'idea_category',"slug"])
                     ->latest()
           ->take(3)
                   ->get();
        }
        // return $idea;
       
                return view('Frontend.userpannel.listidea',compact('idea'));

    }

    public function deleteidea($slug){
     DB::table('ideas')->where('slug', $slug)->delete();
    return redirect()->back()->with('success', 'Idea deleted successfully!');
}

public function updateidea($slug){
// return $id;
    $data['idea']=idea::where("slug",$slug)->first();
    // return $data;
    $data['working_category']=ideacategory::all();

    return view('Frontend.userpannel.updateidea',$data);
}

public function updateideapost(Request $request,$slug){
     $idea=idea::where("slug",$slug)->first();
 $idea->title=$request->title;

        $idea->description=$request->description;
        $idea->idea_category=$request->idea_type;
        $idea->date=now();
        $idea->save();
                return redirect()->back()->with("success","Good ho gya");


}

}
