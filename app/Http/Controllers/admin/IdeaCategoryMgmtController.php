<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ideacategory;
use Illuminate\Http\Request;

class IdeaCategoryMgmtController extends Controller
{
    public function createcategory(){
        return view('adminpannel.Ideacategory.CreateIdea');
    }

    public function showcategory(Request $request){

        $query=ideacategory::query();
        if($request->filled("search")){
            $query->where('name', 'Like', '%' . request('search') . '%');
        }

        $data=$query->get();
        
        return view('adminpannel.Ideacategory.showcategory',compact('data'));
    }
    public function postideacategory(Request $request){

            $request->validate([
            'name' => 'required|unique:ideacategories,name',
        ]);
        ideacategory::create([
            'name' => $request->name,
        ]);
    }



    public function deletecategory($id){
           ideacategory::where('id', $id)->firstorfail()->delete();
        return redirect()->route('category.show');
    }


    public function updatecategory($id){
           $data=ideacategory::where('id', $id)->first();
         return view('adminpannel.Ideacategory.Updatecategory',compact("data"));
    }


    public function postupdatecategory(Request $request,$id){
           ideacategory::where('id', $id)->update([
    'name' => $request->name
]);
        return redirect()->route('category.show');
    }
}
