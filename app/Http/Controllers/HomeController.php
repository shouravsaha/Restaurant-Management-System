<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;

class HomeController extends Controller
{
    //
    public function index(){
        $food_menu_data = Food::all();
        $chefdata = Foodchef::all();
        return view('home', compact('food_menu_data', 'chefdata'));
    }
    public function redirect(){
        $food_menu_data = Food::all();
        $userType = Auth::user()->usertype;
        if($userType == 1){
            return view('admin.adminhome');
        }else{
            return view('home', compact('food_menu_data'));
        }
    }
}
