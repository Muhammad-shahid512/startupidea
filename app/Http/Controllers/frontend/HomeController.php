<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function GetAllIdeas(Request $request){
      
           $query=idea::query();


           if($request->filled(("search"))){
           $query->where('title', 'Like', '%' . request('search') . '%');

           }

             if ($request->filled('category')) {
        $category = DB::table('ideacategories')
            ->where('name', $request->category)
            ->first();
        if ($category) {
            $query->where('idea_category', $category->id);
        }
    }
           $data['idea']=$query->  with(["ideacate","getuser"])->get();
           $data['ideacategories']=DB::table('ideacategories')->get();
        
     
return view('Frontend.HomePage',$data);


    }


    // public function x(){
      
    //     $query=ideacategory::query();
    //     if($request->filled("search")){
    //         $query->where('name', 'Like', '%' . request('search') . '%');
    //     }

    //     $data=$query->get();
        
    // }
}
