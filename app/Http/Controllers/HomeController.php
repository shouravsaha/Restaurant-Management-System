<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $chefdata = Foodchef::all();
        $userType = Auth::user()->usertype;
        if($userType == 1){
            return view('admin.adminhome');
        }else{
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('home', compact('food_menu_data', 'chefdata', 'count'));
        }
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user_data = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;
            $cart = new Cart;
            $cart->user_id = $user_data;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }
}
