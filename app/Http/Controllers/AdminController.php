<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //this is all logged in users show in admin users section
    public function users(){
        $user_data = User::all();
        return view('admin.users', compact('user_data'));
    }
    // this function indicate each user deleteing system and
    // one users roll in admin this user not delete
    public function deleteUser($id){
        $user_data = User::find($id);
        $user_data->delete();
        return redirect()->back();
    }
    // food items fatch in db and view all food in food menu file
    public function foodmenu(){
        $food_menu_items = Food::all();
        return view('admin.foodmenu', compact('food_menu_items'));
    }
    // all food items store in db
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
    //
    public function edit_food_menu($id){
        $food_menu_data = Food::find($id);
        return view('admin.updatefoodmenu', compact('food_menu_data'));
    }
    //
    public function update_food(Request $request, $id){
        $update_food_menu = Food::find($id);

        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $image_name);
        $update_food_menu->image = $image_name;
        $update_food_menu->title = $request->title;
        $update_food_menu->price = $request->price;
        $update_food_menu->description = $request->description;
        $update_food_menu->save();
        return redirect()->back();
    }
     // this function delete one by one food
     public function delete_food_menu($id){
        $delete_menu = Food::find($id);
        $delete_menu->delete();
        return redirect()->back();
    }
    public function reservation(Request $request){
        $reservation_data = new Reservation;
        $reservation_data->name = $request->name;
        $reservation_data->email = $request->email;
        $reservation_data->phone = $request->phone;
        $reservation_data->guest = $request->guest;
        $reservation_data->date = $request->date;
        $reservation_data->time = $request->time;
        $reservation_data->message = $request->message;
        $reservation_data->save();
        return redirect()->back();
    }
    public function viewreservation(){
        $reservation_data = Reservation::all();
        return view('admin.adminreservation', compact('reservation_data'));
    }
    public function viewchef(){
        return view('admin.adminchef');
    }
    public function uploadchef(Request $request){
        $chefdata = new Foodchef;
        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $image_name);
        $chefdata->image = $image_name;
        $chefdata->name = $request->name;
        $chefdata->speciality = $request->speciality;
        $chefdata->save();
        return redirect()->back();
    }

}
