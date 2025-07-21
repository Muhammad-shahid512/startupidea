<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;

class BlogMgmtController extends Controller
{
    public function index(){
        $data=blog::select("title",'description','id')->get();
        return view('adminpannel.Blogmgmt.showblog',compact("data"));
    }


    public function createblog(){
        return view('adminpannel.Blogmgmt.createblog');
    }
    public function postblog(Request $request){
           $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        blog::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
              return response()->json(['success' => 'Post created successfully.']);    
    }


    public function deleteblog($id){
           blog::where('id', $id)->firstorfail()->delete();
        return redirect()->route('blog.show');
    }


    public function updateblog($id){
         $data=blog::where('id', $id)->first();
         return view('adminpannel.Blogmgmt.updateblog',compact("data"));

    }


    public function updateblogpost(Request $request,$id){
        blog::where('id', $id)->update([
    'title' => $request->title,
    'description' => $request->description,
]);
        return redirect()->route('blog.show');

        // return $request;
    }
}
