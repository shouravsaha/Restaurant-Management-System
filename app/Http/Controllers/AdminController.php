<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function users(){
        $user_data = User::all();
        return view('admin.users', compact('user_data'));
    }
    public function deleteUser($id){
        $user_data = User::find($id);
        $user_data->delete();
        return redirect()->back();
    }
    public function foodmenu(){
        return view('admin.foodmenu');
    }
    public function upload_food(Request $request){
        $food_data_table = new food;
        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $image_name);
        $food_data_table->image = $image_name;
        $food_data_table->title = $request->title;
        $food_data_table->price = $request->price;
        $food_data_table->description = $request->description;
        $food_data_table->save();
        return redirect()->back();
    }
}
