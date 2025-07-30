<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function GetAllIdeas(){
        $idea=idea::with(["ideacate","getuser"])
           ->get();
// return $idea;
     
return view('Frontend.HomePage',compact('idea'));


    }
}
